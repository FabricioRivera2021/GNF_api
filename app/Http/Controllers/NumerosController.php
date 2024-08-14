<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Estados;
use App\Models\Filas;
use App\Models\Numeros;
use App\Models\UserPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NumerosController extends Controller
{
    public function filterPausedNumbers(){
        //para cuando el filtro sea pausado
        $numeros = Numeros::with('filas', 'estados', 'customers', 'user')
        ->where('paused', 1)
        ->get()
        ->map(function($numero) {
            return [
                'numero' => $numero->numero,
                'fila_prefix' => $numero->filas->prefix,
                'fila' => $numero->filas->filas,
                'estado' => $numero->estados->estados,
                'estado_id' => $numero->estados->id,
                'nombre' => $numero->customers,
                'user' => $numero->user?->name,
                'pausado' => $numero->paused,
                'cancelado' => $numero->canceled,
                'created_at' => $numero->created_at,
                'modified_at' => $numero->updated_at
            ];
        });    
        return $numeros;
    }

    public function filterCancelNumbers(){
        //para cuando el filtro sea pausado
        $numeros = Numeros::with('filas', 'estados', 'customers', 'user')
        ->where('canceled', 1)
        ->get()
        ->map(function($numero) {
            return [
                'numero' => $numero->numero,
                'fila_prefix' => $numero->filas->prefix,
                'fila' => $numero->filas->filas,
                'estado' => $numero->estados->estados,
                'estado_id' => $numero->estados->id,
                'nombre' => $numero->customers,
                'user' => $numero->user?->name,
                'pausado' => $numero->paused,
                'cancelado' => $numero->canceled,
                'created_at' => $numero->created_at,
                'modified_at' => $numero->updated_at
            ];
        });
        return $numeros;
    }

    public function allNumbers( $id = null ){
        if($id && $id != 1){
            $estado = Estados::findOrFail($id);
            $numeros = Numeros::with('filas', 'estados', 'customers', 'user')
                ->whereHas('estados', function($query) { //filtrar estados que son para llamar
                    $query->where('parallamar', 1);
                })
                ->where('estados_id', $estado->id)
                ->get()
                ->map(function($numero) {
                    return [
                        'numero' => $numero->numero,
                        'fila_prefix' => $numero->filas->prefix,
                        'fila' => $numero->filas->filas,
                        'estado' => $numero->estados->estados,
                        'estados_id' => $numero->estados->id,
                        'nombre' => $numero->customers,
                        'user' => $numero->user?->name,
                        'pausado' => $numero->paused,
                        'cancelado' => $numero->canceled,
                        'created_at' => $numero->created_at,
                        'modified_at' => $numero->updated_at
                    ];
                });

            return $numeros;
        }

        //para cuando el filtro sea TODOS
        $numeros = Numeros::with('filas', 'estados', 'customers', 'user')
        ->get()
        ->map(function($numero) {
            return [
                'numero' => $numero->numero,
                'fila_prefix' => $numero->filas->prefix,
                'fila' => $numero->filas->filas,
                'estado' => $numero->estados->estados,
                'estado_id' => $numero->estados->id,
                'nombre' => $numero->customers,
                'user' => $numero->user?->name,
                'pausado' => $numero->paused,
                'cancelado' => $numero->canceled,
                'created_at' => $numero->created_at,
                'modified_at' => $numero->updated_at
            ];
        });
    
        return $numeros;
    }

    public function createNumber(Request $request){
        $data = $request->validate([
            'ci' => ['numeric', 'min:6'],
            'filas' => ['string']
        ]);
        //checkear que el usuario existe
        $user = Customers::where('ci', $data['ci'])->first();

        //si el usuario no existe devuelvo error
        if(!$user){
            return response([
                'message' => 'User does not exists'
            ], 404);
        }

        /* Si el usuario ya tiene un numero asignado devuelvo error solo con verificar que el usuario 
        actual que esta sacando el numero no tenga ya otro numero asignado deberia ser suficiente. */
        if($user->numeros_id != null){
            return response([
                'message' => 'Customer already has a number'
            ], 500);
        }

        //consigo el nombre de la fila
        $fila = Filas::where('filas', $data['filas'])->first();
        if(!$fila){
            return response([
                'message' => 'Fila does not exists'
            ], 404);
        }

        //Consigo el proximo numero de la fila
        $lastNumber = Numeros::where('filas_id', $fila->id)->orderBy('id', 'desc')->first();
        // dd($lastNumber);
        if($lastNumber == null){
            $newNumber = 1;
        }else{
            $newNumber = $lastNumber['numero']+=1;
        }

        $numeroCreado = Numeros::create([
            'numero' => $newNumber,
            'paused' => false,
            'canceled' => false,
            'estados_id' => 1,
            'filas_id' => $fila->id //Implementar que el usuario pueda elejir tipo de fila
        ]);

        if($numeroCreado){
            $user->numeros_id = $numeroCreado->id;
            $user->save();
        }

        return [
            'cedula' => $user->ci,
            'nombre' => $user->name,
            'numero' => $newNumber,
            'fila' => $fila->filas,
            'prefijo' => $fila->prefix,
            'message' => 'Numero creado'
        ];
    }

    //empezar el proceso de crear el numero desde ventanilla
    public function createNumberFromSW(Request $request){
        $data = $request->validate([
            /* Cedula del paciente - o cedulas
             * Fila que se le va a asignar: Comun, Emergencia, FNR, Prioridad */
            'ci' => ['numeric', 'min:6'],
            'filas' => ['string']
        ]);

        //checkear que el usuario existe
        $customer = Customers::where('ci', $data['ci'])->first();

        //si el usuario no existe devuelvo error
        if(!$customer){
            return response([
                'message' => 'customer does not exists'
            ], 404);
        }

        //consigo el nombre de la fila
        $fila = Filas::where('filas', $data['filas'])->first();
        if(!$fila){
            return response([
                'message' => 'Fila does not exists'
            ], 404);
        }

        //Consigo el proximo numero de la fila
        $lastNumber = Numeros::where('filas_id', $fila->id)->get()->last();
        if($lastNumber == null){
            $newNumber = 1;
        }else{
            $newNumber = $lastNumber->numero+1;
        }

        //Si el usuario ya tiene un numero se le avisa al user que este en ventanilla atendiendo
        if($customer->numeros_id != null){
            $customerHasNumber = false;
        }else{
            $customerHasNumber = true;
        }

        return response([
            'message' => 'Confirmar crear numero',
            'tiene_numero' => $customerHasNumber,
            'fila' => $fila,
            'customer' => $customer,
            'numero_actual' => $lastNumber->numero,
            'numero_proximo' => $newNumber
        ]);
    }

    //continuar creando el numero desde ventanilla
    public function continueCreatingNumberFromSW(Request $request){
        
        $fila = $request['fila'];
        $customer = $request['customer'];
        $newNumber = $request['numero_proximo'];

        //dejo el numero en null
        $customer->numeros_id = null;
        $customer->save();

        $numeroCreado = Numeros::create([
            'numero' => $newNumber,
            // 'user_id' => usuario que esta logueado (que llamo al numero)
            'paused' => false,
            'canceled' => false,
            'estados_id' => 2,
            'filas_id' => $fila->id //Implementar que se pueda elejir el tipo de fila
        ]);

        if($numeroCreado){
            $customer->numeros_id = $numeroCreado->id;
            $customer->save();
        }

        return response([
            'message' => 'Numero creado desde ventanilla',
            // 'user' => User que este logueado y haya creado el numero
            'numero' => $numeroCreado->numero,
            'ci' => $customer->ci,
            'fila' => $fila->filas
        ]);
    }

    public function asignNumberToUser(Request $request){
        /**
         * Tengo que saber que usuario llamo a esta funcion y 
         *  asignarle el numero que llamo
         * si el numero esta pausado o cancelado lo retoma
         */
        $user = Auth::user();

        $numero = Numeros::where('id', $request->id)->first();
        $estado = Estados::where('id', $numero->estados_id)->first();
        $fila = Filas::where('id', $numero->filas_id)->first();
        $position = UserPosition::where('id', $user->position_id)->first();

        if(!$numero){
            return response([
                'message' => 'Error'
            ]);
        }

        //si el numero esta pausado
        if($numero->paused == 1){
            $numero->user_id = $user->id; //asigna el numero al User
            $numero->paused = 0;
            $numero->save();
            
            return response([
                'nro' => $numero->numero,
                'message' => 'Retomado el pausado'
            ]);
        }

        //si el numero esta cancelado
        if($numero->canceled == 1){
            $numero->user_id = $user->id; //asigna el numero al User
            $numero->canceled = 0;
            $numero->save();
            
            return response([
                'nro' => $numero->numero,
                'message' => 'Retomado el cancelado'
            ]);
        }

        $numero->user_id = $user->id; //asigna el numero al User
        $numero->estados_id = $estado->id + 1; //Le sumo 1 al estado si corresponde
        $numero->save();

        return response([
            'nro' => $numero->numero,
            'estado' => $estado->estados,
            'fila' => $fila->filas,
            'prefix' => $fila->prefix,
            'lugar' => $position, //ventanilla donde esta el usuario
            'message' => 'Numero llamado'
        ]);
    }

    public function getCurrentSelectedNumber(){
        $user = Auth::user();

        $numero = Numeros::where('user_id', $user->id)->first();
        $estado = Estados::where('id', $numero->estados_id)->first();
        $fila = Filas::where('id', $numero->filas_id)->first();
        $position = UserPosition::where('id', $user->position_id)->first();

        if(!$numero){
            return response([
                'nro' => null,
                'estado' => "none",
                'fila' => "none",
                'prefix' => "none",
                'lugar' => "none", //ventanilla donde esta el usuario
                'msg' => 'No hay numero seleccionado'
            ]);
        }

        return response([
            'nro' => $numero->numero,
            'estado' => $estado->estados,
            'fila' => $fila->filas,
            'prefix' => $fila->prefix,
            'lugar' => $position, //ventanilla donde esta el usuario
        ]);
    }

    public function derivateTo(Request $request){
        /****
         * Tengo que... conocer el user, donde esta actualmente el numero 
         * y a que posicion se lo quiere derivar
         *  Puede ser a un estado o a un User que este en otra posicion --
         *  En principio se deriva a una posicion del sistema que quede en modo para llamar
         */
        $user = Auth::user();
        $numero = Numeros::where('numero', $request->number)->first();

        $posicionesValidas = Estados::where('paraLLamar', 1)
            ->where('id', '!=', 1)
            ->get()
            ->map(function($estado) {
                return [
                    'estado' => $estado->estados
                ];
            });

        return $posicionesValidas;
    }

    public function derivateToPosition(Request $request){

        $user = Auth::user();
        $numero = Numeros::where('numero', $request->number)->first();

        $position = Estados::where('estados', $request->position)->first();

        // dd($numero);

        $numero->estados_id = $position->id;//seteo la nueva posicion
        $numero->user_id = null;//libero el numero
        $numero->save();

        return response([
            'msg' => 'success'
        ]);
    }
}
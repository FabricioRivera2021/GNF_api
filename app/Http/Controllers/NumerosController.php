<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Filas;
use App\Models\Numeros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NumerosController extends Controller
{
    public function allNumbers(){
        $numeros = Numeros::with('filas', 'estados', 'customers')
            ->get()
            ->map(function($numero) {
                return [
                    'numero' => $numero->numero,
                    'fila_prefix' => $numero->filas->prefix,
                    'fila' => $numero->filas->filas,
                    'estado' => $numero->estados->estados,
                    'nombre' => $numero->customers,
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

        /*
        Si el usuario ya tiene un numero asignado devuelvo error
        Solo con verificar que el usuario actual que esta sacando el numero
        no tenga ya otro numero asignado deberia ser suficiente. */
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
        $lastNumber = Numeros::where('filas_id', $fila->id)->first();
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

        return response([
            'message' => 'Numero creado'
        ]);
    }

    //empezar el proceso de crear el numero desde ventanilla
    public function createNumberFromSW(Request $request){
        $data = $request->validate([
            /**
             * Cedula del paciente - o cedulas
             * Fila que se le va a asignar: Comun, Emergencia, FNR, Prioridad
             */
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

    public function callNumber(Auth $user, int $number){
        /**
         * Tengo que saber que usuario llamo a esta funcion y 
         *  asignarle el numero que llamo
         */
    }

    public function derivateNumber(Request $request){
        /****
         * Tengo que... conocer el user, donde esta actualmente el numero 
         * y a que posicion se lo quiere derivar
         *  Puede ser a un estado o a un User que este en otra posicion
         */
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Estados;
use App\Models\Numeros;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
    public function allEstados(){
        //todos los estados que puedan ser llamados
        $estados = Estados::where('paraLlamar', 1)->get();

        $estados->map(function($estado){
            return [
                'id' => $estado->id,
                'estado' => $estado->estados,
            ];
        });

        return $estados;
    }
    public function oneEstados($id){
        //consultar un estado en particular
    }
    public function createEstado(Request $request){
        //alta de Estado
    }
    public function modifyEstado(Request $request){
        //modificar Estado
    }
    public function deleteEstado(Request $request){
        //borrar Estado
    }

    //enviar el numero al proximo estado
    public function setNextState(Request $request){
        //get the current number and state
        $numero = Numeros::where('numero', $request->numero)->first();
        $estado = Estados::where('id', $numero->estados_id)->first();

        // Check if the current number is paused
        $pausado = Numeros::where('id', $numero->id)
            ->where('paused', 1)
            ->first();
        
        // Check if the current number is canceled
        $cancelado = Numeros::where('id', $numero->id)
            ->where('canceled', 1)
            ->first();
        
        // Check if the current state is finalizado
        $finalizado = Estados::where('id', $estado->id)
            ->where('estados', 'finalizado')
            ->first();
        
        // dd($pausado);
        if($pausado || $cancelado || $finalizado){
            return response([
                'message' => 'No se puede derivar, esta en estado pausado o cancelado'
            ]);
        }

        $numero->estados_id = $estado->id + 1; //set the new state for the number
        $numero->user_id = null; //release the number
        $numero->save();

        return response([
            'message' => 'success',
        ]);

        // //get the next state that has paraLlamar in 1
        // $stateID = $currentStateID;
        
        // //aumentar el contador si "paraLlamar" es 0
        // // o el estado es "pausado" y/o "cancelado"
        // do{
        //     // $stateID++;    
        //     $nextStateID = Estados::where('id', $stateID)
        //         ->where('paraLlamar', 1)
        //         ->first();
        // }while($nextStateID == null);
    }

    //pausar un numero
    public function pauseNumber(Request $request){
        //get the current number and state
        $numero = Numeros::where('numero', $request->numero)->first();

        $numero->paused = 1; //set the number as paused
        $numero->user_id = null; //release the number
        $numero->save();

        return response([
            'message' => 'Success'
        ]);
    }

    //cancelar un numero
    public function cancelNumber(Request $request){
        //get the current number and state
        $numero = Numeros::where('numero', $request->numero)->first();

        $numero->canceled = 1; //set the number as canceled
        $numero->user_id = null; //release the number
        $numero->save();

        return response([
            'message' => 'Success'
        ]);
    }

    public function getPausedNumber(Request $request){
        //get the position of the User
        
        //get the number
        $numero = Numeros::where('numero', $request->numero)->first();

    }
}

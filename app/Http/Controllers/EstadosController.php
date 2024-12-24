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
        // Validate the request
        $request->validate([
            'numero' => 'required|integer',
        ]);

        // Get the current number and state
        $numero = Numeros::where('numero', $request->numero)->first();
        if (!$numero) {
            return response()->json(['message' => 'Numero not found'], 404);
        }

        $estado = Estados::where('id', $numero->estados_id)->first();
        if (!$estado) {
            return response()->json(['message' => 'Estado not found'], 404);
        }

        // Check if the current number is paused, canceled, or finalizado
        $pausado = $numero->paused;
        $cancelado = $numero->canceled;
        $finalizado = $estado->estados === 'finalizado';

        if ($pausado || $cancelado || $finalizado) {
            return response()->json(['message' => 'No se puede derivar, esta en estado pausado o cancelado'], 400);
        }

        // Set the new state for the number
        $numero->estados_id = $estado->id + 1;
        $numero->user_id = null; // Release the number
        $numero->save();

        return response()->json(['message' => 'success']);
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

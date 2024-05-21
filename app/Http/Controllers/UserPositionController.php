<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPosition;
use Illuminate\Http\Request;

class UserPositionController extends Controller
{
    /**
     * Enumerar todas las posiciones
     */
    public function allPositions(){
        //traer todas las posiciones
    }

    /**
     * Consultar una posicion
     */
    public function onePosition($id){
        //traer una posicion
    }
    /**
     * CRUD de UserPositions
     * Por defecto existen las siguientes: Ventanilla, Preparacion, Cajas, Entrega
     * Esto es para que el admin realize modificaciones a las posiciones que se encuentran 
     * disponibles en el sistema
     * --------------------------------------------------------------------------------------------------------------------------
     */
    public function createUserPosition(Request $request){
        //Alta
        $data = $request->validate([
            'position' => ['required']
        ]);

        //verificar que la posicion no exista ya
        $position = UserPosition::where('position', $data['position'])->first();
        if($position){
            return response([
                'message' => 'La posición que intenta ingresar ya existe'
            ], 500);
        }

        UserPosition::create([
            'position' => $data['position'],
            'active' => 1
        ]);
    }

    public function modifyUserPosition(){
        //Modificacion

    }

    public function deleteUserPosition(Request $request){
        //Baja
        $data = $request->validate([
            'position' => ['required'],
        ]);

        //validar que la posicion exista y este activa
        $position = UserPosition::where('position', $data['position'])->first();
        if(!$position || $position->active == 0){
            return response([
                'message' => 'La posición que intenta eliminar no existe o ya esta inactiva'
            ], 500);
        }

        //hacer el soft-delete
        $position->active = 0;
        $position->save();   
    }
    /**
     * --------------------------------------------------------------------------------------------------------------------------
     */


    /**
     * Cambiar la posicion actual del usuario en el sistema
     * Por defecto todos los User estan en la posicion "sin asignar" al loguearse
     */
    public function changeUserCurrentPosition(Request $request){
        $data = $request->validate([
            'user' => ['required'], //debo saber que usuario esta haciendo la peticion de cambio
            'position' => ['required']
        ]);

        //posicion hacia donde quiere ir el User
        $newPosition = UserPosition::where('position', $data['position'])->first();

        //Valido que la posicion no este en uso por otro usuario
        $positionTaken = User::where('positions_id', $newPosition->id);

        //valido que exista la posicion y que no este en uso
        if(!$newPosition || $positionTaken){
            return response([
                'message' => 'La posición no existe u otro usuario la esta utilizando'
            ], 500);
        }

        //actualizo la posicion....
    }
}

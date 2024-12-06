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
    public function allPositions(Request $request){
        //traer todas las posiciones
        $positions = UserPosition::all();

        return response($positions);
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
            // 'user_id' => ['required'], //debo saber que usuario esta haciendo la peticion de cambio
            'position' => ['required']
        ]);

        //posicion actual del usuario
        // $user = User::where('id', $data['user_id'])->first();
        $user = $request->user();
        
        //posicion actual
        $actualPosition = UserPosition::where('id', $user->positions_id)->first();

        //posicion hacia donde quiere ir el User
        $userPosition = UserPosition::where('position', $data['position'])->first();
        
        // dd($userPosition->id);//id de la posicion
        // dd($userPosition->position);//nombre de la posicion
        // dd($userPosition->active);//si la posicion esta operativa

        //valido que exista la posicion y que no este en uso
        if($userPosition->occupied == 1){
            return response([
                'message' => 'La posicion no existe u otro usuario la esta utilizando'
            ], 500);
        }

        //actualizo el occuppied de la posicion
        // Quitar el estado ocupado de la posicion actual
        $actualPosition->occupied = 0;
        $actualPosition->save();

        // Agregar el estado ocupado a la posicion nueva, si la misma no es "sin asignar"
        if($userPosition->id != 1){
            $userPosition->occupied = 1;
            $userPosition->save();
        }

        //actualizo la posicion....
        $user->positions_id = $userPosition->id;
        $user->save();

        return response([
            'position_id' => $user->positions_id,
            'position_name' => $userPosition->position,
            'message' => 'Success'
        ]);
    }

    /**
     * Traer la posicion actual del usuario logueado
     */
    public function currentPosition(Request $request){
        $user = $request->user();

        $position_id = $user->positions_id;

        $position = UserPosition::where('id', $position_id)->first();

        return response([
            'position' => $position->position
        ]);
    }

    /**
     * Clear the current asigned position if any
     */
    public function clearPosition(Request $request){
        // dd($request->id);
        $user = User::where("id", $request->id)->first();

        //desocupo la posicion
        $position = UserPosition::where('id', $user->id)->first();
        $position->occupied = 0;
        $position->save();

        //seteo la posicion en sin asignar
        $user->positions_id = 1;
        $user->save();
        
        return response([
            'message' => 'Position ' . $user->positions_id . ' cleared'
        ]);
    }

    /**
     * Force clean all positions
     */
    public function forceClearAllPosition(){

        //desocupo todas las posiciones
        UserPosition::query()->update(['occupied' => 0]);

        //seteo la posicion de todos los usuarios en sin asignar
        User::query()->update(['positions_id' => 1]);
        
        return response([
            'message' => 'All Position cleared'
        ]);
    }
}

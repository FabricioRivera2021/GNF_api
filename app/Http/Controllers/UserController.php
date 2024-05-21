<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Alta de usuarios
     */
    public function createUser(Request $request){
        $data = $request->validate([
            'name' => ['required'], //nombre.apellido
            'email' => ['required'], //nombre.apellido@GNF.com
            'password' => ['required'], //password
            'roles_id' => ['required'],
            'position_id' => ['required'], //posicion actual en el sistema, 1 (sin asignar) por defecto
        ]);

        //validar que no exista ya un usuario con ese mail y nombre
        $user = User::where([
            ['name', $data['name']],
            ['email', $data['email']]
        ])->first;

        if($user){
            return response([
                'message' => 'Usuario invalido, ya existe'
            ], 500);
        }

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'email_verified_at' => now(),
            'roles_id' => 1,
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }

    /**
     * Consultas de usuarios
     * 
     * todos los usuarios
     * usuarios por roles
     * tiempos de espera de usuarios
     *  
     */

    /**
     * Modificacion de usuarios
     */
    public function modifyUser(Request $request){
        //validar los inputs
        $data = $request->validate([
            'name' => ['required'], //nombre.apellido
            'email' => ['required'], //nombre.apellido@GNF.com
            'roles' => ['required'], //admin, regular
        ]);

        //validar que no exista ya un usuario con ese mail y nombre
        $user = User::where([
            ['name', $data['name']],
            ['email', $data['email']]
        ])->first;

        if(!$user){
            return response([
                'message' => 'El usuario no existe en el sistema'
            ], 500);
        }

        //hacer la modificacion
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->rol = $data['rol'];
        $user->save();        
    }

    /**
     * Delete de usuario
     */
    public function deleteUser(Request $request){
        //validar los inputs
        $data = $request->validate([
            'name' => ['required'], //nombre.apellido
            'email' => ['required'], //nombre.apellido@GNF.com
        ]);

        //validar que no exista ya un usuario con ese mail y nombre
        $user = User::where([
            ['name', $data['name']],
            ['email', $data['email']]
        ])->first;

        if(!$user){
            return response([
                'message' => 'El usuario no existe en el sistema'
            ], 500);
        }

        //hacer el soft-delete
        $user->active = 0;
        $user->save();        
    }
}

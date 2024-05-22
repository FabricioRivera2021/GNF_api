<?php

namespace App\Http\Controllers;

use App\Models\Estados;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
    public function allEstados(){
        //todos los estados
        $estados = Estados::all();

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
}

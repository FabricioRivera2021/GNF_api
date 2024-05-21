<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstadosController extends Controller
{
    public function allEstados(){
        //todos los estados
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilasController extends Controller
{
    public function allFilas(){
        //todos los Filas
    }
    public function oneFila($id){
        //consultar una fila en particular
    }
    public function createFila(Request $request){
        //alta de fila
    }
    public function modifyFila(Request $request){
        //modificar fila
    }
    public function deleteFila(Request $request){
        //borrar fila
    }
}

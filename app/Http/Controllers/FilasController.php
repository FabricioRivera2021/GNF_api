<?php

namespace App\Http\Controllers;

use App\Models\Filas;
use Illuminate\Http\Request;

class FilasController extends Controller
{
    public function allFilas(){
        //todos los Filas
        $filas = Filas::all();

        $filas->map(function($fila){
            return [
                'fila' => $fila->filas,
            ];
        });

        return $filas;
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

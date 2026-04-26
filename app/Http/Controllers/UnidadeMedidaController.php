<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use Illuminate\Http\Request;

class UnidadeMedidaController extends Controller
{
    public function index() {
        return Unidad::all();
    }
}

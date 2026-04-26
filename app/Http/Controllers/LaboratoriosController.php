<?php

namespace App\Http\Controllers;

use App\Models\Laboratorio;
use Illuminate\Http\Request;

class LaboratoriosController extends Controller
{
    public function index() {
        return Laboratorio::all();
    }
}

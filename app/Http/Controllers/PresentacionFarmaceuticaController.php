<?php

namespace App\Http\Controllers;

use App\Models\PresentacionFarmaceutica;
use Illuminate\Http\Request;

class PresentacionFarmaceuticaController extends Controller
{
    public function index()
    {
        return PresentacionFarmaceutica::all();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Tratamientos;
use Illuminate\Http\Request;

class TratamientosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //stores a new treatment
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        /* Trae los tratamientos de un customer con, la medicacion, el medico y el usuatio que creo el tratamiento */
<<<<<<< HEAD
        /* -- */
=======
>>>>>>> 003c9771aefe9d0894635e908b35386b92cd54b1
        $tratamientos = Tratamientos::with('medication', 'medicos.especialidades', 'user')
                        ->where('customer_id', $request->id)
                        ->orderBy('fecha_inicio', 'desc')
                        ->get();

        return $tratamientos;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tratamientos $tratamientos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tratamientos $tratamientos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tratamientos $tratamientos)
    {
        //
    }
}

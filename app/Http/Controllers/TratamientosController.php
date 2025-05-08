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
        //return the data from the request
        // $tratamiento = Tratamientos::create([
        //     // 'customer_id' => $request->customerID,
        //     'medication_id' => $request->medicationID,
        //     // 'medico_id' => $request->medicoID,
        //     // 'user_id' => $request->user_id,
        //     'fecha_inicio' => $request->startDate,
        //     'fecha_fin' => $request->endDate,
        //     'frecuencia' => $request->interval,
        //     'treatment' => $request->treatmentDays,
        //     // 'observaciones' => $request->observaciones
        // ]);

        return response()->json([
            'message' => 'Tratamiento creado correctamente',
            'tratamiento' => [
                // 'customer_id' => $request->tratamiento->customerID,
                'medication_id' => $request->tratamiento["medicationID"],
                'medico_id' => $request->tratamiento["medicoID"],
                // 'user_id' => $request->tratamiento->user_id,
                'fecha_inicio' => $request->tratamiento["startDate"],
                'fecha_fin' => $request->tratamiento["endDate"],
                'frecuencia' => $request->tratamiento["interval"],
                'treatment' => $request->tratamiento["treatmentDays"],
                // 'observaciones' => $request->observaciones
            ]
        ], 201);
        //return $tratamiento;
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        /* Trae los tratamientos de un customer con, la medicacion, el medico y el usuatio que creo el tratamiento */
        /* -- */
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

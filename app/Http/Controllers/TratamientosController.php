<?php

namespace App\Http\Controllers;

use App\Models\Tratamientos;
use Carbon\Carbon;
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
        //validate the request
        $validated = $request->validate([
          'tratamiento.startDate' => 'required|date',
          'tratamiento.endDate' => 'required|date',
          'tratamiento.ttoDiaMes' => 'required|integer',
          'tratamiento.medicoID' => 'required|integer',
          'tratamiento.medicationID' => 'required|integer',
          'tratamiento.customerID' => 'required|integer',
          'tratamiento.userID' => 'required|integer',
          'tratamiento.activo' => 'required|boolean',
          'tratamiento.treatmentDays' => 'required|integer',
          'tratamiento.totalDiasPendientes' => 'required|integer',
          'tratamiento.retirosPorMes' => 'required|integer',
          'tratamiento.retirosPendientes' => 'required|integer',
          'tratamiento.tipoTto' => 'required|string',
          'tratamiento.frecuencia' => 'required|integer',
          'tratamiento.cantidadDiaria' => 'required|integer',
          // 'tratamiento.numero' => 'required|object' // Uncomment if needed
        ]);

        $startDate = Carbon::parse($validated['tratamiento']['startDate'])->format('Y-m-d H:i:s');
        $endDate = Carbon::parse($validated['tratamiento']['endDate'])->format('Y-m-d H:i:s');

        //create a new treatment
        $tratamiento = Tratamientos::create([
          'customer_id' => $validated['tratamiento']['customerID'],
          'medicos_id' => $validated['tratamiento']['medicoID'],
          'medication_id' => $validated['tratamiento']['medicationID'],
          'user_id' => $validated['tratamiento']['userID'],
          'fecha_inicio' => $startDate,
          'fecha_fin' => $endDate,
          'tto_dias_mes' => $validated['tratamiento']['ttoDiaMes'],
          'activo' => $validated['tratamiento']['activo'],
          'total_tto_dias' => $validated['tratamiento']['treatmentDays'],
          'total_tto_dias_pendientes' => $validated['tratamiento']['totalDiasPendientes'],
          'retiros_pendientes' => $validated['tratamiento']['retirosPendientes'],
          'retiros_por_mes' => $validated['tratamiento']['retirosPorMes'],
          'tipo_tto' => $validated['tratamiento']['tipoTto'],
          'frecuencia' => $validated['tratamiento']['frecuencia'],
          'cantidad_diaria' => $validated['tratamiento']['cantidadDiaria'],
        ]);

        //save the treatment in the BD
        if ($tratamiento) {
          $tratamiento->save();
          return response()->json([
            'message' => 'Tratamiento creado correctamente',
            'tratamiento' => $tratamiento
          ], 201);
        }else {
          return response()->json([
            'message' => 'Error al crear el tratamiento',
            'tratamiento' => null
          ], 500);
        }
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

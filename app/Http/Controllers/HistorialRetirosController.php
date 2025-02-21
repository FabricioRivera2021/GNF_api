<?php

namespace App\Http\Controllers;

use App\Models\HistorialRetiros;
use Illuminate\Http\Request;

class HistorialRetirosController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //muestra todos los retiros de un customer
        $retiros = HistorialRetiros::with('medication', 'medicos', 'user')->where('customer_id', $request->id)->get();

        return $retiros;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistorialRetiros $historialRetiros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HistorialRetiros $historialRetiros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistorialRetiros $historialRetiros)
    {
        //
    }
}

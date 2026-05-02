<?php

namespace App\Http\Controllers;

use App\Models\Drugs;
use App\Models\Laboratorio;
use App\Models\Medicamento;
use App\Models\PresentacionFarmaceutica;
use App\Models\Unidad;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index() {
        return Medicamento::with('drogas', 'laboratorio', 'presentacion_farmaceutica', 'unidad')->get();
    }

    //guardar la medicacion junto con las drogas que se le hayan asignado en la tabla de medicacion_droga
    public function store(Request $request){
        $request->validate([
            'medication.name' => 'required|string', 
            'medication.lab' => 'required|string',//referencia 
            'medication.codigoInterno' => 'required|numeric', 
            'medication.codigoBarras' => 'required|numeric', 
            'medication.vademecum' => 'required', 
            'medication.estado' => 'required|boolean', 
            'medication.presentacion' => 'required|string',//referencia
            'medication.concentracionBase' => 'required|numeric', 
            'medication.unidad' => 'required|string',//referencia
            'medication.requireColdStorage' => 'required|boolean', 
            'medication.ranurable' => 'required|boolean', 
            'medication.ventaBajoReceta' => 'required|boolean', 
            'medication.medicacionControlada' => 'required|boolean', 
        ]);

        //recuperar los id de las drogas ingresadas
        $droga = '';
        $drogas_nombre = [];
        foreach($request['medication.drug'] as $droga){
            $drogas_nombre[] = $droga['name'];
        };

        $drogas_id = Drugs::whereIn('droga', $drogas_nombre)->get()->pluck('id');

        //recuperar id de laboratorio
        $lab_id = Laboratorio::where('razon_social', $request['medication.lab'])->get()->value('id');
        
        //recuperar id de la presentacion
        $presentacion_id = PresentacionFarmaceutica::where('nombre', $request['medication.presentacion'])->get()->value('id');
        
        //recuperar id de la unidad base
        $unidad_base_id = Unidad::where('codigo', $request['medication.unidad'])->get()->value('id');

        //lo que se va a guardar en la DB
        $medicacion = Medicamento::create([
            'nombre_comercial' => $request['medication.name'], 
            'laboratorio_id' => $lab_id,
            'presentacion_id' => $presentacion_id,
            'via_administracion_id' => 1, //!hardcodeado
            'unidad_base_id' => $unidad_base_id,
            'requiere_receta' => $request['medication.ventaBajoReceta'], 
            'requiere_refrigeracion' => $request['medication.requireColdStorage'], 
            'es_ranurable' => $request['medication.ranurable'], 
            'categoria_id' => 1,//!hardcodeado
            'codigo_barra' => $request['medication.codigoBarras'], 
            'activo' => $request['medication.estado'], //! alias estado
            'contenido' => $request['medication.concentracionBase'], //!concentracion BASE 
            'contenido_por_unidad' => null, //!nullabe, solo para cuando el contenido es por comprimido o dosis, etc.
            'tiene_contenido_x_unidad' => 0, //!solo para saber si el contenido es por comp o por empaque general

            //! no estan creadas en la base de datos todavia
            // 'codigoInterno' => $request['medication.codigoInterno'],
            // 'vademecum' => $request['medication.vademecum'], 
            // 'medicacionControlada' => $request['medication.medicacionControlada'], 
        ]);

        //asignar las referencias de las drogas a la medicacion con sync (interesante accion esta)
        $medicacion->drogas()->sync($drogas_id);
        
    }
}

    // public function store(Request $request)
    // {
    //     //validar que el nombre de la droga no este vacio
    //     $request->validate([
    //         'droga' => 'required|string|max:255',
    //     ]);

    //     //crear nueva droga
    //     $drug = new Drugs();
    //     $drug->droga = $request->droga;
    //     $drug->save();

    //     return response()->json(['message' => 'Droga creada exitosamente', 'drug' => $drug], 201);
    // }
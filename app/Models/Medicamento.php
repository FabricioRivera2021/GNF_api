<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    /** @use HasFactory<\Database\Factories\MedicamentoFactory> */
    use HasFactory;


    //una medicacion puede estar en muchos registros de retiros
    public function retiros(){
        return $this->hasMany(HistorialRetiros::class);
    }

    //? revisar
    // public function grupos_terapeuticos()
    // {
    //     return $this->belongsToMany(
    //         GrupoTerapeutico::class, 'grupo_terapeutico_medications', 'medication_id', 'grupo_terapeutico_id'
    //     );
    // }

    //? revisar
    // public function via_administracion()
    // {
    //     return $this->belongsToMany(
        // Related model          //pivot table name                // foreign key for this model  // Foreign key for related model
    //         ViaAdministracion::class, 'via_administracion_medications', 'medication_id',               'via_administracion_id'
    //     );
    // }

    //  una medicacion tiene una unidad de medida
    // public function unidad_medida()
    // {
    //     return $this->belongsTo(UnidadMedida::class);
    // }

    // una medicacion tiene una categoria
    // public function categoria()
    // {
    //     return $this->belongsTo(Categoria::class);
    // }

    // una medicacion tiene una presentacion farmaceutica
    public function presentacion_farmaceutica()
    {
        return $this->belongsTo(
            PresentacionFarmaceutica::class,
            'presentacion_id'    
        );
    }

    // una medicacion tiene un laboratorio
    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class);
    }

    public function drogas()
    {
        return $this->belongsToMany(
            Drugs::class,          // modelo relacionado
            'medicamento_drogas',  // tabla pivote
            'medicamento_id',      // FK de este modelo en la pivote
            'droga_id'             // FK del otro modelo
        );
    }

}

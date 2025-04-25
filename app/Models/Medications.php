<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medications extends Model
{
    use HasFactory;
    //

    //puede estar en muchos tratamientos
    public function tratamientos()
    {
        return $this->hasMany(Tratamientos::class);
    }

    //una medicacion puede estar en muchos registros de retiros
    public function retiros(){
        return $this->hasMany(HistorialRetiros::class);
    }

    public function grupos_terapeuticos()
    {
        return $this->belongsToMany(
            GrupoTerapeutico::class, 'grupo_terapeutico_medications', 'medication_id', 'grupo_terapeutico_id'
        );
    }

    public function via_administracion()
    {
        return $this->belongsToMany(
            // Related model          //pivot table name                // foreign key for this model  // Foreign key for related model
            ViaAdministracion::class, 'via_administracion_medications', 'medication_id',               'via_administracion_id'
        );
    }

    // una medicacion tiene una unidad de medida
    public function unidad_medida()
    {
        return $this->belongsTo(UnidadMedida::class);
    }

    // una medicacion tiene una categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // una medicacion tiene una presentacion farmaceutica
    public function presentacion_farmaceutica()
    {
        return $this->belongsTo(PresentacionFarmaceutica::class);
    }

    // una medicacion tiene un laboratorio
    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class);
    }
}

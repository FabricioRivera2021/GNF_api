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
}

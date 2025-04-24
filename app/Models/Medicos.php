<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    use HasFactory;
    //

    //puede estar en muchos tratamientos
    public function tratamientos()
    {
        return $this->hasMany(Tratamientos::class);
    }

    //puede tener varias especialidades
    public function especialidades()
    {
        return $this->belongsToMany(Especialidad::class);
    }
}

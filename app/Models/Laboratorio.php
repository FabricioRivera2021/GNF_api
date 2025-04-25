<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    /** @use HasFactory<\Database\Factories\LaboratorioFactory> */
    use HasFactory;

    // un laboratorio tiene muchas medicaciones
    public function medicaciones()
    {
        return $this->hasMany(Medications::class);
    }
}

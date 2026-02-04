<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    /** @use HasFactory<\Database\Factories\LaboratoriosFactory> */
    use HasFactory;

    //un laboratorio puede estar en muchas medicaciones
    public function medications()
    {
        return $this->hasMany(Medicamento::class);
    }
}

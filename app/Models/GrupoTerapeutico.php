<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoTerapeutico extends Model
{
    /** @use HasFactory<\Database\Factories\GrupoTerapeuticoFactory> */
    use HasFactory;

    public function medication()
    {
        return $this->belongsToMany(Medications::class);
    }
}

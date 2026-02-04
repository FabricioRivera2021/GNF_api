<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lotes extends Model
{
    /** @use HasFactory<\Database\Factories\LotesFactory> */
    use HasFactory;

    //un lote pertenece a una medicacion
    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class);
    }
}

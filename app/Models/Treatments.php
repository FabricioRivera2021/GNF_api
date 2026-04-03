<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatments extends Model
{
    /** @use HasFactory<\Database\Factories\TreatmentsFactory> */
    use HasFactory;

    //una medicacion puede estar en muchos tratamientos
    public function medication()
    {
        return $this->belongsTo(Medicamento::class);
    }
}

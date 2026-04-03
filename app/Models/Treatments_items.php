<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatments_items extends Model
{
    /** @use HasFactory<\Database\Factories\TreatmentsItemsFactory> */
    use HasFactory;

    //un item de tratamiento pertenece a una medicacion
    public function medication()
    {
        return $this->belongsTo(Medicamento::class);
    }
}

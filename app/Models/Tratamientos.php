<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tratamientos extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'medication_id', 'medico_id', 'user_id', 'fecha_inicio', 'fecha_fin', 'frecuencia', 'treatment', 'observaciones'
    ];

    //tiene una medicacion
    public function medication(): BelongsTo
    {
        return $this->belongsTo(Medications::class);
    }

    //tiene un customer
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customers::class);
    }

    //tiene un medico
    public function medicos(): BelongsTo
    {
        return $this->belongsTo(Medicos::class);
    }

    //un usuario lo creo
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistorialRetiros extends Model
{
    use HasFactory;

    public function customer(): BelongsTo{
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
    //tiene una medicacion
    public function medication(): BelongsTo
    {
        return $this->belongsTo(Medications::class);
    }
}

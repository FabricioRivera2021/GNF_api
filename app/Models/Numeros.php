<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Numeros extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero', 'estados_id', 'filas_id', 'customers_id', 'paused', 'canceled'
    ];

    public function estados(): BelongsTo
    {
        return $this->belongsTo(Estados::class);
    }

    public function filas(): BelongsTo
    {
        return $this->belongsTo(Filas::class);
    }

    public function customers(): HasMany
    {
        return $this->HasMany(Customers::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

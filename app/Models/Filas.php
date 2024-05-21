<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Filas extends Model
{
    use HasFactory;

    protected $fillable = [
        'filas'
    ];

    public function numeros():HasMany
    {
        return $this->HasMany(Numeros::class);
    }
}

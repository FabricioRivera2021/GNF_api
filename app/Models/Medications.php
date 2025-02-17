<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medications extends Model
{
    use HasFactory;
    //

    //puede estar en muchos tratamientos
    public function tratamientos()
    {
        return $this->hasMany(Tratamientos::class);
    }
}

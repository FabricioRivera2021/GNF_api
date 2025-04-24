<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    /** @use HasFactory<\Database\Factories\UnidadMedidaFactory> */
    use HasFactory;

    //one medication has only one unit of measurment
    public function medications()
    {
        return $this->hasMany(Medications::class);
    }

}

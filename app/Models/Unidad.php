<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    /** @use HasFactory<\Database\Factories\UnidadMedidaFactory> */
    use HasFactory;

    protected $table = 'unidades';

    //one medication has only one unit of measurment
    public function medications()
    {
        return $this->hasMany(Medicamento::class);
    }

}

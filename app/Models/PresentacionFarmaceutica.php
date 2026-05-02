<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresentacionFarmaceutica extends Model
{
    /** @use HasFactory<\Database\Factories\PresentacionFarmaceuticaFactory> */
    use HasFactory;

    protected $table = 'presentaciones';

    //una presentacion farmaceutica puede estar en muchas medicaciones
    public function medications()
    {
        return $this->hasMany(
            Medicamento::class,
            'presentacion_id'
        );
    }

    //una presentacion puede tener muchas unidades base de medida
    public function unidades()
    {
        return $this->belongsToMany(
            Unidad::class,
            'presentacion_unidad',
            'presentacion_id',
            'unidad_id'
        );
    }
}

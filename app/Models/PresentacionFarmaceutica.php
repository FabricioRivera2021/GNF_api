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
}

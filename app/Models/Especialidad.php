<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    /** @use HasFactory<\Database\Factories\EspecialidadFactory> */
    protected $table = 'especialidades'; // <-- Manual name

    protected $fillable = [
        'nombre',
        'descripcion',
        'codigo',
        'estado',
    ];
    use HasFactory;

    //una especialidad puede estar en muchos medicos
    public function medicos()
    {
        return $this->belongsToMany(Medicos::class);
    }
}

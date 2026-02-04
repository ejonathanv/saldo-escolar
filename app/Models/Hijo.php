<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hijo extends Model
{
    /** @use HasFactory<\Database\Factories\HijoFactory> */
    use HasFactory;

    protected $fillable = ['tutor_id', 'foto', 'nombre', 'apellido', 'grado', 'grupo'];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function depositos()
    {
        return $this->hasMany(Deposito::class);
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }

    public function restricciones()
    {
        return $this->hasMany(Restriccion::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restriccion extends Model
{
    /** @use HasFactory<\Database\Factories\RestriccionFactory> */
    use HasFactory;

    protected $fillable = ['hijo_id', 'categoria_restriccion_id', 'restringido'];

    public function hijo()
    {
        return $this->belongsTo(Hijo::class);
    }

    public function categoriaRestriccion()
    {
        return $this->belongsTo(CategoriaRestriccion::class);
    }
}

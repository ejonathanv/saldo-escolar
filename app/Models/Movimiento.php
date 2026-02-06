<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    /** @use HasFactory<\Database\Factories\MovimientoFactory> */
    use HasFactory;

    protected $fillable = ['hijo_id', 'producto_id', 'costo'];

    public function hijo()
    {
        return $this->belongsTo(Hijo::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function getCostoTotalAttribute(){
        return '$' . number_format($this->costo, 2);
    }
}

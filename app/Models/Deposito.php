<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    /** @use HasFactory<\Database\Factories\DepositoFactory> */
    use HasFactory;

    protected $fillable = ['tutor_id', 'hijo_id', 'cantidad'];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function hijo()
    {
        return $this->belongsTo(Hijo::class);
    }
}

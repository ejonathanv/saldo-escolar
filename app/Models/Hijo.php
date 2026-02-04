<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hijo extends Model
{
    /** @use HasFactory<\Database\Factories\HijoFactory> */
    use HasFactory;

    protected $fillable = ['foto', 'nombre', 'apellido', 'grado', 'grupo'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaRestriccion extends Model
{
    /** @use HasFactory<\Database\Factories\CategoriaRestriccionFactory> */
    use HasFactory;

    protected $fillable = ['nombre'];
}

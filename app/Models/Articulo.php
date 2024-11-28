<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model{

    protected $fillable = ['codigo', 'denominacion', 'precio'];

    /** @use HasFactory<\Database\Factories\ArticuloFactory> */
    use HasFactory;
}

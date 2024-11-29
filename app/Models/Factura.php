<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable = ['numero','user_id'];
    /** @use HasFactory<\Database\Factories\FacturaFactory> */
    use HasFactory;

    function user(){
        return $this->belongsTo(User::class);
    }

    public function articulos()
    {
        return $this->belongsToMany(Articulo::class);
    }
}

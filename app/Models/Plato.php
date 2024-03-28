<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_plato',
        'id_categoria',
        'descripcion',
        'precio',
        'costo'
    ];
}

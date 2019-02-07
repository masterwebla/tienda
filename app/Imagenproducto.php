<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagenproducto extends Model
{
    protected $table = 'imagenes_productos';
    protected $fillable = ['archivo','producto_id'];
}

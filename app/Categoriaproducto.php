<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoriaproducto extends Model
{
    protected $table = 'categorias_productos';
    protected $fillable = ['categoria_id','producto_id'];
    public $timestamps = false;
}

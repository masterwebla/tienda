<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'estados_pedidos';
    protected $fillable = ['nombre','cantidad','precio','descripcion',
		'descripcion_detallada','estado_id'];
}

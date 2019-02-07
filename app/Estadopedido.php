<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadopedido extends Model
{
    protected $table = 'estados_pedidos';
    protected $fillable = ['nombre'];
    public $timestamps = false;
}

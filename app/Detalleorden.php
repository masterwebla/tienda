<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalleorden extends Model
{
    protected $table = 'detalles_ordenes';
    protected $fillable = ['cantidad','precio','orden_id','producto_id'];
}

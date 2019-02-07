<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metodopago extends Model
{
    protected $table = 'metodos_pago';
    protected $fillable = ['nombre','descripcion'];
    public $timestamps = false;
}

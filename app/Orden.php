<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'ordenes';
    protected $fillable = ['fecha','subtotal','envio','user_id',
    	'metodo_id','estado_pedido_id'];
}

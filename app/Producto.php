<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre','cantidad','precio','descripcion',
		'descripcion_detallada','estado_id'];

	//Relación con el modelo Estadoproducto
	public function estado()
    {
        return $this->belongsTo('App\Estadoproducto');
    }
}

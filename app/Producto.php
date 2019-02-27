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

    //Función Scope para buscar por nombre
    public function scopeNombre($query,$nombre){
    	if($nombre)
    		return $query->where('nombre','LIKE',"%$nombre%");
    }

    //Función para buscar por precio
    public function scopePrecio($query,$precio){
    	if($precio)
    		return $query->where('precio','<=',$precio);
    }

    //Función para buscar por precio
    public function scopeEstado($query,$estado_id){
    	if($estado_id)
    		return $query->where('estado_id',$estado_id);
    }
}

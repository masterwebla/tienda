@extends('admin.template')
@section('titulo','Editar producto')

@section('contenido')
	<div class="container">
		{!!Form::model($producto,['route'=>['productos.update',$producto->id],'method'=>'put'])!!}
			@include('admin.productos.formulario')		
		{!!Form::close()!!}
	</div>
@endsection
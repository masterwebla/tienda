@extends('admin.template')
@section('titulo','Crear Producto')

@section('contenido')
	<div class="container">
		<h2>Crear nuevo Producto</h2>
		{!!Form::open(['route'=>'productos.store'])!!}
			@include('admin.productos.formulario')		
		{!!Form::close()!!}			
	</div>
@endsection
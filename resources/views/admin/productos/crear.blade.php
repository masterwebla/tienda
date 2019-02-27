@extends('admin.template')
@section('titulo','Crear Producto')

@section('contenido')
	<div class="col-12">
        <div class="card">
			<h2 class="text-center">CREAR PRODUCTO</h2>
			{!!Form::open(['route'=>'productos.store'])!!}
				@include('admin.productos.formulario')		
			{!!Form::close()!!}
		</div>
	</div>
@endsection
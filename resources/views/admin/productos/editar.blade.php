@extends('admin.template')
@section('titulo','Editar producto')

@section('contenido')
	<div class="col-12">
        <div class="card">
        	<h2 class="text-center">EDITAR PRODUCTO</h2>
			{!!Form::model($producto,['route'=>['productos.update',$producto->id],'method'=>'put'])!!}
				@include('admin.productos.formulario')		
			{!!Form::close()!!}
		</div>
	</div>
@endsection
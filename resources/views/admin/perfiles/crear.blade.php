@extends('admin.template')
@section('titulo','Crear Perfil')

@section('contenido')
	<div class="container">
		<h2>Crear nuevo Perfil</h2>
		{!!Form::open(['route'=>'perfiles.store'])!!}
			@include('admin.perfiles.formulario')		
		{!!Form::close()!!}			
	</div>
@endsection
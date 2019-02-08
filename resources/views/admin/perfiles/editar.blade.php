@extends('admin.template')
@section('titulo','Editar perfil')

@section('contenido')
	<div class="container">
		{!!Form::model($perfil,['route'=>['perfiles.update',$perfil->id],'method'=>'put'])!!}
			@include('admin.perfiles.formulario')		
		{!!Form::close()!!}
	</div>
@endsection
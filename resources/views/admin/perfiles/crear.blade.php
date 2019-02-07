@extends('admin.template')
@section('titulo','Crear Perfil')

@section('contenido')
	<div class="container">
		<h2>Crear nuevo Perfil</h2>
		<div class="row">
			<div class="col-md-6">
				{!!Form::open(['route'=>'perfiles.store'])!!}
					@include('admin.perfiles.formulario')		
				{!!Form::close()!!}
			</div>
			<div class="col-md-6">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit repudiandae nisi architecto unde blanditiis sed accusamus molestiae dicta nesciunt, laudantium perferendis suscipit ratione, non iusto quaerat veniam, doloremque officia dolorum!</p>
			</div>
		</div>				
	</div>
@endsection
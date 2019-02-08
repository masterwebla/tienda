@extends('admin.template')
@section('titulo','Perfiles')
@section('contenido')
	<div class="container">
		<h1 class="text-center">PERFILES <a class="btn btn-success" href="{{route('perfiles.create')}}"><i class="fa fa-plus"></i></a></h1>
		<!-- MENSAJES INFORMATIVOS -->

		@include('admin.secciones.mensajes')
		
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<td>Nombre</td>
					<td>Editar</td>
					<td>Borrar</td>
				</tr>
			</thead>
			<tbody>
				@foreach($perfiles as $perfil)
					<tr>
						<td>{{$perfil->nombre}}</td>
						<td><a class="btn btn-warning" href="{{route('perfiles.edit',$perfil->id)}}"><i class="fa fa-edit"></i></a></td>
						<td>
							{!!Form::open(['route'=>['perfiles.destroy',$perfil->id],'method'=>'delete'])!!}
								<button class="btn btn-danger" type="submit" onClick="return confirm('Eliminar perfil?')"><i class="fa fa-trash"></i></button>
							{!!Form::close()!!}
						</td>
					</tr>
				@endforeach				
			</tbody>
		</table>
		<!-- BLOQUE DE PAGINACIÓN -->
		<div class="text-center">
			{{$perfiles->links()}}
		</div>
	</div>
@endsection
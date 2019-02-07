@extends('admin.template')
@section('titulo','Perfiles')
@section('contenido')
	<div class="container">
		<h1 class="text-center">PERFILES <a class="btn btn-success" href="{{route('perfiles.create')}}"><i class="fa fa-plus"></i></a></h1>
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
						<td><a class="btn btn-warning" href="#"><i class="fa fa-edit"></i></a></td>
						<td><a class="btn btn-danger" href="#"><i class="fa fa-trash"></i></a></td>
					</tr>
				@endforeach				
			</tbody>
		</table>
	</div>
@endsection
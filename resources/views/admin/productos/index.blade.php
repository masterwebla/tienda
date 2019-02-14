@extends('admin.template')
@section('titulo','Productos')
@section('contenido')
	<div class="container">
		<h1 class="text-center">PRODUCTOS <a class="btn btn-success" href="{{route('productos.create')}}"><i class="fa fa-plus"></i></a></h1>
		<!-- MENSAJES INFORMATIVOS -->

		@include('admin.secciones.mensajes')
		
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>Descripcion</th>
					<th>Estado</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($productos as $producto)
					<tr>
						<td>{{$producto->nombre}}</td>
						<td>{{$producto->cantidad}}</td>
						<td>${{$producto->precio}}</td>
						<td>{{$producto->descripcion}}</td>
						<td>{{$producto->estado->nombre}}</td>
						<td>
							{!!Form::open(['route'=>['productos.destroy',$producto->id],'method'=>'delete'])!!}	
								<a class="btn btn-info" href="{{route('imagenes',$producto->id)}}"><i class="fa fa-image"></i></a>
								<a class="btn btn-warning" href="{{route('productos.edit',$producto->id)}}"><i class="fa fa-edit"></i></a>							
								<button class="btn btn-danger" type="submit" onClick="return confirm('Eliminar producto?')"><i class="fa fa-trash"></i></button>
							{!!Form::close()!!}
						</td>
					</tr>
				@endforeach				
			</tbody>
		</table>
		<!-- BLOQUE DE PAGINACIÓN -->
		<div class="text-center">
			{{$productos->links()}}
		</div>
	</div>
@endsection
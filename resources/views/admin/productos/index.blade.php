@extends('admin.template')
@section('titulo','Productos')
@section('contenido')
	<div class="col-12">
		<?php
			//Definir las variables para recordar que se digito en las cajas del filtro
			$nombre = null; $precio=null;
			if($_GET){
				if($_GET['nombre'])
					$nombre = $_GET['nombre'];
				if($_GET['precio'])
					$precio = $_GET['precio'];
			}						
		?>
        <div class="card">
			<h1 class="text-center">PRODUCTOS 
				<a class="btn btn-success" href="{{route('productos.create')}}"><i class="fa fa-plus"></i></a>
				{!!Form::open(['route'=>'productos-pdf','method'=>'get','class'=>'form-inline'])!!}
					{!!Form::hidden('nombre',$nombre)!!}
					{!!Form::hidden('precio',$precio)!!}
					<button class="btn btn-warning" type="submit"><i class="fa fa-file-pdf-o"></i></button>
				{!!Form::close()!!}
			</h1>
			<!-- FILTROS -->
			<div class="text-center">
				{!!Form::open(['route'=>'productos.index','method'=>'get','class'=>'form-inline'])!!}
					{!!Form::text('nombre',$nombre,['class'=>'form-control','placeholder'=>'Nombre...'])!!}
					{!!Form::number('precio',$precio,['class'=>'form-control','placeholder'=>'Precio...'])!!}
					{!!Form::select('estado_id',$estados,null,['class'=>'form-control','placeholder'=>'Estado...'])!!}
					{!!Form::select('paginas',['5'=>'5','10'=>'10'],null,['class'=>'form-control','placeholder'=>'Resultados...'])!!}
					<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
					<a class="btn btn-info" href="{{ route('productos.index') }}"><i class="fa fa-refresh"></i></a>
				{!!Form::close()!!}
			</div>				
			<!-- FIN - FILTROS -->

			<!-- MENSAJES INFORMATIVOS -->
			@include('admin.secciones.mensajes')

			<br>
			
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
							<td>
								<?php 
									if($producto->estado_id==1)
										$color = "success";
									else
										$color = "danger";
								?>
								<span class="badge badge-{{$color}}">{{$producto->estado->nombre}}</span>
							</td>
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
				{{$productos->appends(['nombre'=>"$nombre",'precio'=>"$precio"])->links()}}
			</div>
		</div>
	</div>
@endsection
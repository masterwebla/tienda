@extends('admin.template')
@section('titulo','Imágenes')
@section('contenido')
	<div class="col-12">
        <div class="card">
			<h1 class="text-center">Imágenes para {{$producto->nombre}} </h1>
			{!!Form::open(['route'=>'img-guardar','files'=>'true','class'=>'text-center'])!!}
				<input type="hidden" name="producto_id" value="{{$producto->id}}">
				<input type="file" name="archivo">
				<button class="btn btn-success" type="submit"><i class="fa fa-save"></i></button>
				<a class="btn btn-primary" href="{{ route('productos.index') }}">Volver a productos</a>
			{!!Form::close()!!}	

			<hr>

			@include('admin.secciones.mensajes')

			<div class="row">
				@foreach($imagenes as $imagen)
					<div class="col-md-3">
						<div class="card">
						  <img class="card-img-top" src="{{asset('imgproductos/'.$imagen->archivo)}}" alt="Card image">
						  <div class="card-body text-center">
						    <h4 class="card-title">{{$producto->nombre}}</h4>
						    {!!Form::open(['route'=>['img-borrar',$imagen->id],'method'=>'delete'])!!}								
								<button class="btn btn-danger" type="submit" onClick="return confirm('Eliminar imagen?')"><i class="fa fa-trash"></i></button>
							{!!Form::close()!!}
						  </div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection
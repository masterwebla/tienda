@extends('admin.template')
@section('titulo','Imágenes')
@section('contenido')
	<div class="container">
		<h1 class="text-center">Imágenes para {{$producto->nombre}} </h1>
		{!!Form::open(['route'=>'img-guardar'])!!}
			<input type="hidden" name="producto_id" value="{{$producto->id}}">
			<input type="file" name="archivo">
			<button class="btn btn-success" type="submit"><i class="fa fa-save"></i></button>
		{!!Form::close()!!}	

		<hr>

		<div class="row">
			@foreach($imagenes as $imagen)
				<div class="col-md-3">
					<img src="{{$imagen->archivo}}">
				</div>
			@endforeach
		</div>

	</div>
@endsection
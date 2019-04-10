@extends('admin.template')
@section('titulo','Importar Excel Productos')

@section('contenido')
	<div class="col-12">
        <div class="card">
			<h2 class="text-center">IMPORTAR EXCEL PRODUCTOS</h2>
			<!--EL ATRIBUTO files, permite al formulario adjuntar archivos -->
			{!!Form::open(['route'=>'productos-importar','method'=>'post','files'=>'true'])!!}
				<input type="file" name="archivo-excel">
				<button class="btn btn-success" type="submit">Importar </button>
			{!!Form::close()!!}
		</div>
	</div>
@endsection
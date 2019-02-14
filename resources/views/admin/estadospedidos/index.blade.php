@extends('admin.template')
@section('titulo','Estados Pedidos')

@section('contenido')
	<div class="container">
		<h2 class="text-center">ESTADOS DE PEDIDOS</h2>
	</div>	

	<br>	

	<div class="container">
		{!!Form::open(['route'=>'estadospedidos.store'])!!}
			@include('admin.estadospedidos.formulario')		
		{!!Form::close()!!}	
	</div>
	
	<div class="row justify-content-center" style="margin-top: 20px; " >
        <div class="col-md-8" style="border-style: ridge; border-width:0.3px; border-color: #DAA520;" >
        </div>    
    </div>

    <br>

	@include('admin.estadospedidos.formulario1')	
@endsection
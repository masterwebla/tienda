@extends('admin.template')
@section('titulo','Métodos de Pago')

@section('contenido')
    <div class="col-12">
        <div class="card">
			<h2>MÉTODOS DE PAGO</h2>
			@include('admin.secciones.mensajes')
			<!-- FORMULARIO -->
			{!!Form::open(['id'=>'formguardar'])!!}
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="form-group">
							<label for="nombre">Nombre: </label>
							{!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresar nombre...','required'=>'required','id'=>'nombre_in']) 
							!!}
						</div>
						<div class="form-group">
							<label for="descripcion">Descripción: </label>
							{!! Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresar descripcion...','required'=>'required','id'=>'descrip_in'])
							!!}
						</div>					
						<!-- Se define tipo button para que no haga submit al formulario -->
						<button type="button" id="btn-guardar" class="btn btn-success btn-block"><i class="fa fa-save"></i> Guardar</button>
					</div>
				</div>
						
			{!!Form::close()!!}

			<br><br>			

			<!-- TABLA -->
			<table id="tablametodos" class="table table-striped table-hover">
				<thead>
					<tr>
						<td>Nombre</td>
						<td>Descripción</td>
						<td>Editar</td>
					</tr>
				</thead>
				<tbody>
					@foreach($metodos as $metodo)
						<tr>
							<td>{{$metodo->nombre}}</td>
							<td>{{$metodo->descripcion}}</td>
							<td><a onclick="consultar({{$metodo->id}})" class="btn btn-warning" data-toggle="modal" data-target="#modaleditar"><i class="fa fa-edit"></i></a></td>
						</tr>
					@endforeach				
				</tbody>
			</table>
			<!-- BLOQUE DE PAGINACIÓN -->
			<div class="text-center">
				{{$metodos->links()}}
			</div>
		</div>
	</div>

	<!-- The Modal -->
	@include('admin.metodos.modaleditar')
@endsection

@section('script')
	<script>
		$("#btn-guardar").click(function(){
			//Detectar valor ingresado en cada input
			var token_in = "{{ csrf_token() }}";
			var nombre_in = $('#nombre_in').val();
			var descripcion_in = $('#descrip_in').val();
			//AJAX - Para abrir la ruta metodos.store y pasarle los valores ingresados
			$.ajax({
				url:"{{route('metodos.store')}}",
				data:{_token:token_in,nombre:nombre_in,descripcion:descripcion_in},
				type:"POST",
				success:function(metodo){
					//La variable datos viene de store
					console.log(metodo);
					//Agregar nueva fila a la tabla con los nuevos datos
					$('#tablametodos').append('<tr><td>'+metodo.nombre+'</td><td>'+metodo.descripcion+'</td><td><a class="btn btn-warning"><i class="fa fa-edit"></i></a></td></tr>');
					//$('#tablametodos').html(metodos);
				}
			});
		});

		function consultar(id_in){
			//AJAX para abrir la ruta metodos.edit y retornara datos del método que se va a editar y los mostrará en el formulario
			$.ajax({
				url:'metodos/'+id_in+'/edit',
				data:{id:id_in},
				type:"GET",
				success:function(metodo){
					//La variable datos viene de store
					console.log(metodo);
					//Agregar los valores a los inputs de la modaleditar
					//$('#id').val(metodo.id);
					$('#nombre_in2').val(metodo.nombre);
					$('#descrip_in2').val(metodo.descripcion);
					//Agregar atributo action al formulario de modaleditar
					$('#formeditar').attr('action','metodos/'+metodo.id);
				}
			});

		}
	</script>
@endsection
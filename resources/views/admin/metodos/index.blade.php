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
							{!! Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresar descripcion...','required'=>'required','id'=>'descrip_in','onblur'=>'mostrarCampo1()'])
							!!}
						</div>
						<div class="form-group" id="campo1">
							<label for="campo1">Campo1: </label>
							{!! Form::text('campo1',null,['class'=>'form-control','placeholder'=>'Ingresar campo1...','required'=>'required','id'=>'campo1_in'])
							!!}
						</div>
						<!-- Se define tipo button para que no haga submit al formulario -->
						<button type="button" id="btn-guardar" class="btn btn-success btn-block"><i class="fa fa-save"></i> Guardar</button>
					</div>
				</div>
						
			{!!Form::close()!!}

			<br><br>			

			<!-- TABLA -->
			<table id="tablametodos" class="display nowrap table table-hover table-striped table-bordered"  class="table table-striped table-hover">
				<thead>
					<tr>
						<td>Nombre</td>
						<td>Descripción</td>
						<td>Opciones</td>
					</tr>
				</thead>
				<tbody>
					@foreach($metodos as $metodo)
						<tr>
							<td>{{$metodo->nombre}}</td>
							<td>{{$metodo->descripcion}}</td>
							<td>								
								<a onclick="consultar({{$metodo->id}})" class="btn btn-primary" data-toggle="modal" data-target="#modaleditar"><i class="fa fa-edit"></i></a>
								<!-- this, palabra reservada de javascript que hace referencia al elemento donde estoy -->
								<a onclick="eliminar({{$metodo->id}},this)" class="btn btn-danger"><i class="fa fa-trash"></i></a>	
							</td>

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
		//Inicializar DataTable
		$('#tablametodos').DataTable({
			paging:   false,
			language: {
	            "sProcessing":     "Procesando...",
			    "sLengthMenu":     "Mostrar _MENU_ registros",
			    "sZeroRecords":    "No se encontraron resultados",
			    "sEmptyTable":     "Ningún dato disponible en esta tabla",
			    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			    "sInfoPostFix":    "",
			    "sSearch":         "Buscar:",
			    "sUrl":            "",
			    "sInfoThousands":  ",",
			    "sLoadingRecords": "Cargando...",
			    "oPaginate": {
			        "sFirst":    "Primero",
			        "sLast":     "Último",
			        "sNext":     "Siguiente",
			        "sPrevious": "Anterior"
			    },
			    "oAria": {
			        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			    }
	        },
	        dom: 'Bfrtip',
	        buttons: [
	            'copy', 'csv', 'excel', 'pdf', 'print'
	        ]
	    });

		//Hacer invisible el DIV con el input de campo1
		$('#campo1').hide();

		//Borrar detectando clic con JQuery
		//$("#descrip_in").click(function(){ $('#campo1').show(); });

		function mostrarCampo1(){
			$('#campo1').show();
		}

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
					$('#tablametodos').append('<tr><td>'+metodo.nombre+'</td><td>'+metodo.descripcion+'</td><td><a onclick="consultar('+metodo.id+')" class="btn btn-primary" data-toggle="modal" data-target="#modaleditar"><i class="fa fa-edit"></i></a> <a onclick="eliminar('+metodo.id+',this)" class="btn btn-danger"><i class="fa fa-trash"></i></a></td></tr>');
					//$('#tablametodos').html(metodos);
				}
			});
		});

		//Función para hacer el AJAX que consulta los datos del método que se va a editar
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

		//Función para hacer el AJAX que elimina un método
		function eliminar(id_in,objeto){
			var r = confirm('Eliminar metodo?');
			if (r == true) {
				var token_in = "{{ csrf_token() }}";
				//AJAX para abrir la ruta metodos.delete
				$.ajax({
					url:'metodos/'+id_in,
					data:{_token:token_in},
					type:"DELETE",
					success:function(metodo){
						console.log(metodo)
						//Borrar la fila de la tabla, con el primer parent borrar celda, con el segundo parent borrar fila
						$(objeto).parent().parent().remove();
						//alert('Metodo '+metodo+' borrado correctamente');					
					}
				});
			}
		}

	</script>
@endsection
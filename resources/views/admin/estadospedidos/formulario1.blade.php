<div class="container">
		<!-- MENSAJES INFORMATIVOS -->
		@include('admin.secciones.mensajes')
		
		<table class="table table-striped table-hover col-md-8 offset-2">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Editar</th>
					<th>Borrar</th>
				</tr>
			</thead>

			<tbody>
				@foreach($estados_pedidos as $estado_pedido)
					<tr>
						<td>{{$estado_pedido->nombre}}
						</td>

						<td><a class="btn btn-warning" href="{{route('estadospedidos.edit',$estado_pedido->id)}}"><i class="fa fa-edit"></i></a>
						</td>

						<td>
							{!!Form::open(['route'=>['estadospedidos.destroy',$estado_pedido->id],'method'=>'delete'])!!}
								<button class="btn btn-danger" type="submit" onClick="return confirm('Eliminar Estado?')">
									<i class="fa fa-trash"></i>
								</button>
							{!!Form::close()!!}
						</td>
					</tr>
				@endforeach				
			</tbody>
		</table>

		<br>

		<!-- BLOQUE DE PAGINACIÓN -->
		<div class="text-center">
			{{$estados_pedidos->links()}}
		</div>
	</div>
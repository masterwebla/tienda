<div class="modal" id="modaleditar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Editar Método</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
	  	{!!Form::open(['id'=>'formeditar','method'=>'PUT'])!!}
	      	<!-- Modal body -->
	      	{{--<input type="hidden" name="id">--}}
	      	<div class="modal-body">        	
        		<div class="form-group">
        			<label for="nombre">Nombre: </label>
					{!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresar nombre...','required'=>'required','id'=>'nombre_in2']) 
					!!}
        		</div>
				<div class="form-group">
					<label for="descripcion">Descripción: </label>
					{!! Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresar descripcion...','required'=>'required','id'=>'descrip_in2'])
					!!}
				</div>			
      		</div>
		    <!-- Modal footer -->
		    <div class="modal-footer">
		      	<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
		    </div>
      	{!!Form::close()!!}

    </div>
  </div>
</div>
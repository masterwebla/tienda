<div class="container">
    
		<div class="form-group col-md-6 offset-3">
			<label for="nombre">Nombre</label>
			{!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresar Nombre al Estado del Pedido...','required'=>'required']) !!}
		</div>

		<div class="form-group col-md-6 offset-3">
			<button type="submit" class="btn btn-success">
				 Guardar Estado &nbsp<i class="fa fa-save"></i>
			</button>
		</div>
	
</div>
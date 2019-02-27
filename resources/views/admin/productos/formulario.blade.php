<div class="form-group">
	<label for="nombre">Nombre</label>
	{!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresar nombre...','required'=>'required']) !!}
</div>
<div class="form-group">
	<label for="cantidad">Cantidad</label>
	{!! Form::number('cantidad',null,['class'=>'form-control','placeholder'=>'Ingresar cantidad...','required'=>'required']) !!}
</div>
<div class="form-group">
	<label for="precio">Precio</label>
	{!! Form::number('precio',null,['class'=>'form-control','placeholder'=>'Ingresar precio...','required'=>'required']) !!}
</div>
<div class="form-group">
	<label for="descripcion">Descripción</label>
	{!! Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresar descripcion...','required'=>'required']) !!}
</div>
<div class="form-group">
	<label for="descripcion_detallada">Descripción detallada</label>
	{!! Form::textarea('descripcion_detallada',null,['class'=>'form-control','placeholder'=>'Ingresar descripcion detallada...','required'=>'required']) !!}
</div>
<div class="form-group">
	<label for="estado_id">Estado</label>
	{!! Form::select('estado_id',$estados,null,['class'=>'form-control','placeholder'=>'Seleccionar estado...','required'=>'required']) !!}
</div>
<div class="form-group">
	<a class="btn btn-danger" href="{{route('productos.index')}}">Volver a Productos</a>
	<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar Producto</button>
</div>
<!DOCTYPE html>
<html>
<head>
	<title>Listado de Productos</title>
</head>
<body>
	<h1>Listado de Productos</h1>
	<table width="100%" border="1">
		<tr>
			<th>Nombre</th>
			<th>Cantidad</th>
			<th>Precio</th>
			<th>Descripcion</th>
			<th>Estado</th>
		</tr>
		@foreach($productos as $producto)
			<tr>
				<td>{{$producto->nombre}}</td>
				<td>{{$producto->cantidad}}</td>
				<td>${{$producto->precio}}</td>
				<td>{{$producto->descripcion}}</td>
				<td>{{$producto->estado->nombre}}</td>
			</tr>
		@endforeach
	</table>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Producto nuevo</title>
</head>
<body>
	<h1>Nuevo producto</h1>
	<p>Se ha creado un nuevo producto</p>
	<ul>
		<!-- Variables tomadas de los atributos de app/Mail/ProductoCreado.php -->
		<li>Nombre: {{$nombre}}</li>
		<li>Cantidad: {{$cantidad}}</li>
		<li>Precio: ${{$precio}}</li>
	</ul>
</body>
</html>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Formulario de alta de profesores</title>
	</head>
	<body>
		<h1>Formulario de alta de profesores</h1>
		<p>Por favor ingrese los siguientes datos para registrar los profesores:</p>
		<form name="alta "action="alta_profesor.php" method="post">
			<label for="nombre">Nombre: </label>
			<input type="text" name="nombre"><br/>
			<label for="apaterno">Apellido paterno: </label>
			<input type="text" name="apaterno"><br/>
			<label for="amaterno">Apellido materno: </label>
			<input type="text" name="amaterno"><br/>
			<label for="telefono">Número de teléfono: </label>
			<input type="telefono" name="telefono"><br/>
			<label for="correoe">Correo electrónico: </label>
			<input type="email" name="correoe"><br/>
			<input type="submit" value="Enviar">
		</form>
	</body>
</html>
			

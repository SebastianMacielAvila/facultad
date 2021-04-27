<?php
/*eliminar_alumno.php
 *Recibe el id de consulta_alumno.php para eliminar el registro.
 *author: SebastianMacielAvila
 *date: 21 04 2021
 */
//Recibe los datos:
//print_r($_POST);
$id = $_GET['id'];

//Abrir conexión al manejador:
echo "Importante: una vez que el registro sea borrado, no se podrá recuperar, favor de verificar que el registro a eliminar es el correcto.";
//Verificar que exista el registro de acceso para este usuario desde este equipo a esta BD en el archivo pg_hba.conf.
$con = pg_connect("port=5432 dbname=prueba1 user=usuario1 password=UE") or die (pg_last_error());
if($con){
	//Genera la consulta de actualización de datos:
	$query ="select nombre_alumno,apepaterno_alumno,apematerno_alumno,tel_alumno,correoe_alumno from alumnos where id_alumnos=".$id;
	$query = pg_query($con,$query);
	$consulta = pg_fetch_assoc($query);
?>
<table>
	<tr>
		<th>Nombre</th>
		<th>Apellido paterno</th>
		<th>Apellido materno</th>
		<th>Teléfono</th>
		<th>Correo</th>
	</tr>
	<tr>
		<td><?php echo $consulta['nombre_alumno']; ?></td>
		<td><?php echo $consulta['apepaterno_alumno']; ?></td>
		<td><?php echo $consulta['apematerno_alumno']; ?></td>
		<td><?php echo $consulta['tel_alumno']; ?></td>
		<td><?php echo $consulta['correoe_alumno']; ?></td>
	</tr>
</table>
<form name="borrar" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
<input type="submit" name="borrar" value="Eliminar registro">
</form>
<?php	
	$borrar=$_POST['borrar'];
	if($borrar){
		$query ="delete from alumnos where id_alumnos=".$id;
		$query = pg_query($con,$query) or die (pg_last_error());
		if($query){
			echo "<p>Se eliminó el registro del alumno</p>";
			echo "<a href='index.php'>Volver al inicio</a><br/>";
			echo "<a href='form_alumno.php'>Volver al formulario de registro</a>";
		}
		else{
			echo "No se pudo ejecutar la sentencia SQL";
		}
	}
	else{
		echo "No se elimino el registro";
	}
}
else{	
	echo "hubo un error al intentar conectar";
}
?>

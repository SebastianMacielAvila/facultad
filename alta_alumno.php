<?php
/*alta_alumno.php
 *Recibe los datos de form_alumno.php, los procesa e inserta en la BD.
 *author: SebastianMacielAvila
 *date: 18 03 2021
 */
//Recibe los datos:
//print_r($_POST);
$nombre =$_POST['nombre'];
$apaterno =$_POST['apaterno'];
$amaterno =$_POST['amaterno'];
$telefono =$_POST['telefono'];
$correoe =$_POST['correoe'];
//Abrir conexión al manejador:
$con = pg_connect("port=5432 dbname=prueba1 user=usuario1 password=UE") or die (pg_last_error());
if($con){
	//echo "se abre la conexión a la BD";
	//Genera la consulta:
	$query ="insert into alumnos(nombre_alumno,apepaterno_alumno,apematerno_alumno,tel_alumno,correoe_alumno)values('".$nombre."','".$apaterno."','".$amaterno."','".$telefono."','".$correoe."')";
	$query = pg_query($con,$query) or die (pg_last_error());
	if($query){
		echo "<p>Se guardó el registro del alumno</p>";
		echo "<a href='index.php'>Volver al inicio</a><br/>";
		echo "<a href='form_alumno.php'>Volver al formulario de registro</a>";
	}
	else{
		echo "No se pudo ejecutar la sentencia SQL";
	}
}
else{
	echo "hubo un error al intentar conectar";
}
?>

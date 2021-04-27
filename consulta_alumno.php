<?php
/*consulta_alumno.php
 *Abre una conexión a la BD, consulta los registros de alumnos y los muestra en una tabla.
 *author: Sebastian Maciel Avila
 *date: 23 03 2021
 */

//Abrir conexión al manejador:
$con = pg_connect("port=5432 dbname=prueba1 user=usuario1 password=UE") or die (pg_last_error());
if($con){
	//Genera la consulta:
	$query ="select id_alumnos,nombre_alumno,apepaterno_alumno,apematerno_alumno,tel_alumno,correoe_alumno from alumnos order by apepaterno_alumno asc";
	$query = pg_query($con,$query) or die (pg_last_error());
	if($query){
		echo "<p>Lista de alumnos</p>";
?>
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Apellido paterno</th>
			<th>Apellido materno</th>
			<th>Teléfono</th>
			<th>Correo electrónico</th>
		</tr>
	</thead>
	<tbody>
<?php
		while($row = pg_fetch_array($query)){
			echo "<tr>";
			echo "<td>".$row['id_alumnos']."</td>";
			echo "<td>".$row['nombre_alumno']."</td>";
			echo "<td>".$row['apepaterno_alumno']."</td>";
			echo "<td>".$row['apematerno_alumno']."</td>";
			echo "<td>".$row['tel_alumno']."</td>";
			echo "<td>".$row['correoe_alumno']."</td>";
			echo "<td><a href='edita_alumno.php?id=".$row['id_alumnos']."'>Editar registro</a></td>";
			echo "<td><a href='eliminar_alumno.php?id=".$row['id_alumnos']."'>Eliminar registro</a></td>";
			echo "</tr>";
		}
?>
	</tbody>
</table>
<?php
		echo "<a href='index.php'>Volver al inicio</a><br/>";
		echo "<a href='form_alumno.php'>Volver al formulario de registro</a>";
	}
	else{
		echo "No se pudo ejecutar la sentencia SQL";
	}
}
else{
	echo "Hubo un error al intentar conectar";
}
?>

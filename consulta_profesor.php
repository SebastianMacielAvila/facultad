<?php
/*consulta_profesor.php
 *Abre una conexión a la BD, consulta los registros de alumnos y los muestra en una tabla.
 *author: SebastianMacielAvila
 *date: 15 04 2021
 */

//Abrir conexión al manejador:
$con = pg_connect("port=5432 dbname=prueba1 user=usuario1 password=UE") or die (pg_last_error());
if($con){
	//Genera la consulta:
	$query ="select id_profesor,nombre_profesor,apepaterno_profesor,apematerno_profesor,tel_profesor,correoe_profesor from profesores order by apepaterno_profesor asc";
	$query = pg_query($con,$query) or die (pg_last_error());
	//$arreglo = pg_fetch_all($query);
	echo "<pre>";
	print_r($arreglo);
	echo "</pre>";
	if($query){
		echo "<p>Lista de profesores</p>";
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
			//echo "El nombre: ".$row['nombre_alumno']."El apaterno: ".$row['apepaterno_alumno']."El apematerno: ".$row{'apematerno_alumno'];
			echo "<tr>";
			echo "<td>".$row['id_profesor']."</td>";
			echo "<td>".$row['nombre_profesor']."</td>";
			echo "<td>".$row['apepaterno_profesor']."</td>";
			echo "<td>".$row['apematerno_profesor']."</td>";
			echo "<td>".$row['tel_profesor']."</td>";
			echo "<td>".$row['correoe_profesor']."</td>";
			echo "</tr>";
		}
		//foreach($arreglo as $clave => $valor){
		//echo "la clave: ".$clave." el valor: ".$valor;
		//echo "<br/>";
	//}
?>
	</tbody>
</table>
<?php
		echo "<a href='index.php'>Volver al inicio</a><br/>";
		echo "<a href='form_profesor.php'>Volver al formulario de registro</a>";
	}
	else{
		echo "No se pudo ejecutar la sentencia SQL";
	}
}
else{
	echo "hubo un error al intentar conectar";
}
?>

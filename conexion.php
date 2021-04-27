<?php
//Abrir una conexión al manejador de BD:
$con = pg_connect("port=5432 dbname=prueba1 user=usuario1 password=UE") or die (pg_last_error());
if($con){
	echo "Se conectó a la BD";
}
else{
	echo "Hubo un problema al conectar a la BD";
}	
?>

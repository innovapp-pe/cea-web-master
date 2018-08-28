<?php 
	include("conexion.php");
	$correo = $_POST['email'];

	$query="INSERT INTO suscribers email VALUES('$correo')";
	$resultado = $conexion->query($query);

	if($resultado){
		 header('Location: index.html');
	}
	else{
		header('Location: index.html');
	}
?>
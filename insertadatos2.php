<?php 
	include("conexion2.php");

	$ruc = $_POST['ruc'];
	$plan = $_POST['plan'];
	$nombre = $_POST['name'];
	$celular = $_POST['phone'];
	$cantidad = $_POST['cantidad'];
	$correo = $_POST['email'];

	$query="INSERT INTO services (ruc, nombre, cantidad,celular, plan, correo) VALUES('$ruc', '$nombre' , '$cantidad' , '$celular' , '$plan' , '$correo')";
	$resultado = $conexion->query($query);

	if($resultado){
		echo "LOS DATOS SE INGRESARON CORRECTAMENTE";
		 header('Location: index.html');
	}
	else{
		echo "NO SE INGRESARON LOS DATOS";
		header('Location: index.html');
	}

 ?>
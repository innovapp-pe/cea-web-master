<?php 
	include("conexion.php");
	$name = $_POST['name'];
	$last_name = $_POST['last_name'];
	$dni = $_POST['dni'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$distrito = $_POST['distrito'];
	$universidad = $_POST['universidad'];
	$carrera = $_POST['carrera'];
	$ciclo = $_POST['ciclo'];
	$mensaje = $_POST['mensaje'];

	mysqli_query($link, "INSERT INTO prospectos (nombre, apellido, dni, telefono, correo, universidad, carrera, ciclo, distrito, premio, manager_id) VALUES ('$name', '$last_name', '$dni', '$phone', '$email', '$universidad', '$carrera', '$ciclo', '$distrito', 'NADA', 'Web')");
	if(mysqli_affected_rows($link)>0){
				header('location: success.php?dni='.$dni.'&name='.$name.'');
			}else{
				header('location: failed.php?dni='.$dni.'&name='.$name.'');
			}
?>
<?php 
	include("app/config.php");
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

	mysqli_query($link, "INSERT INTO prospectos (dni, nombre, apellido, telefono, correo, universidad, carrera, ciclo, distrito, mensaje, premio, manager_id) VALUES ('$dni', '$name', '$last_name', '$phone', '$email', '$universidad', '$carrera', '$ciclo', '$distrito', '$mensaje', 'NADA', 'Web')");
    header('location: success.php?dni='.$dni.'&name='.$name.'');
?>
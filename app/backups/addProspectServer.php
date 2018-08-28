<?php 
	session_start();
	include('config.php');

	// initialize variables
	$id = $_SESSION['id'];
	$name =  $_POST['name'];
	$last_name =  $_POST['last_name'];
	$dni =  $_POST['dni'];
	$phone =  $_POST['phone'];
	$email =  $_POST['email'];
	$universidad =  $_POST['universidad'];
	$carrera =  $_POST['carrera'];
	$ciclo = $_POST['ciclo'];
	$distrito = $_POST['distrito'];
	$premio = $_POST['premio'];
	$update = false;

		mysqli_query($link, "INSERT INTO prospectos (nombre, apellido, dni, telefono, correo, universidad, carrera, ciclo, distrito, premio, manager_id) VALUES ('$name', '$last_name', '$dni', '$phone', '$email', '$universidad', '$carrera', '$ciclo', '$distrito', '$premio', '$id')");
			if(mysqli_affected_rows($link)>0){
				header('location: success.php?dni='.$dni.'&name='.$name.'');
			}else{
				header('location: failed.php?dni='.$dni.'&name='.$name.'');
			}

?>


	
<?php 
	session_start();
	include('../../config.php');

	// initialize variables
	$id = $_SESSION['id'];
	$name =  $_POST['name'];
	$dni =  $_POST['dni'];
	$phone =  $_POST['phone'];
	$email =  $_POST['email'];
	$update = false;

		mysqli_query($link, "INSERT INTO profesores (nombre, dni, telefono, correo, creado_por) VALUES ('$name', '$dni', '$phone', '$email', '$id')");
			if(mysqli_affected_rows($link)>0){
				header('location:../success.php?dni='.$dni.'&name='.$name.'');
			}else{
				header('location:../failed.php?dni='.$dni.'&name='.$name.'');
			}
?>


	
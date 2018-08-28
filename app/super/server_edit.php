<?php 
	session_start();
	include('../config.php');

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

	/*if (trim($_POST['plan']) == false || ($_POST['phone_model']) == false) {
		mysqli_query($link, "UPDATE clients SET tipo_contacto='$tipo_contacto', resultado='$resultado', observacion='$reasson', comentario='$comment', gestionado='$gestionado', ejecutivoID='$id', fecha_agendado='$fecha_agendado' WHERE client_id=$client_id");
			$message = "Enviado con éxito";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header('location: index.php');
	}
	if (trim($_POST['comment']) == false){
			mysqli_query($link, "UPDATE clients SET tipo_contacto='$tipo_contacto', resultado='$resultado', observacion='$reasson', gestionado='$gestionado', ejecutivoID='$id', plan='$plan', modelo='$phone_model', fecha_agendado='$fecha_agendado' WHERE client_id=$client_id");
				$message = "Enviado con éxito";
				echo "<script type='text/javascript'>alert('$message');</script>";
				header('location: index.php');
	}*/

	//else{
			mysqli_query($link, "UPDATE prospectos SET nombre='$name', apellido='$last_name', dni='$dni', telefono='$phone', correo='$email', universidad='$universidad', carrera='$carrera', ciclo='$ciclo', distrito='$distrito', premio='$premio' WHERE dni=$dni");
				if(mysqli_affected_rows($link)>0){
				header('location: success.php?dni='.$dni.'&name='.$name.'');
			}else{
				header('location: failed.php?dni='.$dni.'&name='.$name.'');
			}
	//}
?>


	
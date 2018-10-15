<?php 
	session_start();
	include('../config.php');

	// initialize variables
	$id_user = $_SESSION['id'];
	$id_curso =  $_POST['curso'];
	$dni =  $_POST['dni'];
	$tipo_contacto =  $_POST['tipo_contacto'];
	$resultado =  $_POST['resultado'];
	$observacion =  $_POST['observacion'];
	$fecha_agendado =  $_POST['fecha_agendado'];
	$comentario = $_POST['comment'];
	$update = false;

			mysqli_query($link, "UPDATE interesados_formulario SET tipo_contacto='$tipo_contacto', resultado='$resultado', observacion='$observacion', fecha_agendado='$fecha_agendado', manager_id='$id_user', gestionado='SI', mensaje='$comentario' WHERE id_curso LIKE '$id_curso' AND dni='$dni'")  or die(mysqli_error($link));
				if(mysqli_affected_rows($link)>0){
				header('location: ../success.php?dni='.$id_curso.'&name='.$dni.'');
			}else{
				header('location: ../failed.php?dni='.$id_curso.'&name='.$dni.'');
			}
?>


	
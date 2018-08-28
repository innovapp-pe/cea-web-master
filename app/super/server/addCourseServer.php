<?php 
	session_start();
	include('../../config.php');

	// initialize variables
	$id_user = $_SESSION['id'];
	$id_curso =  $_POST['id_curso'];
	$course_name =  $_POST['course_name'];
	$capacidad =  $_POST['capacidad'];
	$profesor =  $_POST['profesor'];
	$sede =  $_POST['sede'];
	$email =  $_POST['email'];
	$fecha_inicio =  $_POST['fecha_inicio'];
	$fecha_fin =  $_POST['fecha_fin'];
	$horario = $_POST['horario'];
	$costo = $_POST['costo'];
	$update = false;

		mysqli_query($link, "INSERT INTO cursos (id_curso, nombre, capacidad, profesor, sede, fecha_inicio, fecha_fin, horario, costo, matriculados_actuales, creado_por) VALUES 
			('$id_curso', '$course_name', '$capacidad', '$profesor', '$sede', '$fecha_inicio', '$fecha_fin', '$horario', '$costo',0, '$id_user')");
			if(mysqli_affected_rows($link)>0){
				header('location:../success.php?='.$id_curso.'&name='.$course_name.'');
			}else{
				header('location:../failed.php?dni='.$id_curso.'&name='.$course_name.'');
			}
?>


	
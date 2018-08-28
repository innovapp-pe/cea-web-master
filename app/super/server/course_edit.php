<?php 
	session_start();
	include('../config.php');

	// initialize variables
	$id = $_SESSION['id'];
	$course_name =  $_POST['course_name'];
	$course_id =  $_POST['course_id'];
	$capacidad =  $_POST['capacidad'];
	$profesor =  $_POST['profesor'];
	$sede =  $_POST['sede'];
	$fecha_inicio =  $_POST['fecha_inicio'];
	$fecha_fin =  $_POST['fecha_fin'];
	$horario =  $_POST['horario'];
	$costo = $_POST['costo'];
	$status = $_POST['status'];

			mysqli_query($link, "UPDATE cursos SET nombre='$course_name', capacidad='$capacidad', profesor='$profesor', sede='$sede', fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin', horario='$horario', costo='$costo', status='$status' WHERE id_curso LIKE '$course_id'")  or die(mysqli_error($link));
				if(mysqli_affected_rows($link)>0){
				header('location: ../success.php?dni='.$course_id.'&name='.$course_name.'');
			}else{
				header('location: ../failed.php?dni='.$course_id.'&name='.$course_name.'');
			}
?>


	
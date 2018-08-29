<?php 
	session_start();
	include('../config.php');

	// initialize variables
	$id_user = $_SESSION['id'];
	$id_curso =  $_POST['curso'];
	$dni =  $_POST['dni'];
	$update = false;

			mysqli_query($link, "DELETE FROM matriculados WHERE dni_alumno='$dni' AND id_curso LIKE '$id_curso'") or die(mysqli_error($link));
			mysqli_query($link, "UPDATE cursos SET matriculados_actuales = matriculados_actuales - 1 WHERE id_curso LIKE '$id_curso' AND status=1") or die(mysqli_error($link));
?>


	
<?php 
	include("app/config.php");
	$id_curso = $_POST['id_curso'];
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
	$solicitud_alumno = $_POST['solicitud_alumno'];
	$metodo_difusion = $_POST['metodo_difusion'];

	mysqli_query($link, "INSERT INTO interesados_formulario (id_curso, dni, nombre, apellido, telefono, correo, universidad, carrera, ciclo, distrito, mensaje, solicitud_alumno, metodo_difusion) VALUES ('$id_curso', '$dni', '$name', '$last_name', '$phone', '$email', '$universidad', '$carrera', '$ciclo', '$distrito', '$mensaje', '$solicitud_alumno', '$metodo_difusion')");
	mysqli_query($link, "INSERT INTO prospectos (dni, nombre, apellido, telefono, correo, universidad, carrera, ciclo, distrito, mensaje, manager_id) VALUES ('$dni', '$name', '$last_name', '$phone', '$email', '$universidad', '$carrera', '$ciclo', '$distrito', '$mensaje', 'Web')");
    header('location: success.php?dni='.$dni.'&name='.$name.'');
?>
<?php 
	session_start();
	include('../../config.php');

	// initialize variables
	$id_user = $_SESSION['id'];
	$id_curso =  $_POST['id_curso'];
	$dni =  $_POST['dni'];
	$nombre =  $_POST['nombre'];
	$apellido =  $_POST['apellido'];
	$telefono =  $_POST['telefono'];
	$correo =  $_POST['correo'];
	$universidad =  $_POST['universidad'];
	$carrera =  $_POST['carrera'];
	$ciclo =  $_POST['ciclo'];
	$distrito =  $_POST['distrito'];
	$metodo_pago =  $_POST['metodo_pago'];
	$descuento =  $_POST['descuento'];
	$monto_pagado =  $_POST['monto_pagado'];
	$monto_restante =  $_POST['monto_restante'];
	$certificado = $_POST['certificado'];
	$canal = $_POST['canal'];
	$fecha_matricula = $_POST['fecha_matricula'];
	$comentario = $_POST['comment'];
	$update = false;
	//echo " es $id_curso";
		mysqli_query($link, "UPDATE cursos SET matriculados_actuales = matriculados_actuales + 1 WHERE id_curso LIKE '$id_curso' AND status=1") or die(mysqli_error($link));
		mysqli_query($link, "INSERT INTO matriculados (id_curso, dni_alumno, nombre, apellido, telefono, correo, universidad, carrera, ciclo, distrito, metodo_pago, descuento, monto_pagado, monto_restante, certificado, canal, matriculado_por, fecha_matricula, fecha_actualizacion, comentario) VALUES 
			('$id_curso', '$dni', '$nombre', '$apellido', '$telefono', '$correo', '$universidad', '$carrera', '$ciclo', '$distrito', '$metodo_pago', '$descuento', '$monto_pagado', '$monto_restante', '$certificado','$canal','$id_user', '$fecha_matricula', '$fecha_actualizacion', '$comentario')");
			if(mysqli_affected_rows($link)>0){
				header('location:../success.php?dni='.$id_curso.'&name='.$nombre.'');
			}else{
				header('location:../failed.php?dni='.$id_curso.'&name='.$nombre.'');
			}
?>


	
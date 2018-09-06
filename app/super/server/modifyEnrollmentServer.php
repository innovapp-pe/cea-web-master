<?php 
	session_start();
	include('../config.php');

	// initialize variables
	$id_user = $_SESSION['id'];
	$id_curso =  $_POST['curso'];
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
	$devolucion_pagada =  $_POST['devolucion_pagada'];
	$certificado_recogido =  $_POST['certificado_recogido'];
	$descuento =  $_POST['descuento'];
	$monto_pagado =  $_POST['monto_pagado'];
	$monto_restante =  $_POST['monto_restante'];
	$certificado = $_POST['certificado'];
	$canal = $_POST['canal'];
	$comentario = $_POST['comment'];
	$update = false;

			mysqli_query($link, "UPDATE matriculados SET nombre='$nombre', apellido='$apellido', telefono='$telefono', correo='$correo', universidad='$universidad', carrera='$carrera', ciclo='$ciclo', distrito='$distrito', metodo_pago='$metodo_pago', descuento='$descuento', monto_pagado='$monto_pagado', monto_restante='$monto_restante', devolucion_pagada='$devolucion_pagada',certificado='$certificado', certificado_recogido='$certificado_recogido', canal='$canal', comentario='$comentario' WHERE id_curso LIKE '$id_curso' AND dni_alumno='$dni'")  or die(mysqli_error($link));
				if(mysqli_affected_rows($link)>0){
				header('location: ../success.php?dni='.$id_curso.'&name='.$dni.'');
			}else{
				header('location: ../failed.php?dni='.$id_curso.'&name='.$dni.'');
			}
?>


	
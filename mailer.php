<?php
if(isset($_POST['submit'])) {
$to = "merinodavilam@gmail.com";
$subject = "Contacto desde la Web de CEA";
 
// data the visitor provided
$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$dni = filter_var($_POST['dni'], FILTER_SANITIZE_STRING);
$facultad = filter_var($_POST['facultad'], FILTER_SANITIZE_STRING);
$curso = filter_var($_POST['curso'], FILTER_SANITIZE_STRING);
$telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
$correo = filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL);
$direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
 
//constructing the message
$body = " Nombre: $nombre\n\n  DNI: $dni\n\n Facultad: $facultad \n\n Curso: $curso \n\n
 Teléfono: $telefono \n\n Correo: $correo\n\n Dirección:\n\n $direccion";
 
// ...and away we go!
mail($to, $subject, $body);
 
// redirect to confirmation
header('Location: index.html');
} else {
// handle the error somehow
}
?>
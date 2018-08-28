<?php
include('config.php');
if(isset($_POST['submit'])) {
$to = "merinodavilam@gmail.com";
$subject = "Contacto desde la Web de CEA";
 
// data the visitor provided
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
 
//constructing the message
$body = "Nuevo correo registrado en suscritos en la Web de CEA \n\nCorreo Nuevo: $email\n\n";
 
// ...and away we go!
mail($to, $subject, $body);
mysqli_query($link, "INSERT INTO `suscribers` (email) VALUES ('$email')") or die("Something has gone wrong!". mysqli_connect_error());
// redirect to confirmation
header('Location: index.html');
} else {
// handle the error somehow
}
?>
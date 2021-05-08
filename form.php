<?php
 if (isset($_POST["submit"])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $from = 'Demo Contact Form'; 
  $to = 'diegoalejandro1999@gmail.com'; 
  $subject = $_POST['Subject'];
  
  $body ="From: $name\n E-Mail: $email\n Message:\n $message";

  // Check if name has been entered
  if (!$_POST['name']) {
   $errName = 'Digite su nombre';
  }
  
  // Check if email has been entered and is valid
  if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
   $errEmail = 'Digite un email valido';
  }
  
  //Check if message has been entered
  if (!$_POST['message']) {
   $errMessage = 'Digite un mensaje';
  }
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage) {
 if (mail ($to, $subject, $body, $from)) {
  $result='<div class="alert alert-success">¡El mensaje fue enviado exitosamente!</div>';
 } else {
  $result='<div class="alert alert-danger">Hubo un error al enviar el mensaje. Intenta de nuevo</div>';
 }
}
 }
?>
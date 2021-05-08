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

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap contact form with PHP example by BootstrapBay.com.">
    <meta name="author" content="BootstrapBay.com">
    <title>Bootstrap Contact Form With PHP Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  </head>
  <body>
   <div class="container">
    <div class="row">
     <div class="col-md-6 col-md-offset-3">
      <h1 class="page-header text-center">Formulario de contacto</h1>
    <form class="form-horizontal" role="form" method="post" action="index.php">
     <div class="form-group">
      <label for="name" class="col-sm-2 control-label">Nombre</label>
      <div class="col-sm-10">
       <input type="text" class="form-control" id="name" name="name" placeholder="Nombre y apellido" value="<?php echo htmlspecialchars($_POST['name']); ?>">
       <?php echo "<p class='text-danger'>$errName</p>";?>
      </div>
     </div>
     <div class="form-group">
      <label for="email" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-10">
       <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@dominio.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
       <?php echo "<p class='text-danger'>$errEmail</p>";?>
      </div>
     </div>
     <div class="form-group">
      <label for="message" class="col-sm-2 control-label">Mensaje</label>
      <div class="col-sm-10">
       <textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
       <?php echo "<p class='text-danger'>$errMessage</p>";?>
      </div>
     </div>
     <div class="form-group">
      <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
      <div class="col-sm-10">
       <input type="text" class="form-control" id="human" name="human" placeholder="Respuesta">
       <?php echo "<p class='text-danger'>$errHuman</p>";?>
      </div>
     </div>
     <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
       <input id="submit" name="submit" type="submit" value="Enviar" class="btn btn-primary">
      </div>
     </div>
     <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
       <?php echo $result; ?> 
      </div>
     </div>
    </form> 
   </div>
  </div>
 </div>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
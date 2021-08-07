<?php

if(isset($_POST['user'])){

session_start();
$post_user = $_POST['user'];
$post_pass = $_POST['password'];
$correct_user = "admin";
$correct_password = "1234ar";

if(($post_user==$correct_user)&&($post_pass==$correct_password)){
  
    $_SESSION['status'] = 'marina';
        
    header('Location:./buscar_personas.php');

}
else{
 echo "dont logged";
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <link rel="shortcut icon" href="../pics/logo.png">
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link href="../css/signin.css" rel="stylesheet">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      
      <title>Sistema Ironclad Consultas</title>
  </head>
  <body>
  
  <body class="text-center" >
  
  <form class="form-signin" action="./access.php" method="post">
        <img class="mb-4" src="../pics/logosistema.jpg" alt="" width="288" height="144">
        <h1 class="h3 mb-3 font-weight-normal "style="color:#FF0000" >Datos incorrectos</h1>
        <label for="user" name="inputUser" class="sr-only">usuario</label>
        <input type="text" name="user" class="form-control" placeholder="usuario" required autofocus>
        <label for="inputPassword" class="sr-only">contraseña</label>
        <input type="password" name="password" class="form-control" placeholder="contraseña" required>
        <button class="btn btn-lg btn-primary btn-block btn-sm" type="submit">INICIAR</button>
        <p class="mt-5 mb-3 text-muted">
        <img class="mb-1" src="../pics/logoempresa.jpg" alt="" width="174" height="63"><br>
        &copy; 2021</p>
      </form>
  
  
    </body> 
  </body>
  </html>
  <?php
  
}

}


?>
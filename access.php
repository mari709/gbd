<?php

if(isset($_POST['user'])){

session_start();
$post_user = $_POST['user'];
$post_pass = $_POST['password'];
$correct_user = "admin";
$correct_password = "123abc";

if(($post_user==$correct_user)&&($post_pass==$correct_password)){
  
    $_SESSION['status'] = 'marina';
        
    header('Location:./index.php');

}
else{
//  echo "dont logged";
  ?>
  <!DOCTYPE html>
<html lang="es">
<!--head--> 

<?php include_once './vistas/my-head.php' ?>
    <link href="estilos/signin.css" rel="stylesheet">
</head>

  <body class="text-center">
    <form class="form-signin" action = "access.php" method="post">
    <img src="https://img.icons8.com/ios-filled/50/000000/lambda.png"/>
          <h1 class="h3 mb-3 font-weight-normal">Ingreso al sistema</h1>
      <h6 class="mb-3"style="color:#FF0000" >Datos incorrectos</h6>
      <label for="username" class="sr-only">Nombre de usuario</label>
      <input type="text" id="username" class="form-control mb-3" placeholder="Nombre de usuario" required autofocus name="user" >
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" class="form-control mb-3" placeholder="Contraseña" required name="password">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
  </body>
</html>
  <?php
  
}

}


?>
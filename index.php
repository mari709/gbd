<?php
include './conexion/conexion.php';
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<!--head-->
<?php include_once './vistas/my-head.php' ?>
    <link href="signin.css" rel="stylesheet">
</head>

  <body class="text-center">
    <form class="form-signin" action = "access.php" method="post">
      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Ingreso al sistema</h1>
      <label for="username" class="sr-only">Nombre de usuario</label>
      <input type="text" id="username" class="form-control mb-3" placeholder="Nombre de usuario" required autofocus name="user" >
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" class="form-control mb-3" placeholder="Contraseña" required name="password">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
  </body>
</html>
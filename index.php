<?php
include './conexion/conexion.php';
session_start();
if(isset(($_SESSION['status']))){

?>
<!DOCTYPE html>
<html lang="es">

<!--head-->
<?php include_once './vistas/my-head.php' ?>
<script src=".\js\jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>

</head>

<body>
<!--navbar-->
<?php include_once './vistas/navbar.php' ?>
      <section class="container pt-4 buscador-personas">
        <h1 class="h1-encabezado pt-4 pb-4">¡Bienvenido a Lambda Web!</h1>
      </section>

      <div class="card-group p-4 m-4">
  <div class="card text-center">
    <div class="card-body">
      <h5 class="card-title text-uppercase">Buscar personas</h5>
      <p class="card-text">Buscar contribuyentes a partir de su <b>nombre</b>, <b>localidad</b>, y/o <b>ciudad</b></p>
      <a href="buscar_personas.php" class="btn btn-primary">acceder</a>
    </div>
  </div>
  <div class="card text-center">
    <div class="card-body">
      <h5 class="card-title text-uppercase">Ranking de calles</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <a href="buscar_personas.php" class="btn btn-primary">acceder</a>
    </div>
  </div>
  <div class="card text-center">
    <div class="card-body">
      <h5 class="card-title text-uppercase">Buscar por calle</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <a href="buscar_personas.php" class="btn btn-primary">acceder</a>
    </div>
  </div>
</div>
 
  </body>
</html>
<?php
}
else{
  header('Location:login.php');
}

?>
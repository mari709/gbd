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
        <h1 class="h1-encabezado pt-4 pb-4">Bienvenido!</h1>
      </section>

      themeroller
      <div id="slider"></div>
      echo "<input type='range' value='10' name='0' step='10' min='0' max='100' onchange='updTextmin(this.value);'>";

<script>
$( "#slider" ).slider();
</script>
 
      
 
  </body>
</html>
<?php
}
else{
  header('Location:login.php');
}

?>
<?php
include './conexion/conexion.php';
$name ="";
?>
<!DOCTYPE html>
<html lang="es">

<!--head-->
<?php include_once './vistas/my-head.php' ?>
</head>

<body>
<!--navbar-->
<?php include_once './vistas/navbar.php' ?>
      <section class="container pt-4 buscador-personas">
        <h1 class="h1-encabezado pt-4 pb-4">Buscar por calle</h1>
      </section>
      <div class="container form-group">
      <label for="input-buscar-calle">Buscar calle</label>
                <input type="text" class="form-control" id="input-buscar-calle" name="input-buscar-calle"  placeholder ="Alvarado" maxlength="50">
      </div>


      <div class="text-center container" id="resultado-calle"></div> 



    </body>
</html>
<?php
include './conexion/conexion.php';
$name = "";
$name ="";
?>
<!-- 
  buscar una persona en particular, indicando completa o parcialmente su nombre, domicilio o localidad, pudiendo generar un reporte impreso de la ficha del contribuyente con todos los datos. En caso que la búsqueda arroje varios resultados, debe listarlos y dar la posibilidad de acceder a cada ficha. Si la búsqueda arroja más de 50 resultados debe indicar que se reformule la búsqueda.-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.jpg">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buscar Personas</title>
    <meta name="description" content="El sistema nº1 de analisis de datos de contribuyentes de América Latina">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#">
        <img src="favicon.jpg" width="40" height="40" class="d-inline-block align-top" alt="">
    </a>
        <!-- Links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Link 1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link 2</a>
          </li>
      
          <!-- Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              Dropdown link
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Link 1</a>
              <a class="dropdown-item" href="#">Link 2</a>
              <a class="dropdown-item" href="#">Link 3</a>
            </div>
          </li>
        </ul>
      </nav>
      <section class="container buscador-personas">
       <h1 class="h1-encabezado pt-4 pb-4">Buscador de personas</h1>
        
          <fieldset class=" p-4">
            <legend class="w-auto">Buscar personas</legend>
            <div class="row">

              <div class="col-sm-4">
                <div class="form-group">
                  <form>
                  <label for="input-nombre">Nombre</label>
                  <input type="text" class="form-control input-bloque-persona" id="input-nombre" name="input-nombre"  placeholder ="Helena Lopez">
                </div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label for="input-calle">Calle</label>
                  <input type="text" class="form-control input-bloque-persona" id="input-calle" name="input-calle" placeholder ="Falucho" >
                </div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label form="input-localidad">Localidad</label>
                  <input type="text" class="form-control input-bloque-persona" id="input-localidad" name="input-localidad" placeholder ="Mar del Plata" size="50">    
                </div>
              </div>

          </div>
        </fieldset>
        <div id="resultado-personas"></div>
      </form>
      </section>







      <script>
      
      function buscarDatos (valor1, valor2, valor3) {
        let parametros ={
          "var1": valor1,
          "var2": valor2,
          "var3": valor3
        };

        $.ajax({
          data: parametros,
          url: 'personas_buscadas.php',
          type: 'post',
          beforeSend: function() {
            $("#resultado-personas").html("<div class='container'> Realizando búsqueda...</div>");
          },
          success: function(response) {
            $("#resultado-personas").html(response);
          }
        });
      }

      $(document).on('keyup', '.input-bloque-persona', function(){
          let valor1 = $('#input-nombre').val();
          let valor2 = $('#input-calle').val();
          let valor3 = $('#input-localidad').val();
          buscarDatos(valor1, valor2, valor3);


          // buscarDatos(valor1, valor2, valor3);
          // valor1 = $('#input-nombre').val("");
          // valor2 = $('#input-calle').val("");
          // valor3 = $('#input-localidad').val("");
      });
      </script>
  </body>
</html>
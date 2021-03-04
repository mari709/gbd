<?php
include './conexion/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Análisis de Datos</title>
    <meta name="description" content="El sistema nº1 de analisis de datos de contribuyentes de América Latina">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#">Logo</a>
      
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
      <section class="container seccion-principal">
     <!--   <h1>Buscador de personas</h1>
        <div class="formulario">
		<label for="caja_busqueda">Nombre</label>
            <input type="text" name="caja_busqueda" id="caja_busqueda" placeholder ="Ej: Juan Perez" class ='cajab'>
            <label for="caja_busqueda2">Calle</label>
            <input type="text" name="caja_busqueda2" id ="caja_busqueda2" placeholder ="Ej: San Martin" class ='cajab'>
            <label form="caja_busqueda3">Localidad</label>
            <input type="text" name="caja_busqueda3" id ="caja_busqueda3" placeholder ="Ej: Mar del Plata" class = 'cajab'>    
        </div>
-->

        <div id="mi-resultado">
<?php
include './conexion/conexion.php';

//consulta que muestra el nombre de la ultima calle
$sql = "SELECT nombre, dir_calle, dir_numero from contactos
where dir_calle LIKE 'falucho'
order by dir_calle desc";


$sql_hacer = mysqli_query($link,$sql); //me conecto con la BD para hacer la consulta $sql
$num = mysqli_num_rows($sql_hacer); //almaceno en variable $num la cantidad de registros devueltos de la consulta $sql_hacer
//echo $num;

?>
<table class="table table-striped mt-4">
<tr>
<td>nombre</td>
<td>calle</td>
<td>numero</td>  
</tr>
<?php
while ($row = mysqli_fetch_assoc($sql_hacer)) {

echo "<tr>";
echo "<td>";
  echo $row['nombre'];
echo "</td>"; 
echo "<td>"; 
  echo $row['dir_calle']; 
echo "</td>";
echo"<td>";  
  echo $row['dir_numero'];
echo"</td>";
  echo "</tr>";  
}
?>
</table>
      </div>
      </section>
</body>
</html>
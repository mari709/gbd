<?php
include './conexion/conexion.php';
//$error_reporting = E_ALL & ~E_NOTICE;
$sql = "SELECT dir_numero from contactos order by dir_numero DESC limit 1";
$sql_exec = mysqli_query($link, $sql);
$sql_exec_datos = mysqli_fetch_assoc($sql_exec);
$altura_maxima = $sql_exec_datos['dir_numero'];

?>
<!DOCTYPE html>
<html lang="es">

<!--head-->
<?php include_once './vistas/my-head.php' ?>
<script src="js/funciones.js"></script>
</head>

<body>
<!--navbar-->
<?php include_once './vistas/navbar.php' ?>
      <section class="container pt-4 buscador-personas">
        <h1 class="h1-encabezado pt-4 pb-4">Ranking de Calles</h1>
      </section>

<?php 
echo "<label>Altura A</label>";
echo "<input type='range' value='0' min='0' max='".$altura_maxima."' onchange='updTextmin(this.value);'>";
echo "<input type='number' class='ranking-a__number' step='100' min='0' id='input_min_number' value='0' oninput='validity.valid||(value='')';>";

echo "<label>Altura B</label>";
echo "<input type='range' value='".$altura_maxima."' name='max_range' min='0' max='".$altura_maxima."' onchange='updTextmax(this.value);'>";
echo "<input type='number' class='ranking-b__number' step='1' id='input_max_number' min='0' value='".$altura_maxima."' oninput='validity.valid||(value='')';>";
?>

<input type="button" class="btn btn-primary" value="mostrar" href="javascript:;" onclick="realizaProceso($('#input_min_number').val(), $('#input_max_number').val());return false;">


<div id="resultado"></div>
<div id="resultado2"></div>

<script>
function updTextmin(val) {
        document.getElementById('input_min_number').value=val; 
}
function updTextmax(val) {
        document.getElementById('input_max_number').value=val; 
}
</script>
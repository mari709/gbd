<?php
include './conexion/conexion.php';


$nombre = $_POST['var1'];
$calle = $_POST['var2'];
$localidad = $_POST['var3'];
$sql = "select * from contactos where nombre like '%".$nombre."%' and dir_calle like '%".$calle."%' and localidad like '%".$localidad."%'";

$mostrar = mysqli_query($link,$sql);

$counter = mysqli_num_rows($mostrar);


if($counter>=50){
    echo "<div class='alert alert-warning block' role='alert'>La búsqueda arroja mas de 50 resultados. Por favor reformule la búsqueda</div>";

}

if($counter==0){
echo "No hay coincidencias para esta búsqueda";

}

if(($counter>0) && ($counter<50)){
echo "<div class='container'>";
echo "<table class='table'>";
echo "<tr>";
echo "<td>NOMBRE</td>";
echo "<td>CALLE</td>";
echo "<td>NUMERO</td>";
echo "<td>LOCALIDAD</td>";
echo "</tr>";

while($row = mysqli_fetch_assoc($mostrar)){
echo "<tr>";
echo "<td>".$row['nombre']."</td>";
echo "<td>".$row['dir_calle']."</td>";
echo "<td>".$row['dir_numero']."</td>";
echo "<td>".$row['localidad']."</td>";
echo "</tr>";

}
echo "</table>";
echo "</div>";
}
$close = mysqli_close($link);
?>

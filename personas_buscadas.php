<?php
include './conexion/conexion.php';


$nombre = $_POST['var1'];
$calle = $_POST['var2'];
$localidad = $_POST['var3'];
$sql = "select * from contactos where nombre like '%".$nombre."%' and dir_calle like '%".$calle."%' and localidad like '%".$localidad."%'";

$mostrar = mysqli_query($link,$sql);
$counter = mysqli_num_rows($mostrar);


if($counter>=50){
    echo "<div class='alert alert-info' role='alert'>La búsqueda arroja mas de 50 resultados. <strong>Por favor reformule la búsqueda</strong></div>";

}

if($counter==0){
echo "<div class='alert alert-info' role='alert'>No hay coincidencias para esta búsqueda</div>";

}

if(($counter>0) && ($counter<50)){
echo "<div class='alert alert-info card' role='alert'>Se encontraron $counter resultados para esta búsqueda</div>";
echo "<div class='pt-4 table-responsive'>";
echo "<table class='table table-sm'>";
    echo "<thead class='thead-dark'>";
        echo "<tr>";
            echo "<th scope='col'>#</th>";
            echo "<th scope='col'>NOMBRE</th>";
            echo "<th scope='col'>CALLE</th>";
            echo "<th scope='col'>NUMERO</th>";
            echo "<th scope='col'>LOCALIDAD</th>";
            echo "<th scope='col'>VER</th>";
        echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

$nro_reg_persona = 1;
while($row = mysqli_fetch_assoc($mostrar)){
    echo "<tr>";
        echo "<td scope='row'>$nro_reg_persona</td>";
        echo "<td>".$row['nombre']."</td>";
        echo "<td>".$row['dir_calle']."</td>";
        echo "<td>".$row['dir_numero']."</td>";
        echo "<td>".$row['localidad']."</td>";
        echo "<td><a class='btn btn-primary'>ver</a></td>";
    echo "</tr>";
    $nro_reg_persona++;
}
echo "</tbody>";
echo "</table>";
echo "</div>";  
}
$close = mysqli_close($link);


?>

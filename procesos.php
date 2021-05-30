<?php 
//session_start();

include 'conexion/conexion.php';

$altura_uno = $_POST['valorCaja1'];
$altura_dos = $_POST['valorCaja2']; 
$a1 ='';
$a2 ='';

if($altura_dos < $altura_uno){ //para que corra altura_uno debe ser mas grande que altura_2
$a1 = $altura_uno;
$a2 = $altura_dos;
$altura_uno = $a2;
$altura_dos = $a1;
//$_SESSION['a1'] = "hola";

}

$position_counter = 1;
$sql ="
select counter,dir_calle,localidad from 
(select count(dir_calle)as counter, dir_calle,dir_numero,localidad from contactos
where dir_numero BETWEEN '".$altura_uno."'and '".$altura_dos."'
group by dir_calle ,localidad
ORDER BY `counter`  DESC limit 10) as cuenta
";//resolver si da 0 resultados

$sql2 ="select counter from 
(select count(dir_calle)as counter, dir_calle,dir_numero from contactos
where dir_numero BETWEEN '".$altura_uno."'and '".$altura_dos."'
group by dir_calle 
ORDER BY `counter`  DESC limit 1) as cuenta";



$ancho_cubo = 200;
$hacer = mysqli_query($link,$sql);
$datacounter = mysqli_num_rows($hacer);

if($datacounter!=0){
$hacer2 = mysqli_query($link,$sql2);
$maxium_counter = mysqli_fetch_assoc($hacer2);
$rowcount = mysqli_num_rows($hacer2);
$mc_echo =  $maxium_counter['counter']; 
$view =
"<center>
";
$view .= "<br>";

$view .="<table class='tabla_fondo'>";
$view .="<tr><td><center><a href ='importoexcell2.php?data1=$altura_uno&data2=$altura_dos' class= 'btn btn-success btn-sm'>EXPORTAR LISTADO A EXCEL</a></center></td></tr>"; 
$view .="<tr><td>";
//tabla visible
$view .="
<table  class='tabla_datos'>
<thead>
<tr id='titulo'>
<td>PUESTO</td>
<td>CALLE</td>
<td>COMPARACION</td>
<td>REGISTROS</td>
<td>LOCALIDAD</td>
<td>LISTADOS</td>
</tr>
</thead>
";
while($fila = mysqli_fetch_assoc($hacer)){

    $ppl = $fila['counter'] * 100;
    $ppl_d= $ppl / $mc_echo;
    $view .= "<tr><td>";
    $view .= $position_counter;
    $view .="</td><td>";
    $view .=$fila['dir_calle'];
    $view .="</td><td>";
    $view .="<img src ='./pics/cubo.jpg' width =";
    $view .= $ppl_d;
    $view .=" height = 15>";
    $view .="</td><td>";
    $view .= $fila['counter'];
    $view .="</td><td>";
    $view .=$fila['localidad'];
    $view .="</td><td>";
    $view .="<input type='button'class= 'btn btn-primary btn-sm' href='javascript:;' onclick='muestralista(";
    $view .='"';
    $view .= $fila['localidad'];
    $view .='","';
    $view .= $fila['dir_calle'];
    $view .= '","';
    $view .= $altura_uno;
    $view .= '","';
    $view .= $altura_dos;
    $view .= '"';
    $view .=");return false' value = 'mostrar'/>";
    $view .="
            <script>
            function muestralista(p1,p2,p3,p4){
                                              var params ={
                                                           'valueone':p1,
                                                           'valuetwo':p2,
                                                           'valuetree':p3,
                                                           'valuefour':p4
                                                          };
  $.ajax({
  data:  params, //datos que se envian a traves de ajax
  url:   'personaldata.php', //archivo que recibe la peticion
  type:  'post', //método de envio
  beforeSend: function () {
          $('#resultado2').html('Procesando, espere por favor...');
  },
  success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
          $('#resultado2').html(response);
  }
});
}
</script>";
$view .="</td></tr>";
$position_counter ++;
}
$view .="</table></center>";
//fin tabla visible

$view .="</td></tr>";
$view .="</table>";

echo $view;
}
else
{echo "NO EXISTEN DOMICILIOS REGISTRADOS ENTRE LAS ALTURAS INGRESADAS. NO ES POSIBLE ARMAR EL RANKING.";}
?>

<?php /* 
$host='127.0.0.1';
$user='root';
$password='';
$db='punto_venta';

$conection = @mysqli_connect($host,$user,$password,$db,3307);
if(!$conection){
	echo "Error en la Conexion";
}
  */ ?>

  <?php  $conection = new mysqli("127.0.0.1", "root", "lalo71299", "punto_venta");
if ($conection->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

echo $conection->host_info . "\n"; ?>
 
  


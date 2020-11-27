//conexion
<?php
$servidor = "localhost:8080";
$usuario = "root";
$password = "";
$database = "login";

$conexion = mysqli_connect($servidor, $usuario, $password)or die(mysqli_error($conexion));
mysqli_select_db($conexion, $database)or die(mysqli_error($conexion));
?>

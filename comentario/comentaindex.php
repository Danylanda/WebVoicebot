<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="es" />
  <head>
    <title> Comentarios y quejas para los usuarios </title>
    <link href="style.css" rel="stylesheet" />
    <meta charset="utf-8">
  </head>
  <body>

<?php
$consulta1 = mysqli_query($conexion, "SELECT * FROM comentarios")or die(mysqli_error($conexion));
while($row = mysqli_fetch_assoc($consulta1)){
  echo"<div class='comentarios'>".$row['usuarios']."<br><br>
  ".$row['comentarios']."

  </div>";
}
 ?>

<center><form action="" method="POST">
<input type="text" name="usuarios" placeholder="usuarios"><br><br>
<input type="text" name="comentarios" placeholder="comentarios"><br><br>
<input type="submit" name="enviar" value="Enviar Comentarios">
</form></center>

<?php
if(isset($_POST['enviar'])){
  $usuarios = utf8_decode(mysqli_real_escape_string($conexion, $_POST['usuarios']));
  $comentarios = utf8_decode(mysqli_real_escape_string($conexion, $_POST['comentarios']));
  if($usuarios == '' or $comentarios == ''){
    echo "Lo sentimos, pero no puede dejar campos sin rellenar";
  }
  else{
    $insertar = mysqli_query($conexion, "INSERT INTO comentarios(usuarios, comentarios) VALUES ( ('".$usuarios."', '".$comentarios."')")or die(mysqli_error($conexion));
    echo "El comentarios ha sido introducido correctamente";
  }
}
 ?>

  </body>
</html>

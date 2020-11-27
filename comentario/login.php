<?php include "config.php"; include "start.php"; ?>
<!DOCTYPE html>
<html lang="es">
    <head>
       <title> Sistema de Usuarios (YuseTist) </title>
       <meta charset="UTF-8" />
    </head>
    <body>

    <?php
    if(isset($_SESSION['logged'])){
        echo "Dentro del login, aquí poner lo que desees.";
    }
    else{
    ?>

    <form action="" method="POST">
    <input type="text" name="usuario" placeholder="Usuario...">
    <input type="text" name="password" placeholder="Clave...">
    <input type="submit" name="enviar" value="Entrar">
    </form>

    <?php
    }

    if(isset($_POST['enviar'])){
        $usuario = utf8_decode(mysqli_real_escape_string($conexion, $_POST['usuario']));
        $password = md5(utf8_decode(mysqli_real_escape_string($conexion, $_POST['password'])));
        if($usuario == '' or $password == ''){
            echo "No puede dejar ningún campo sin rellenar.";
        }
        else{
            $comprobacion = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '".$usuario."' AND password = '".$password."' LIMIT 1")or die(mysqli_error($conexion));
            if(mysqli_num_rows($comprobacion) == 1){
                $row = mysqli_fetch_assoc($comprobacion);
                $_SESSION['id'] = $row['id'];
                $_SESSION['usuario'] = $row['usuario'];
                $_SESSION['logged'] = TRUE;
            }
            else{
                echo "El usuario y/u contraseña es incorrecta.";
            }
        }
    }
    ?>


    </body>
</html>

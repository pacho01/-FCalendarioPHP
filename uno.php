<?php 
if($_POST):
    require("functions/conexion.php");
    require("functions/funciones.php");
    $userid=utf8_decode($_POST["userid"]);
    $pass=utf8_decode($_POST["pass"]);

    $result = $mysqli->query("SELECT nombre, admin FROM usuarios WHERE user_id = '$userid' AND pass = '$pass'" );
    
    
    
    if(mysqli_num_rows($result)>0):
        $consulta=mysqli_fetch_array($result);
        echo 'hola ' . $consulta['nombre'];
    else:
        //echo 'No has acertado';
        //sleep (5);
        //header('Location:tres.html');
        echo file_get_contents('dos.html');
    endif;
else:
    //header('Location:dos.html');
    echo file_get_contents('dos.html');
endif;
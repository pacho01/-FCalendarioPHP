<?php 
if($_POST):
    require("conexion.php");
    $userid=utf8_decode($_POST["userid"]);
    $pass=utf8_decode($_POST["pass"]);

    $result = $mysqli->query("SELECT nombre, admin FROM usuarios WHERE user_id = '$userid' AND pass = '$pass'" );
    
    
    
    if(mysqli_num_rows($result)>0):
        $consulta=mysqli_fetch_array($result);
        echo 'hola ' . $consulta['nombre'];
    else:
        echo 'No has acertado';
    endif;
else:
    header('Location: /FCalendarioPHP/dos.html');
endif;


?>











?>
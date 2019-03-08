<?php 
session_start();
if($_POST): //inspeccionamos si nos mandan datos desde donde se na ha llamado
    //relacionamos paginas requeridas
    require("functions/conexion.php");
    require("functions/funciones.php");
    
    $userid=utf8_decode($_POST["userid"]);
    $pass=utf8_decode($_POST["pass"]);
    $result = $mysqli->query("SELECT  nombre, admin FROM usuarios WHERE user_id = '$userid' AND pass = '$pass'" );
     
    if(mysqli_num_rows($result)>0):
       
        /*session is started if you don't write this line can't use $_Session  global variable*/
        $_SESSION['sesion_user']=$userid;
        
        header('Location:calendario.php');
    else:
        header('Location:sesion_error.html');    
    endif;

else:   //Si no existen datos abrimos la pagina de inicio de sesion.
    echo file_get_contents('start_sesion.html');
endif;
?>
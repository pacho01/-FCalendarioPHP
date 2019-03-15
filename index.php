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
        while($row = $result->fetch_assoc())
        {
        $user_nombre = $row['nombre'];
           $bol_admin = $row['admin'];
        }

        /*session is started if you don't write this line can't use $_Session  global variable*/
        $_SESSION['user_sesion']=$userid;
        $_SESSION['admin']=$bol_admin;
        $_SESSION['user_select']=$userid;
        
        if($bol_admin){
            header('Location:adminpanel.php');
        }
        else{    
            header('Location:calendario.php');
        }
    
    else:
        header('Location:sesion_error.html');    
    endif;

else:   //Si no existen datos abrimos la pagina de inicio de sesion.
    //echo file_get_contents('start_sesion.html');
    header('Location:start_sesion.html');
endif;
?>
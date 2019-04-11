<?php 
session_start(); // inicializa el inicio de sesion donde poder depositar variables de ambito global
if($_POST): //inspeccionamos si nos mandan datos desde donde se na ha llamado
    //relacionamos paginas requeridas
    
    
    
    $userid=utf8_decode($_POST["userid"]);
    $pass=utf8_decode($_POST["pass"]);

    // Creamos la conexion, generamos la consulta y cerramos.
    require("functions/conexion.php");
    $result = $mysqli->query("SELECT  id, nombre, admin FROM usuarios WHERE user_id = '$userid' AND pass = '$pass'" );
    require("functions/close_conexion.php");
    
    if(mysqli_num_rows($result)>0):
        while($row = $result->fetch_assoc())
        {
            $id= $row['id'];
            $user_nombre = $row['nombre'];
            $bol_admin = $row['admin'];
        }

        /*session is started if you don't write this line can't use $_Session  global variable*/
        // Variables globales de sistema utilizadas para identificar el usuario que ha iniciado sesion y
        // el usuario que esta seleccionado para su edicion.
        $_SESSION['user_sesion_id']=$id;
        $_SESSION['user_sesion_userid']=$userid;
        $_SESSION['user_sesion_admin']=$bol_admin;
        $_SESSION['user_sesion_select_id']=$id;
        
        //Llamamos a la pagina de panel de edicion de usuario
        header('Location:adminpanel.php');
        
    
    else:
        
        header('Location:sesion_error.html');    
    endif;

else:   //Si no existen datos abrimos la pagina de inicio de sesion.
    //echo file_get_contents('start_sesion.html');
    
    header('Location:start_sesion.html');
endif;
?>
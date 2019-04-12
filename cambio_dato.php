<?php

$id=$_POST['int_id'];
$userid=$_POST['txt_UserID'];
$nombreuser=$_POST['txt_nombe'];
$email=$_POST['txt_correo'];
$numero=$_POST['txt_numero_usr'];
$pass=$_POST['txt_pass'];
$grpo_vacaciones=$_POST['txt_grupo'];
$vacaciones_anteriores=$_POST['txt_vacaiones_anterior'];
//$admin=$_POST['txt_admin'];
if($_POST['txt_admin']=='Cheked'){
    $admin=1;
}
else{
    $admin=0;
}




/*$result = $mysqli->query("UPDATE usuarios SET nombre='$nombreuser' WHERE user_id='$userid'");*/


if($_POST['actualizar']=="Actualizar"){
    $sql = "UPDATE usuarios SET nombre = '$nombreuser', admin='$admin', correo='$email', grupo_vacaciones='$grupo_vacaciones', numero='$numero', 
    pass='$pass', user_id='$userid'  WHERE id = '$id'";
    echo "Ejecuta consulta: " . $sql . "</br>";
    require("functions/conexion.php");
    if ($mysqli->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $mysqli->error;
    }
    /*$result = $mysqli->query("SELECT  nombre, admin FROM usuarios WHERE user_id = '$userid' AND pass = '$pass'" );*/
    /*header('Location:adminpanel.php');*/
    require("functions/close_conexion.php");
    echo"<br>";
}


?>
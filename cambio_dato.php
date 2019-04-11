<?php

$id=$_POST['int_id'];
echo $id . "<br>";
$userid=$_POST['txt_UserID'];
echo $userid . "<br>";
$nombreuser=$_POST['txt_nombe'];
echo $nombreuser . "<br>";





/*$result = $mysqli->query("UPDATE usuarios SET nombre='$nombreuser' WHERE user_id='$userid'");*/



$sql = "UPDATE usuarios SET nombre = '$nombreuser' WHERE id = '$id'";
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


?>
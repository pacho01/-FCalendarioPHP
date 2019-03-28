<?php


$userid=$_POST['txt_UserID'];
$nombreuser=$_POST['txt_nombe'];

echo $nombreuser . "</br>";


require("functions/conexion.php");
/*$result = $mysqli->query("UPDATE usuarios SET nombre='$nombreuser' WHERE user_id='$userid'");*/



$sql = "UPDATE usuarios SET nombre = '$nombreuser' WHERE user_id = '$userid'";
echo "Ejecuta consulta: " . $sql . "</br>";

if ($mysqli->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $mysqli->error;
}
/*$result = $mysqli->query("SELECT  nombre, admin FROM usuarios WHERE user_id = '$userid' AND pass = '$pass'" );*/
/*header('Location:adminpanel.php');*/
$mysqli->close();


?>
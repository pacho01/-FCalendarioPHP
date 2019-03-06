<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'calendario';
$conexion = new mysqli($host,$user,$pass,$db);
for($a=1;$a<=366;$a++):
$solicitud .= "
ALTER TABLE nombre_tabla ADD COLUMN (d{$a} VARCHAR(2));
";
endfor;
$conexion->query($solicitud);
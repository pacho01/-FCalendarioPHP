<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'calendario';
$conexion = new mysqli($host,$user,$pass,$db);
for($a=1;$a<=366;$a++):
$solicitud = "ALTER TABLE dias_recuperar ADD D{$a} INT(2) UNSIGNED NOT NULL;";
$conexion->query($solicitud);
endfor;

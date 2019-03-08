<?php
        // Configuracion de conexion a la base de datos
        $mysqli = new mysqli('localhost', 'root', '', 'calendario');

        if ( $mysqli->connect_errno )
        {
       	     die( $mysqli->mysqli_connect_error() );
        }

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Acceso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <link rel='stylesheet' href='style.css'>
    
</head>
<body>
    <form action="index.php" method="post">
        <div class="calendar">
            <div class="formulario">
                <h2>INICIO SESION</h2>
                <p><label for="userid">User ID</label>
                <input name="userid" id="userid" required placeholder="user ID"></p>
                <p><label for="pass">Password</label>
                <input name="pass" id="pass" type="password" required placeholder="password"></p>
                <button class="button button1">Entrar</button>
            </div>
        </div>

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
        endif;


    ?>


    </form>
</body>
</html>
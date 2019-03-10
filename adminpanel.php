<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Panel Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form action="calendario.php" action="Post">
    <div class="Calendar">
        <div class="formulario">
            <h2>Selecciona Usuario</h2>
            <?php
            session_start();
            
            require("functions/conexion.php");
            $result = $mysqli->query("SELECT  nombre, user_id, admin FROM usuarios " );
            $userid = $_SESSION['sesion_user'];
            $admmin=$_SESSION['admin'];
            if(mysqli_num_rows($result)>0):
                echo "<select name='menu'>";
            
                while($row = $result->fetch_assoc())
                {
                    $menu_nombre = $row['nombre'];
                    $menu_admin=$row['admin'];
                    $menu_userid=$row['user_id'];
                    echo "<option value='" . $menu_userid . "'>" . $menu_nombre . "</option>";
                }
                echo "</select>";
                
            endif;
             
            ?>
             <input type="submit" value="Enviar"> 
        </div>
    </div>

</form>



</body>
</html>
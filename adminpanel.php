<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Panel Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form action="calendario.php" method="Post">
    <div class="calendar">
        <div class="ficha">
            <h2>Selecciona Usuario</h2>
            <?php
            session_start();
            require("functions/conexion.php");
            $userid = $_SESSION['user_sesion'];
            $admin=$_SESSION['admin'];
            $Userview=$_SESSION['user_select'];

            if ($_POST){

            }
            else {
                # code...
                $result = $mysqli->query("SELECT  nombre, user_id, admin FROM usuarios" );
            
                if(mysqli_num_rows($result)>0):
                    
                    echo "<P><label for='menu'>Usuario</label> <select class='ficha_bordes' name='menu'>";
                
                    while($row = $result->fetch_assoc())
                    {
                        $menu_nombre = $row['nombre'];
                        $menu_admin=$row['admin'];
                        $menu_userid=$row['user_id'];
                        echo "<option value='" . $menu_userid . "'>" . $menu_nombre . "</option>";
                    }
                    echo "</select></P>";
                    
                endif;
            }
            
            
            
            
             
            ?>
            <p><label for='nombrecito'>Dato extra</label><input class='ficha_bordes' type="text" name="nombrecito" value="Nombre"></p>
            <p><input type="submit" value="Enviar"> </p>
        </div>
    </div>

</form>



</body>
</html>
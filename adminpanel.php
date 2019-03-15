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
            require("functions/funciones.php");
            $userid = $_SESSION['user_sesion'];
            $admin=$_SESSION['admin'];
            

            // Selector de usuario
            $result = $mysqli->query("SELECT  * FROM usuarios" );

            if(mysqli_num_rows($result)>0):

                echo "
                <P>
                <label for='menu'>Usuario</label> 
                <select formaction='adminpanel.php' formmetod='post' onchange = this.form.submit() class='ficha_bordes' name='menu'>
                ";

                while($row = $result->fetch_assoc())
                {
                    $menu_nombre = $row['nombre'];
                    //$menu_admin=$row['admin'];
                    $menu_userid=$row['user_id'];
                    echo "<option value='" . $menu_userid . "'>" . $menu_nombre . "</option>";
                }
                echo "</select></P>";

            endif;

            if ($_POST){
                $Userview=$_POST('userview');
                $_SESSION['user_select']=$Userview;
                $result = $mysqli->query("SELECT  * FROM usuarios WHERE userid = '$userview'" );
                
            }
            else {
            
            $Userview=$_SESSION['user_select'];
            }
                # code...
            
        

            ?>
            <p><label for='nombrecito'>Dato extra</label><input class='ficha_bordes' type="text" name="nombrecito" placeholder="Nombre"></p>
            <p><label for='numero'>Dato extra</label><input class='ficha_bordes' type="text" name="numero" placeholder="Numero E."></p>
            <p><input type="submit" value="Ver Calendario"> </p>
            <p><input type="submit" formaction="adminpanel.php" formmetod="post" value="Actualizar"> </p>
            
        </div>
    </div>

</form>



</body>
</html>
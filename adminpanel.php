<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Panel Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form  method="Post">
    <div class="calendar">
        <div class="ficha">
            <h2>Selecciona Usuario</h2>

            <?php
            function rellamada(){

            }
            session_start();
            require("functions/conexion.php");
            require("functions/funciones.php");

            $userid = $_SESSION['user_sesion'];
            $admin=$_SESSION['admin'];
            
            if ($_POST){
                $_SESSION['user_select']=$_POST["userview"];
                //$result = $mysqli->query("SELECT  * FROM usuarios WHERE userid = '$userview'" );
            }
            $userview= $_SESSION['user_select'];   
            $result = $mysqli->query("SELECT  * FROM usuarios" );
            

            

            if(mysqli_num_rows($result)>0):

                echo "
                <P><label for='userview'>Selecciona USER:</label> 
                <select formaction='adminpanel.php' formmetod='post' onchange = this.form.submit() class='ficha_bordes' name='userview' ";
                $activar_seleccion_usuario="disabled";
                if ($admin){
                    $activar_seleccion_usuario="";
                }
                echo $activar_seleccion_usuario . ">";

                while($row = $result->fetch_assoc())
                {
                    $menu_nombre = $row['nombre'];
                    //$menu_admin=$row['admin'];
                    $menu_userid=$row['user_id'];
                    $_elemento_seleccionado="";
                    if($userview == $menu_userid){
                        $_elemento_seleccionado='selected';
                        $nombre_usuario=$menu_nombre;
                        $numero_usuario=$row['numero'];

                    }
                    echo "<option " . $_elemento_seleccionado . " value='" . $menu_userid . "'>" . $menu_userid . " </option>";
                }
                echo "
                </select></P>";

            endif;

            
                # code...
            
        

            ?>
            <p><label for='nombrecito'>Nombre USUARIO: </label><input class='ficha_bordes' type="text" name="nombrecito" placeholder= <?php echo $nombre_usuario ?> ></p>
            <p><label for='numero'>Numero empleado: </label><input class='ficha_bordes' type="text" name="numero" placeholder= <?php echo $nombre_usuario ?> ></p>
            <p><input type="submit" formaction="calendario.php" value="Ver Calendario"> </p>
            <p><input type="submit" formaction="adminpanel.php" formmetod="post" value="Actualizar"> </p>
            
        </div>
    </div>

</form>



</body>
</html>
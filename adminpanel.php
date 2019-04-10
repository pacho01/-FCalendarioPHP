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
            <h2 class="cabecera">Selecciona Usuario</h2>

            <?php
            
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
                <select formaction='' formmetod='post' onchange = this.form.submit() class='ficha_bordes' name='userview' ";
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
                        $nombre_usuario=$row['nombre'];
                        $numero_usuario=$row['numero'];
                        $correo=$row['correo'];
                        $password_user=$row['pass'];
                        $grupo_vacaciones=$row['grupo_vacaciones'];
                        $administrador_user=$row['admin'];
                        $vacaciones_anteriores=$row['vac_año_ant'];
                    }
                    echo "<option " . $_elemento_seleccionado . " value='" . $menu_userid . "'>" . $menu_userid . " </option>";
                }
                echo "
                </select></P>";

            endif;
            $mysqli->close();
            
                # code...
            
        

            ?>

            <p><label for='txt_nombe'>Nombre USUARIO: </label>
            <input class='ficha_bordes' type="text" name="txt_nombe" placeholder='Nombre' value=<?php echo $nombre_usuario ?> ></p>
            
            <p><label for='txt_numero_usr'>Numero empleado: </label>
            <input class='ficha_bordes' type="text" name="txt_numero_usr" placeholder='Numero Usuario' value=<?php echo $numero_usuario ?> ></p>
            
            <p><label for='txt_correo'>Correo: </label>
            <input class='ficha_bordes' type="text" name="txt_correo" placeholder='Correo' value=<?php echo $correo ?> ></p>
            
            <p><label for='txt_UserID'>User ID: </label>
            <input class='ficha_bordes' type="text" name="txt_UserID" placeholder='User ID' value=<?php echo $userview ?> ></p>
            
            <p><label for='txt_pass'>Password: </label>
            <input class='ficha_bordes' type="pasword" name="txt_pass" placeholder='Nombre' value=<?php echo $password_user ?> ></p>
            
            <p><label for='txt_grupo'>Grupo de vacaciones: </label>
            <input class='ficha_bordes' type="text" name="txt_grupo" placeholder='Numero Usuario' value=<?php echo $grupo_vacaciones ?> ></p>

            <p><label for='txt_admin'>Administrador: </label>
            <input class='ficha_bordes' type="checkbox" name="txt_admin" <?php echo $activar_seleccion_usuario ?>  value=<?php echo $administrador_user . " "; if ($administrador_user): echo "checked "; endif;?> ></p>
            
            <p><label for='txt_vacaiones_anterior'>Vacaciones anteriores: </label>
            <input class='ficha_bordes' type="text" name="txt_vacaiones_anterior" placeholder='Numero Usuario' value=<?php echo $vacaciones_anteriores ?> ></p>
            
            
            <input type="submit" formaction="cambio_dato.php" formmetod="post" name="actualizar" value="Actualizar" class="ficha_boton">
            <input type="submit" formaction="cambio_dato.php" formmetod="post" name="cancelar" value="Cancelar" class="ficha_boton">
            <input type="submit" formaction="calendario.php" value="Calendario" class="ficha_boton">
            
        </div>
    </div>

</form>



</body>
</html>
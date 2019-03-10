<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Calendario</title>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link rel='stylesheet' href='css/style.css'>
    </head>
    <body>
    <div class="calendar">
    <?php
        session_start();
        $userid = $_SESSION['sesion_user'];
        
        require("functions/conexion.php");
        
        $result=$mysqli->query("SELECT * FROM usuarios WHERE user_id = '$userid'");

        while($row = $result->fetch_assoc())
        {
            $user_nombre = $row['nombre'];
            $bol_admin=$row['admin']
        }

         // mes en texto
        $txt_months = array(
            'Enero', 'Febrero', 'Marzo',
            'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'septiembre',
            'Octubre', 'Noviembre', 'Diciembre'
        );

        // ultimo dia del mes
        $month_days = date('j', strtotime("last day of"));
        
        //echo '<h1> Año de nuestro Señor ' . date('Y') . '     HOLA: ' . $userid . '</h1>';
        echo '<h1> Año de nuestro Señor ' . date('Y') . '     HOLA: ' . $user_nombre . '</h1>';
        echo '<button class="button button2">Shadow Button</button>';
        
        for($mes=1; $mes<=12; $mes++){

            //Datos de configuracion el mes
            $month_txt = $txt_months[$mes-1]; //Nombre del MES
            $month_days = date('t', strtotime("01-$mes-" . date('Y'))); // Numero de dias en el mes
            $Dia_semana_inicio_mes=date('N', strtotime("01-$mes-" . date('Y'))); // Offset inicio de dia 1 en la semana

            echo '<div class="mes">';
            echo '<h2>' . $month_txt .'</h2>';
            echo '<div class="dia_nombre">Lun</div>';
            echo '<div class="dia_nombre">Mar</div>';
            echo '<div class="dia_nombre">Mie</div>';
            echo '<div class="dia_nombre">Jue</div>';
            echo '<div class="dia_nombre">Vie</div>';
            echo '<div class="dia_nombre_finde">Sab</div>';
            echo '<div class="dia_nombre_finde">Dom</div>';
            for($day_free=1; $day_free<$Dia_semana_inicio_mes; $day_free++){
                echo '<div class="dia_blanco"></div>';
            }
            foreach(range(1, $month_days) as $day){
                $marked = false;
                //$events_list = array();

                /*foreach($events as $event_day => $event)
                {
                    // si el dia del evento coincide lo marcamos y guardamos la informacion
                    if($event_day == $day)
                    {
                        $marked = true;
                        $events_list = $event;
                        break;
                    }
                }*/

                echo '
                
                <div  onclick="llama_dia(' . $mes . ',' . $day .')" class="day' . ($marked ? ' marked' : '') . '">
                    <strong class="day-number">' . $day . '</strong>
                    <div class="turno" id="id' . $mes . '-' . $day . '" > M </div>';
                    /*echo '<div class="events"><ul>';

                        foreach($events_list as $event)
                        {
                            echo '<li>
                                <h5>' . $event['description'] . '</h5>
                                <div>
                                    <strong>Inicio:</strong>
                                    <span>' . $event['start_hour'] . '</span>
                                </div>

                                <div>
                                    <strong>Fin:</strong>
                                    <span>' . $event['end_hour'] . '</span>
                                </div>
                            </li>';
                        }

                    echo '</ul></div>';*/
                echo '</div>';
            }
            echo '</div>';
        }
        ?>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        function llama_dia(mes,dia){
            var id = 'id' + mes + '-' + dia;
            var nuevo_valor = prompt('nuevo valor');
            $.post('cambio_dato.php',{"mes":mes,"dia":dia,"nuevo_valor":nuevo_valor},function(datos){$('#' + id).html('<p>'+datos+'</p>');});
        }
    </script>
    </body>
    </html>
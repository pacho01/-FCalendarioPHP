<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Calendario</title>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
    <div class="calendar">
    <?php
        // Configuracion de conexion a la base de datos
        $mysqli = new mysqli('localhost', 'root', '', 'calendario');

        if ( $mysqli->connect_errno )
        {
       	     die( $mysqli->mysqli_connect_error() );
        }

        $result = $mysqli->query('SELECT * FROM calendar_events');

        if( !$result )
            die( $mysqli->error );
        
        // Incializamos un array $events para almacenar los eventos
        $events = array();

        while($row = $result->fetch_assoc())
        {
            $start_date = new DateTime($row['fecha_inicio']);
            $end_date = new DateTime($row['fecha_fin']);
            $day = $start_date->format('j');

            $events[$day][] = array(
                'start_hour' => $start_date->format('G:i a'),
                'end_hour' => $end_date->format('G:i a'),
                'team_code' => $row['cod_equipo'],
                'description' => $row['descripcion']
            );
        }

        $datetime = new DateTime();

        // mes en texto
        $txt_months = array(
            'Enero', 'Febrero', 'Marzo',
            'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'septiembre',
            'Octubre', 'Noviembre', 'Diciembre'
        );

        /*$month_txt = $txt_months[$datetime->format('n')-1];*/

        // ultimo dia del mes
        $month_days = date('j', strtotime("last day of"));

        echo '<h1> Año de nuestro Señor ' . date('Y') . '</h1>';
        
        for($mes=1; $mes<=12; $mes++){

            //Datos de configuracion el mes
            $month_txt = $txt_months[$mes-1]; //Nombre del MES
            $month_days = date('t', strtotime("01-$mes-" . date('Y'))); // Numero de dias en el mes
            $month_ini=date('N', strtotime("01-$mes-" . date('Y'))); // Offset inicio de dia 1 en la semana

            echo '<div class="mes">';
            echo '<h2>' . $month_txt .'</h2>';
            echo '<div class="dia_nombre">Lun</div>';
            echo '<div class="dia_nombre">Mar</div>';
            echo '<div class="dia_nombre">Mie</div>';
            echo '<div class="dia_nombre">Jue</div>';
            echo '<div class="dia_nombre">Vie</div>';
            echo '<div class="dia_nombre_finde">Sab</div>';
            echo '<div class="dia_nombre_finde">Dom</div>';
            for($day_free=1; $day_free<$month_ini; $day_free++){
                echo '<div class="dia_blanco"></div>';
            }
            foreach(range(1, $month_days) as $day){
                $marked = false;
                $events_list = array();

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
                
                <div class="day' . ($marked ? ' marked' : '') . '">
                    <strong class="day-number">' . $day . '</strong>';
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
    </body>
    </html>
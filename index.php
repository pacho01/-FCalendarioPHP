<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Calendario</title>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <style type="text/css">body{margin:0;font-family:Lato;}ul,li{list-style-type:none;margin:0;padding:0;}.calendar{padding:30px;}.calendar .day{background:#ecf0f1;border-bottom:2px solid #bdc3c7;float:left;margin:3px;position:relative;height:120px;width:120px;}.day.marked{background:#3498db;border-color:#2980b9;}.day .day-number{color:#7f8c8d;left:5px;position:absolute;top:5px;}.day.marked .day-number{color:white;}.day .events{color:white;margin:29px 7px 7px;height:78px;overflow-x:hidden;overflow-y:hidden;}.day .events h5{margin:0 0 5px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;width:100%;}.day .events strong,.day .events span{display:block;font-size:11px;}.day .events ul{}.day .events li{}</style>
    </head>
    <body>
    <div class="calendar">
    <?php

        $mysqli = new mysqli('localhost', 'root', '', 'calendario');

        if ( $mysqli->connect_errno )
        {
       	     die( $mysqli->mysqli_connect_error() );
        }

        $result = $mysqli->query('SELECT * FROM calendar_events');

        if( !$result )
            die( $mysqli->error );

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

        $month_txt = $txt_months[$datetime->format('n')-1];

        // ultimo dia del mes
        $month_days = date('j', strtotime("last day of"));

        echo '<h1>' . $month_txt . '</h1>';

        foreach(range(1, $month_days) as $day)
        {
            $marked = false;
            $events_list = array();

            foreach($events as $event_day => $event)
            {
                // si el dia del evento coincide lo marcamos y guardamos la informacion
                if($event_day == $day)
                {
                    $marked = true;
                    $events_list = $event;
                    break;
                }
            }

            echo '
            <div class="day' . ($marked ? ' marked' : '') . '">
                <strong class="day-number">' . $day . '</strong>
                <div class="events"><ul>';

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

                echo '</ul></div>
            </div>';
        }
        ?>
    </div>
    </body>
    </html>
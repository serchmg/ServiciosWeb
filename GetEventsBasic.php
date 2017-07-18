<?php
/**
 * Obtiene el detalle de un alumno especificado por
 * su identificador "idalumno"
 */

require 'Events.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['offset'])) {
        // Obtener parámetro idalumno
        $offset = $_GET['offset'];
        // Tratar retorno
        $return = Events::getEventsBasic($offset);
        if ($return) {
            $event["status"] = '1';		// cambio "1" a 1 porque no coge bien la cadena.
            $event["event"] = $return;
            // Enviar objeto json del alumno
            print json_encode($event);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'status' => '2',
                    'message' => 'No se obtuvo el registro'
                )
            );
        }
    } else {
        // Enviar respuesta de error
        print json_encode(
            array(
                'status' => '3',
                'message' => 'Se necesita un identificador'
            )
        );
    }
}
?>
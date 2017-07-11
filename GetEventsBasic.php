<?php
/**
 * Obtiene el detalle de un alumno especificado por
 * su identificador "idalumno"
 */

require 'Events.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Tratar retorno
    $return = Events::getEventsBasic();
    
	if ($return) {
        $event["status"] = 1;		// cambio "1" a 1 porque no coge bien la cadena.
        $event["event"] = $return;
        // Enviar objeto json del alumno
        print json_encode($event);
    } else {
        // Enviar respuesta de error general
        print json_encode(
            array(
                'status' => '2',
                'message' => 'No se obtuvieron eventos'
            )
        );
    }
}
?>
<?php


function analizaInformacion($ticket){
        //Extraer todos los núneros de un contenido
        $reg_Ex = '/\d+/';
        preg_match_all($reg_Ex, $ticket, $matches);
        // var_dump($matches);
        return $matches;
}

function analizaTicketsDelDia($conn){
    //Leer todos los tickets de la base de datos y analizarlos
    $TotalVentas = 0;
    $date = date('Y-m-d');
    $query = "SELECT * FROM Tickets WHERE creation_date LIKE '" . $date . "%';";
    $result = mysqli_query( $conn, $query );
    $resultados['cantidadTickets'] = mysqli_num_rows($result);
    // analizaTicketsDelDia($tickets);
    while ( $row = mysqli_fetch_array($result) ) {
        $ticket = analizaInformacion($row['content']);
        //Evita que tickets sin sentido sean contados
        if (empty($ticket[0])) {
            $resultados['cantidadTickets']--;
            continue;
        }
        else{
            $TotalVentas += $ticket[0][1];
        }
    }
    $resultados['TotalVentas'] = $TotalVentas;
    return $resultados;
}
<?php
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;

function imprimirTicketPrueba(){
    $connector = new FilePrintConnector("php://stdout");
    $printer = new Printer($connector);
    $printer -> text("Prueba de impresión de Lalo!\n");
    $printer -> cut();
    $printer -> close();
}

function imprimirTicket($content){
    try {
        //Investigar
        $connector = new FilePrintConnector("php://stdout");
        $printer = new Printer($connector);
        //Imprimir todo el contenido
        $printer -> text($content);
        $printer -> cut();
        $printer -> close();
    } catch (\Throwable $th) {
        // die('No se pudo imprimir');
        $_SESSION['message'] = "No se ha podido imprimir el ticket";
        $_SESSION['message_type'] = "danger";
        header('Location: content.php');
    }
}

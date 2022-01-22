<?php
require_once (__DIR__ . '/../vendor/autoload.php');
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;


function imprimirTicket($content){
    try {
        $nombre_impresora = "LPT1"; 
        $connector = new WindowsPrintConnector($nombre_impresora);
        $printer = new Printer($connector);
        //Imprimir todo el contenido
        $printer -> text($content);
        $printer->feed(3);
        $printer->cut();
        $printer->pulse();
        $printer->close();
    } catch (\Throwable $th) {
        // die('No se pudo imprimir');
        $_SESSION['message'] = "No se ha podido imprimir el ticket";
        $_SESSION['message_type'] = "danger";
        header('Location: content.php');
    }
}

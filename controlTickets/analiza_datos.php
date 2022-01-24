<?php


function analizaInformación($content){
    //Extraer todos los núneros de un contenido
    $reg_Ex = /\d+/g;
    preg_match_all($reg_Ex, $content, $matches);
    var_dump($matches);
    //Asignar Valores
    // $telefono       = $matches[0];
    // $cantidad       = $matches[1];
    // $POS            = $matches[2];
    // $autorizacion   = $matches[3];
}
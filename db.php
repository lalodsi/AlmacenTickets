<?php

date_default_timezone_set('America/Mexico_City');
session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'CafeMay_Recargas'
);
mysqli_query($conn,"SET NAMES 'utf8'");
// if(isset($conn)){
//     echo 'Base de datos conectada';
// }
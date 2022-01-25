<?php

date_default_timezone_set('America/Mexico_City');
session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'CafeMay_Recargas'
);

// if(isset($conn)){
//     echo 'Base de datos conectada';
// }
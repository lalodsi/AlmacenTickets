<?php

$menu = $_POST['Ticket'];

// echo $menu . ' que ondqa';

function getControlTickets(){
    include_once('controlTickets/content.php');
}

if(array_key_exists('Ticket', $_POST)){
    getControlTickets();
}

?>
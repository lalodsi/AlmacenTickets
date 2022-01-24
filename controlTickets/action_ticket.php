<?php

include_once('../db.php');

var_dump($_POST);

// Sólo guardar ticket
if(isset($_POST['save_ticket'])){
    // echo "Parte 1 \n";
    $content = $_POST['Ticket'];
    $query = "INSERT INTO Tickets(content) VALUES ('$content');";
    $result = mysqli_query($conn, $query);
    $_SESSION['message'] = "Se ha guardado el ticket correctamente";
    $_SESSION['message_type'] = "success";
}

// Imprimir y guardar ticket
if (isset($_POST['print_ticket'])) {
    echo "Parte 2 \n";
    require_once('print_ticket.php');
    $content = $_POST['Ticket'];
    imprimirTicket($content);
    $query = "INSERT INTO Tickets(content) VALUES ('$content');";
    $result = mysqli_query($conn, $query);
    $_SESSION['message'] = "Se ha guardado el ticket correctamente";
    $_SESSION['message_type'] = "success";
}
// var_dump($_POST);
if (isset($_GET['id'])) {
    echo "Parte 3 \n";
    require_once('print_ticket.php');
    echo 'Esto se debe mostrar solo en show_tickets';
    $id = $_GET['id'];
    $query = "SELECT * FROM tickets WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    imprimirTicket($row['content']);
    header('Location: content.php');
}

header('Location: content.php');
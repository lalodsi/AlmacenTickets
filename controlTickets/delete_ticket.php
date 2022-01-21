<?php

include('../db.php');

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM Tickets WHERE id=$id";
    $result = mysqli_query( $conn,$query );

    if( !$result ){
        die("Query Failed");
    }

    $_SESSION['message'] = "El ticket ha sido borrado con éxito";
    $_SESSION['message_type'] = "danger";

    header("Location: show_tickets.php");

}

?>
<?php

include('db.php');

if(isset($_POST['save_ticket'])){
    $content = $_POST['Ticket'];
    $query = "INSERT INTO Tickets (content) VALUES ('$content');";
    mysqli_query($conn, $query);

    $_SESSION['message'] = "Se ha guardado el ticket correctamente";
    $_SESSION['message_type'] = "success";
}

header('Location: index.php');
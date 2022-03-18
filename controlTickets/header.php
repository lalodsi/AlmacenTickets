<?php
require __DIR__ . '/../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardado de Tickets</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <!-- Titulo -->
<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a href="#" class="navbar-brand">Control de Tickets</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="../index.php">Regresar</a>
                <a class="nav-link" href=".\content.php">Control Tickets</a>
                <a class="nav-link" href=".\show_tickets.php">Tickets de Hoy</a>
            </div>
        </div>
    </div>
</nav> -->

<div class="container mt-4 p-4 contenedor-principal">
    <div class="row">
        <div class="col-3">
                <div class="btn-group-vertical" role="group" aria-label="MenuPrincipal">
                    <a class="btn btn-secondary nav-link" aria-current="page" href="../index.php">Regresar</a>
                    <a class="btn btn-secondary nav-link" href=".\content.php">Control Tickets</a>
                    <a class="btn btn-secondary nav-link" href=".\show_tickets.php">Tickets de Hoy</a>
                    <a class="btn btn-secondary nav-link" href=".\show_all.php">Buscar Tickets</a>
                </div>
        </div>
        <div class="col justify-content-center">

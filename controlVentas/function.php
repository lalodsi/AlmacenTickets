<?php
require_once('../db.php');

if (isset($_GET['operation'])) {
    $operacion = $_GET['operation'];

    if ($operacion == "add_product") {
        $nombre = $_GET['nombre-producto'];
        $categoria = $_GET['categoria'];
        $precioVenta = $_GET['precio-venta'];
        $precioCompra = $_GET['precio-compra'];
        $cantidad = $_GET['cantidad'];
        
        $query = "INSERT INTO productos (nombre, precio_venta, precio_compra, cantidad, categoria_id) VALUES" .
        "('" . $nombre . "', " .
        "'" . $precioVenta . "', " .
        "'" . $precioCompra . "', " .
        "'" . $cantidad . "', " .
        "'" . $categoria . "');";
        
        $result = mysqli_query( $conn, $query );

        $_SESSION['message'] = "Se ha agregado un nuevo producto";
    }

    if ($operacion == "add_category") {
        $nombre = $_GET['categoria'];
    
        $query = "INSERT INTO categorias (nombre) VALUES ('" . $nombre . "');";
        echo $query;
        // $result = mysqli_query( $conn, $query );
        
        $_SESSION['message'] = "Se ha agregado la nueva categoría";
    }
    
    if ($operacion == "add_service") {
        $nombre = $_GET["nombre-servicio"];
        $precio = $_GET["precio-venta"];
        $categoria = $_GET["categoria"];
        
        $query = "INSERT INTO servicios (nombre, precio, categoria_id) VALUES" .
        "('" . $nombre . "', " .
        "'" . $precio . "', " .
        "'" . $categoria . "');";

        $result = mysqli_query( $conn, $query );
        $_SESSION['message'] = "Se ha agregado el nuevo servicio";
    }

    if ($operacion == "sale") {
        
    }
}

// header("Location: index.php");
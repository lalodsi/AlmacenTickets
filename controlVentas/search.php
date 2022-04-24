<?php
include_once("../db.php");

if (isset($_GET["buscarProducto"])) {
    $query = "SELECT * FROM productos";
}
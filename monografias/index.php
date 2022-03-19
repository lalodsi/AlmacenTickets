<?php
include('../db.php');
include('./header.php');
?>

<h1>Control de monografias</h1>

<form class="menu" name="dataSearch" method="GET">
    <label for="search">Buscar monografía</label> 
    <br>
    <input class="form-control contenedor-transparente" type="text" name="search" id="search" autofocus>
    <br>
    <!-- <button class="btn btn-primary" type="submit" id="botonSubmit">Buscar</button> -->
</form>

<div class="contenido table table-hover">          
</div>

<?php
include('./footer.php');
?>
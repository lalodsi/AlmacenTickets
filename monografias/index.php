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
</form>

<div class="contenido"> 
    <h1><center>Teclea algo para mostrar los resultados</center></h1>         
</div>

<?php
include('./footer.php');
?>
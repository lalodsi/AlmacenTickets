<?php require_once('header.php'); ?>
<?php require_once('../db.php'); ?>
<?php require_once('./analiza_datos.php'); ?>

<div class="col-lg col-md-10 col-sm mx-auto mt-4">
    <div class="col mb-3">
        <h1>Todos los Tickets</h1>
    </div>
    <div class="opcionesBusqueda">
        <div class="menu">
            <h3>Selecciona la forma de búsqueda</h3>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-design" id="btnSelectForm">Por fecha</button>
                <button type="button" class="btn btn-design" id="btnSelectForm">buscar por datos</button>
                <button type="button" class="btn btn-design" id="btnSelectForm">Busqueda avanzada</button>
            </div>
        </div>
        <div class="menuSeleccion">
            <div class="menu" action="">
                <h2>Elige la fecha de consulta</h2>
                <form name="dateSearch" action="" onsubmit="return inicializarForm();" method="post">
                    <label for="year">Fecha:</label> <input type="date" name="" id="">
                    <br>
                    <button type="submit" id="botonSubmit">Buscar</button>
                </form>
            </div>
            <div class="menu" action="show_all.php">
                <h2>Buscar por datos</h2>
                <form name="dataSearch" action="">
                    <label for="amount">Cantidad:</label> <input type="number" name="cantidad" id="">
                    <br>
                    <label for="phone">Teléfono:</label> <input type="number" name="" id="">
                    <br>
                    <button type="submit" id="botonSubmit">Buscar</button>
                </form>
            </div>
            <div class="menu" action="">
                <h2>Búsqueda Avanzada</h2>
                <form name="dataSearch" action="">
                    <label for="text">Teléfonos que contengan lo siguiente:</label> <input type="text" name="" id="">
                    <br>
                    <label for="date">Recargas hechas alrededor de cierto día y hora específica:</label> 
                    <br>
                    
                    <input type="date" name="" id="">
                    <input type="time" name="" id="">
                    <br>
                    <button type="submit" id="botonSubmit">Buscar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="mostrarContenido menuDatos">
        <?php
            // $date = date('Y-m-d');
            if(isset($_GET['nombre'])){
                $nombre = $_GET['nombre'];
                $cantidad = $_GET['cantidad'];
                echo $nombre;
                echo $cantidad;
                $date = "2022-01-24";
                $query = "SELECT * FROM Tickets WHERE creation_date LIKE '" . $date . "%';";
                $result = mysqli_query( $conn, $query );
                if ( $row = mysqli_fetch_array($result) ) {
        ?>
            <h1>Hola</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Ticket</th>
                        <th>Fecha y Hora</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ( $row = mysqli_fetch_array($result) ) { ?>
                    <tr>
                        <td><?= $row['content'] ?></td>
                        <td><?= $row['creation_date'] ?></td>
                        <td> </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } } ?>
    </div>
    <!-- <div id="calendar-container"></div> -->
    
</div>

<?php require_once('footer.php'); ?>
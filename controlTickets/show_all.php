<?php require_once('header.php'); ?>
<?php require_once('../db.php'); ?>
<?php require_once('./analiza_datos.php'); ?>

<div class="col-lg col-md-10 col-sm mx-auto mt-4">
    <!-- <div class="col mb-3">
        <h1>Todos los Tickets</h1>
    </div> -->
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
            <div class="menu">
                <h2>Elige la fecha de consulta</h2>
                <form name="dateSearch"  method="GET">
                    <input type="hidden" name="tipoConsulta" value="fecha">
                    <label for="year">Fecha:</label> 
                    <input class="form-control contenedor-transparente" type="date" name="fecha" id="">
                    <br>
                    <button class="btn btn-primary" type="submit" id="botonSubmit">Buscar</button>
                </form>
            </div>
            <div class="menu">
                <h2>Buscar por datos</h2>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <form name="dataSearch" method="GET">
                                <input type="hidden" name="tipoConsulta" value="datosCantidad">
                                <label for="amount">Cantidad depositada:</label> 
                                <input class="form-control contenedor-transparente" type="number" name="cantidad" id="">
                                <br>
                                <button class="btn btn-primary" type="submit" id="botonSubmit">Buscar</button>
                            </form>
                        </div>
                        <div class="col">
                            <form name="dataSearch" method="GET">
                                <input type="hidden" name="tipoConsulta" value="datosTelefono">
                                <label for="phone">Teléfono:</label> 
                                <input class="form-control contenedor-transparente" type="number" name="telefono" id="">
                                <br>
                                <button class="btn btn-primary" type="submit" id="botonSubmit">Buscar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu">
                <h2>Búsqueda Avanzada</h2>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <form name="dataSearch" method="GET">
                                <input type="hidden" name="tipoConsulta" value="avanzadaFecha">
                                <label for="date">Recargas hechas alrededor de cierto día y hora específica:</label> 
                                <br>
                                <input class="form-control contenedor-transparente" type="date" name="fecha" id="">
                                <!-- <input type="time" name="hora" id=""> -->
                                <input type="hidden" name="diferencia" value="3">
                                <br>
                                <button class="btn btn-primary" type="submit" id="botonSubmit">Buscar</button>
                            </form>
                        </div>
                        <div class="col">
                            <form name="dataSearch" method="GET">
                                <input type="hidden" name="tipoConsulta" value="avanzadaTelefonos">
                                <label for="text">Teléfonos que contengan lo siguiente:</label> 
                                <input class="form-control contenedor-transparente" type="number" name="telefono" id="">
                                <br>
                                <button class="btn btn-primary" type="submit" id="botonSubmit">Buscar</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="contenido mostrarContenido menuDatos">
        <?php
            // $date = date('Y-m-d');
            if(isset($_GET['tipoConsulta'])){
                if ($_GET['tipoConsulta'] == "fecha") {
                    $fecha = $_GET['fecha'];
                    $query = "SELECT * FROM Tickets WHERE creation_date LIKE '" . $fecha . "%';";
                }
                if ($_GET['tipoConsulta'] == "datosCantidad") {
                    $cantidad = $_GET['cantidad'];
                    $query = "SELECT * FROM Tickets WHERE content LIKE '%" . $cantidad . "%';";
                }
                if ($_GET['tipoConsulta'] == "datosTelefono") {
                    $telefono = $_GET['telefono'];
                    $query = "SELECT * FROM Tickets WHERE content LIKE '%" . $telefono . "%';";
                }
                if ($_GET['tipoConsulta'] == "avanzadaTelefonos") {
                    $telefono = $_GET['telefono'];
                    $query = "SELECT * FROM Tickets WHERE content LIKE '%" . $telefono . "%';";
                }
                if ($_GET['tipoConsulta'] == "avanzadaFecha") {
                    $fecha = $_GET['fecha'];
                    list($year, $month, $day) = explode('-', $fecha);
                    $diferencia = $_GET['diferencia'];
                    $startDay = $day - $diferencia;
                    $endDay = $day + $diferencia;
                    $startDate = implode("-", [$year, $month, $startDay] );
                    $endDate = implode("-", [$year, $month, $endDay] );

                    $query = "SELECT * FROM Tickets WHERE creation_date BETWEEN '" .
                        $startDate . "' AND '".
                        $endDate ."';";
                    // echo $query;
                }

                // Hacer la consulta
                $result = mysqli_query( $conn, $query );
                if ( $row = mysqli_fetch_array($result) ) {
        ?>
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
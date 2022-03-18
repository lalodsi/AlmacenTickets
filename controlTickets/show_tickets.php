<?php include('../db.php'); ?>
<?php include('./header.php'); ?>


        <div class="col-lg col-md-10 col-sm mx-auto mt-4">
            
            <!-- Tabla con el contenido de la base de datos -->
            <div class="contenido table-responsive-sm table-responsive-md">
                <div class="col mb-3">
                    <h1>Tickets Guardados de hoy</h1>
                </div>
                <?php
                // Extraer Datos
                    $date = date('Y-m-d');
                    $query = "SELECT * FROM Tickets WHERE creation_date LIKE '" . $date . "%';";
                    $result = mysqli_query( $conn, $query );
                    if ( $row = mysqli_fetch_array($result) ) { ?>
                    <table class="table table-hover">
                            <thead>
                                <tr>
                                    <!-- <th>Id</th> -->
                                    <th>Ticket</th>
                                    <th>Fecha y Hora</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $date = date('Y-m-d');
                                    $query = "SELECT * FROM Tickets WHERE creation_date LIKE '" . $date . "%';";
                                    $result = mysqli_query( $conn, $query );
                                    while ( $row = mysqli_fetch_array($result) ) { ?>
                                        <tr>
                                            <!-- <td><?= $row['id']; ?></td> -->
                                            <td><?= $row['content']; ?></td>
                                            <td><?= $row['creation_date']; ?></td>
                                            <td>
                                                    <a href="./delete_ticket.php?id= <?= $row['id'] ?>" class="btn btn-danger">Borrar</a>
                                                    <a href="./edit_ticket.php?id= <?= $row['id'] ?>" class="btn btn-info">Editar</a>
                                                    <a href="./action_ticket.php?id= <?= $row['id'] ?>" class="btn btn-warning">
                                                    Imprimir <img class='impresora' src="./images/print.png" alt="Imagen impresora">
                                                    </a>
                                            </td>
                                        </tr>
                                <?php } ?>
                            </tbody>
                    </table>
                <?php
                }
                else{
                    ?>
                    <div class="jumbotron alert p-4 mt-4">
                        <h1 class="display-5">Aún no has hecho recargas el día de hoy</h1>
                        <p class="lead">Se mostrará información cuando haya recargas.</p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

<?php include('../include/footer.php'); ?>
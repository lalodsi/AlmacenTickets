<?php include('../db.php'); ?>
<?php include('./header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm mx-auto mt-4">
            <div class="col mb-3">
                <h1>Tickets Guardados</h1>
            </div>

            <!-- Tabla con el contenido de la base de datos -->
            <div class="table-responsive-sm table-responsive-md">
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
                            $query = "SELECT * FROM Tickets";
                            $result = mysqli_query( $conn, $query );
                            while ($row = mysqli_fetch_array($result)) { ?>
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
            </div>
        </div>
    </div>
</div>

<?php include('../include/footer.php'); ?>
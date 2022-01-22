<?php require_once('header.php'); ?>
<?php require_once('../db.php'); ?>


<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm mx-auto my-4">

            <!-- Mensaje de estado de tareas -->
            <?php if (isset($_SESSION['message'])) { ?>
                <!-- Generar el Simbolo de una palomita -->
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                </svg>

                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>

            <!-- Formulario para Guardar Tickets -->
            <div class="card mb-5">
                <div class="card-body">
                    <h5 class="card-title">Tickets</h5>
                    <p class="card-text">Pega aquí un sólo ticket</p>
                        <form action="action_ticket.php" method="POST">
                            <div class="mb-3">
                                <textarea name="Ticket" rows="3" class="form-control" required></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary" name="save_ticket" value="Guardar Ticket">
                            <!-- <input type="image" src="./images/print.png" class="btn btn-warning" name="print_ticket" value="Imprimir Ticket"> -->
                            <button type="submit" class="btn btn-warning" name="print_ticket">
                                Imprimir <img class='impresora' src="./images/print.png" alt="Imagen impresora">
                            </button>
                        </form>
                </div>
            </div>

            <!-- Mostrar los últimos 5 tickets -->
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1>Últimos 5 Tickets</h1>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Ticket</th>
                            <th>Fecha y Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM Tickets ORDER BY creation_date DESC limit 5;" ;
                        $result = mysqli_query( $conn, $query );
                        while ($row = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <!-- <td><?= $row['id']; ?></td> -->
                                <td><?= $row['content']; ?></td>
                                <td><?= $row['creation_date']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>

<?php require_once('footer.php'); ?>
<?php
include('db.php');

//Consulta el contenido en la base de datos
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM Tickets WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
}

//Actualiza el valor de la base de datos
if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $content = $_POST['Ticket'];
    echo $content;
    $query = "UPDATE `Tickets` SET `content`='$content' WHERE id=$id";
    mysqli_query( $conn, $query );
    header('Location: show_tickets.php');
}


include('include/header.php');
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h1>Editando Ticket</h1>
                    <form action="edit_ticket.php?id=<?= $_GET['id'] ?>" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Contenido del Ticket</label>
                            <textarea name="Ticket"
                            rows="3" class="form-control"
                            required><?= $row['content'] ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="update">Terminado</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>
<?php
include('../db.php');
include('./header.php');
?>

<h1>Bienvenido a control de monografias</h1>

<div class="contenido table-responsive-sm table-responsive-md">
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $consulta = "SELECT * from monografias;";
            $result = mysqli_query($conn, $consulta);
            mysqli_set_charset($conn, "utf8mb4");
            while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <th><?= $row['monografia'] ?></th>
                <th><?= $row['cantidad'] ?></th>
                <th>
                <a href="./delete_ticket.php?id= <?= $row['id'] ?>" class="btn btn-danger">Borrar</a>
                </th>
            </tr>
            <?php } ?>
        </tbody>
    </table>                
</div>

<?php
include('./footer.php');
?>
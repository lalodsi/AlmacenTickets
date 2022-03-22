<?php
include('../db.php');

if (isset($_GET['search'])) {
    $elementoABuscar = $_GET['search'];
    $consulta = "SELECT * from monografias WHERE monografia LIKE '%" . $elementoABuscar . "%'; ";
    // echo $consulta;
}
else{
    $consulta = "SELECT * from monografias;";
}
$result = mysqli_query($conn, $consulta);
$cantidad = mysqli_num_rows($result);
// echo $cantidad;

if ($cantidad > 0) {
?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Ubicacion</th>
            <!-- <th>Opciones</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <th><?= $row['monografia'] ?></th>
            <th><?= $row['ubicacion'] ?></th>
            <!-- <th>
                hola
            </th> -->
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php
}
else{
?>
    <h3>No hay monografias que tengan "<?= $elementoABuscar ?>"</h3>
<?php
}
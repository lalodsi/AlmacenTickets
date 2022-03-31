<?php include_once("header.php"); ?>
<?php require_once('../db.php'); ?>

<?php if (isset($_SESSION['message'])) { ?>
    <!-- Generar el Simbolo de una palomita -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
    </svg>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <?= $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php session_unset(); } ?>

<div class="menu card mb-3">
    <div class="card-body">
        <?php 
            $query = "SELECT * FROM categorias;";
            $result = mysqli_query( $conn, $query );
        ?>
        <h5>Añadir Productos</h5>
        <p class="card-text">añade la información de un producto</p>
        <form name="add_product" method="GET" action="function.php">
        <input type="hidden" name="operation" value="add_product">
            <label for="categoria">Categoría:</label>
            <select class="contenedor-transparente" name="categoria">
                <option value="">Elige una categoría</option>
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <option value="<?= $row['categoria_id'] ?>"><?= $row['nombre'] ?></option>
                <?php } ?>
            </select>
            <br>
            <label for="nombre-producto">Nombre del producto:</label>
            <input class="contenedor-transparente" type="text" name="nombre-producto">
            <br>
            <label for="precio-compra">Costo del producto:</label>
            <input class="contenedor-transparente" type="number" step="0.01" name="precio-compra">
            <br>
            <label for="precio-venta">Precio a la venta:</label>
            <input class="contenedor-transparente" type="number" step="0.01" name="precio-venta">
            <br>
            <label for="cantidad">Cantidad:</label>
            <input class="contenedor-transparente" type="number" name="cantidad">
            <br>
            <!-- <label for="nombre-producto">Nombre del producto:</label>
            <input type="text" name="nombre-producto"> -->
            <input type="submit" value="Añadir Producto" class="contenedor-transparente">
        </form>
    </div>
</div>
<div class="menu card mb-3">
    <div class="card-body">
        <h5>Añadir Categorias</h5>
        <p class="card-text">Añade las categorias de un producto</p>
        <form name="add_category" method="GET" action="function.php">
            <input type="hidden" name="operation" value="add_category">
            <input type="text" name="categoria" class="form-control contenedor-transparente">
            <input type="submit" value="+" class="contenedor-transparente">
        </form>
    </div>
</div>

<?php include_once("footer.php"); ?>
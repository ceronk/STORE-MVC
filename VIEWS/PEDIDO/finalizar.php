<?php if (isset($_SESSION['identity'])) : ?>

    <h1>Finalizar Compra</h1>
    <p>
        <a href="<?= base_url ?>carrito/index">Ver detalles de pedido</a>
    </p>
    <br>
    <h3>Datos de envio</h3>
    <form action="<?= base_url ?>pedido/add" method="post">

        <label for="">Municipio / Provincia:</label>
        <input type="text" name="provincia" id="" required>

        <label for="">Ciudad /localidad:</label>
        <input type="text" name="localidad" id="" required>

        <label for="">Direccion:</label>
        <input type="text" name="direccion" id="" required>

        <input type="submit" value="Confirmar">


    </form>

<?php else : ?>
    <h1>Necesitas estar identificado</h1>
    <p>Necesitas estar logueado para poder realizar compras</p>
<?php endif; ?>
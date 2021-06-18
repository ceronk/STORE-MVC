<h1>Detalle pedidos</h1>


<?php if (isset($finalPedido)) : ?>

    <?php if ($_SESSION['admin']) : ?>
        <h3>Cambiar estado | Panel Administración</h3>
        <hr>
        <form action="<?= base_url ?>pedido/estado" method="post">

            <input type="hidden" name="idPedido" value="<?= $finalPedido->id; ?>">


            <label for="">Estado Pedido</label>
            <select name="estado" id="">
                <option value="confirm" <?= $finalPedido->estado == 'confirm' ? 'selected' : ''; ?>>Pendiente</option>
                <option value="preparation" <?= $finalPedido->estado == 'preparation' ? 'selected' : ''; ?>>En Preparación</option>
                <option value="ready" <?= $finalPedido->estado == 'ready' ? 'selected' : ''; ?>>Preparado para el enviar</option>
                <option value="sended" <?= $finalPedido->estado == 'sended' ? 'selected' : ''; ?>>Enviado</option>
            </select>


            <input type="submit" value="Cambiar estado">
        </form>
        <br>
    <?php endif; ?>

    <h3>Direccion de envio: </h3>
    <hr>
    <p>Ciudad: <?= $finalPedido->localidad; ?></p>
    <p>Municipio: <?= $finalPedido->provincia; ?></p>
    <p>Direccion: <?= $finalPedido->direccion; ?></p>
    <hr>
    <br>
    <h3>Datos del pedido: </h3>
    <hr>
    <p>Estado: <?= Utils::showStatus($finalPedido->estado); ?></p>
    <p> Numero de pedido: <?= $finalPedido->id; ?></p>
    <p>Total a Pagar: <?= $finalPedido->coste; ?></p>
    <br>
    <br>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php while ($valItems = $itms->fetch_object()) : ?>
            <tr>
                <td>
                    <?php if (isset($valItems->imagen) != null) : ?>
                        <img src="<?= base_url ?>/uploads/images/<?= $valItems->imagen; ?>" alt="" class="img_carrito">
                    <?php else : ?>
                        <img src="<?= base_url ?>/uploads/images/camiseta.png" alt="" class="img_carrito">
                    <?php endif; ?>
                </td>
                <td><?= $valItems->nombre; ?></td>
                <td><?= $valItems->precio; ?></td>
                <td><?= $valItems->unidades; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php endif; ?>
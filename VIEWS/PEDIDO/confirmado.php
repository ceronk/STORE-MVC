<?php
//pendiente implementar api de paypal para efectuar pago real
//y asi se actualizaria/eliminaria la vista VIEWS/finalizar
?>

<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>

    <h1>Tu pedido se ha confirmado</h1>
    <p>Pedido guardado con exito, cancelar para procesar y enviar producto</p>
    <br>
    <hr>
    <strong>Cuenta bancaria: 8764159734</strong>
    <br>
    <strong>Titular cuenta: Felipe gatogris</strong>
    <hr>
    <br>
    <?php if (isset($finalPedido)) : ?>
        <h3>Datos del pedido</h3>
        <hr>
        <p>Estado: <?= Utils::showStatus($_SESSION['pedido']); ?></p>
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

<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete') : ?>
    <h1>Tu pedido NO se ha procesado</h1>
<?php endif; ?>
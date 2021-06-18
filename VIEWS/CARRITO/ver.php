<h1>Carrito de compras</h1>


<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($carritoObject as $indice => $productItem) : ?>
            <?php $item = $productItem['producto']; //Extrayendo elementos de objeto con indice producto
            ?>
            <tr>
                <td>
                    <?php if (isset($item->imagen) != null) : ?>
                        <img src="<?= base_url ?>/uploads/images/<?= $item->imagen; ?>" alt="" class="img_carrito">
                    <?php else : ?>
                        <img src="<?= base_url ?>/uploads/images/camiseta.png" alt="" class="img_carrito">
                    <?php endif; ?>
                </td>

                <td><a href="<?= base_url ?>producto/ver&id=<?= $item->id; ?>"><?= $item->nombre; ?></a></td>
                <td><?= $item->precio; ?></td>
                <td>
                    <?= $productItem['unidades']; ?>
                    <div class="updown-unidades">

                        <a href="<?= base_url ?>carrito/up&index=<?= $indice; ?>" class="button">+</a>
                        <a href="<?= base_url ?>carrito/down&index=<?= $indice; ?>" class="button">-</a>
                    </div>
                </td>
                <td><a href="<?= base_url ?>carrito/remove&index=<?= $indice; ?>" class="button button-carrito button-red">Eliminar producto</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <div class="delete-carrito">
        <a href="<?= base_url ?>carrito/deleteall" class="button button-delete button-red">Eliminar todo el carrito</a>
    </div>
    <div class="total-carrito">
        <?php $stats = Utils::statsCarrito(); ?>
        <h3>Precio Total: $<?= $stats['total']; ?></h3>
        <a href="<?= base_url ?>pedido/finalizar" class="button button-pedido">Finalizar Pedido</a>
    </div>
<?php else : ?>
    <p>Carrito vacio</p>
<?php endif; ?>
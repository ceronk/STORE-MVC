<h1>Carrito de compras</h1>

<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
        <th>Acciones</th>
    </tr>

<?php if(isset($carritoObject)):?>

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

            <td><a href="<?= base_url ?>producto/ver&id=<?= $item->id ?>"><?= $item->nombre; ?></a></td>
            <td><?= $item->precio; ?></td>
            <td><?= $productItem['unidades']; ?></td>
            <td><a href="">Eliminar</a></td>
        </tr>
    <?php endforeach; ?>
    <?php endif;?>
</table>
<br>


<div class="total-carrito">
    <?php $stats = Utils::statsCarrito(); ?>
    <h3>Precio Total: $<?= $stats['total']; ?></h3>
    <a href="<?= base_url ?>pedido/finalizar" class="button button-pedido">Finalizar Pedido</a>
</div>
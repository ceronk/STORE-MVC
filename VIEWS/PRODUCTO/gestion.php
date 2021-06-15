<h1>Gestion de productos</h1>
<a href="<?= base_url ?>producto/crear" class="button button-small">Crear producto</a>


<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete') : ?>
    <strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete') : ?>
    <strong class="alert_red"> El registro no se ha creado!</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>


<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
    <strong class="alert_green">El producto se ha eliminado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['producto'] != 'delete') : ?>
    <strong class="alert_red"> El registro no se ha eliminado!</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>
    </tr>
    <?php while ($prod = $products->fetch_object()) : ?>
        <tr>
            <td><?= $prod->id; ?></td>
            <td><?= $prod->nombre; ?></td>
            <td><?= $prod->descripcion; ?></td>
            <td><?= $prod->precio; ?></td>
            <td><?= $prod->stock; ?></td>
            <td>
                <a href="<?= base_url ?>producto/editar&id=<?= $prod->id; ?>" class="button button-gestion">Editar</a>
                <a href="<?= base_url ?>producto/eliminar&id=<?= $prod->id; ?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
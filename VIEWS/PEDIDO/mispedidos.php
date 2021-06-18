<h1>Mis pedidos</h1>

<table>
    <tr>
        <th>Numero Pedido</th>
        <th>Coste</th>
        <th>Fecha</th>
    </tr>

    <?php //var_dump($pedidosData); die();?>

<?php if(isset($pedidosData)):?>

    <?php while ($items = $pedidosData->fetch_object()) : ?>
        <tr>
            <td><a href="<?=base_url?>pedido/detalle&id=<?= $items->id; ?>"><?= $items->id; ?></a></td>
            <td>$<?= $items->coste; ?></td>
            <td><?= $items->fecha; ?></td>            
        </tr>
    <?php endwhile; ?>
    <?php endif;?>
</table>
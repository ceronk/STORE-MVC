
<?php if(isset($gestion) && $gestion == true):?>
    <h1>Gestión Pedidos | Panel Administración</h1>
<?php else:?>
    <h1>Mis pedidos</h1>
<?php endif;?>


<table>
    <tr>
        <th>Numero Pedido</th>
        <th>Coste</th>
        <th>Fecha</th>
        <th>Estado Pedido</th>
    </tr>

<?php if(isset($pedidosData)):?>

    <?php while ($items = $pedidosData->fetch_object()) : ?>
        <tr>
            <td><a href="<?=base_url?>pedido/detalle&id=<?= $items->id; ?>"><?= $items->id; ?></a></td>
            <td>$<?= $items->coste; ?></td>
            <td><?= $items->fecha; ?></td>
            <td><?= $items->estado; ?></td>            
        </tr>
    <?php endwhile; ?>
    <?php endif;?>
</table>
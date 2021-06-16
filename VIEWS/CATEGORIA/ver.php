<?php if (isset($getOne)) : ?>
    <h1><?= $getOne->nombre; ?></h1>
<?php else : ?>
    <h1>La categoria no existe</h1>
<?php endif; ?>



<?php if ($prdcts->num_rows == 0) : ?>
    <p>No hay productos para mostrar!</p>
<?php else : ?>

    <?php while ($print = $prdcts->fetch_object()) : ?>

        <div class="product">
            <?php if (isset($print->imagen) != null) : ?>
                <img src="<?= base_url ?>/uploads/images/<?= $print->imagen; ?>" alt="">
            <?php else : ?>
                <img src="<?= base_url ?>/uploads/images/camiseta.png" alt="">
            <?php endif; ?>
            <h2><?= $print->nombre; ?></h2>
            <p><?= $print->precio; ?></p>
            <a href="<?= base_url ?>" class="button">Comprar</a>
        </div>

    <?php endwhile; ?>


<?php endif; ?>
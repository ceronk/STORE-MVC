<?php if (isset($getOneProduct)) : ?>
    <h1><?= $getOneProduct->nombre; ?></h1>


    <div id="detail-product">
        <div class="image">
            <?php if (isset($getOneProduct->imagen) != null) : ?>
                <img src="<?= base_url ?>/uploads/images/<?= $getOneProduct->imagen; ?>" alt="">
            <?php else : ?>
                <img src="<?= base_url ?>/uploads/images/camiseta.png" alt="">
            <?php endif; ?>
        </div>
        <div class="data">
            <p class="description"><?= $getOneProduct->descripcion; ?></p>
            <p class="price">$<?= $getOneProduct->precio; ?></p>
            <a href="<?= base_url ?>" class="button">Comprar</a>
        </div>
    </div>

<?php else : ?>
    <h1>El producto no existe</h1>
<?php endif; ?>
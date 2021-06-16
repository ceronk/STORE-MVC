<h1>Productos Aleatorios</h1>

<?php while($pro = $prdcts->fetch_object()):?>


<div class="product">

    <?php if(isset($pro->imagen) != null):?>
    <img src="<?=base_url?>/uploads/images/<?=$pro->imagen;?>" alt="">
    <?php else:?>
        <img src="<?=base_url?>/uploads/images/camiseta.png" alt="">
    <?php endif;?>

    <h2><?=$pro->nombre;?></h2>
    <p><?=$pro->precio;?></p>
    <a href="<?=base_url?>" class="button">Comprar</a>
</div>

<?php endwhile;?>
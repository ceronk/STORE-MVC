<?php if (isset($getOne)) : ?>
    <h1><?= $getOne->nombre; ?></h1>
<?php else : ?>
    <h1>La categoria no existe</h1>
<?php endif; ?>



<?php if ($prdcts->num_rows == 0) : ?>
    <p>No hay productos para mostrar!</p>
<?php else : ?>

    <?php while($pro = $prdcts->fetch_object()):?>


<div class="product">
 <a href="<?=base_url?>producto/ver&id=<?=$pro->id?>">
    <?php if(isset($pro->imagen) != null):?>
    <img src="<?=base_url?>/uploads/images/<?=$pro->imagen;?>" alt="">
    <?php else:?>
        <img src="<?=base_url?>/uploads/images/camiseta.png" alt="">
    <?php endif;?>

    <h2><?=$pro->nombre;?></h2>
    </a>
    <p>$<?=$pro->precio;?></p>
    <a href="<?=base_url?>" class="button">Comprar</a>
</div>

<?php endwhile;?>


<?php endif; ?>
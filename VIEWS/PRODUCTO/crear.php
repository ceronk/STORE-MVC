<?php if (isset($editar) && isset($prod) && is_object($prod)) : ?>
    <h1>Editar Producto | <?= $prod->nombre; ?></h1>
    <?php $url_Action = base_url . "producto/save&id=" . $prod->id; ?>
    <?php $submitName = "Actualizar Producto";?>
<?php else : ?>
    <h1>Crear Producto</h1>
    <?php $url_Action = base_url . "producto/save"; ?>
    
    <?php $submitName = "Crear Producto";?>
<?php endif; ?>

<div class="form_container">

    <form action="<?= $url_Action; ?>" method="post" enctype="multipart/form-data">
    <?php if (isset($editar) && isset($prod) && is_object($prod)) : ?>
        <label for="">ID</label>
        <input type="text" name="" id="" value="<?= $prod->id?>" disabled>
    <?php endif;?>

        <label for="">Nombre</label>
        <input type="text" name="nombre" id="" value="<?= isset($prod) && is_object($prod) ? $prod->nombre : ''; ?>">

        <label for="">Descripcion</label>
        <textarea name="descripcion" id="" cols="30" rows="10"><?= isset($prod) && is_object($prod) ? $prod->descripcion : ''; ?></textarea>

        <label for="">Precio</label>
        <input type="text" name="precio" id="" value="<?= isset($prod) && is_object($prod) ? $prod->precio : ''; ?>">

        <label for="">Stock</label>
        <input type="number " name="stock" id="" value="<?= isset($prod) && is_object($prod) ? $prod->stock : ''; ?>">

        <label for="">Categoria</label>
        <?php $categoria = Utils::showCategorias() ?>

        <select name="categoria" id="">
            <?php while ($cats = $categoria->fetch_object()) : ?>
                <option value="<?= $cats->id ?>" <?= isset($prod) && is_object($prod) && $cats->id == $prod->id_categoria ? 'selected' : ''; ?>>
                    <?= $cats->nombre ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="">Imagen</label>
        <input type="file" name="imagen" id="">

        <?php if(isset($prod) && is_object($prod) && !empty($prod->imagen)):?>
            <img src="<?=base_url?>uploads/images/<?=$prod->imagen?>" alt="" class="thumb">
        <?php endif;?>

        <input type="submit" value="<?= $submitName;?>">
    </form>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de camisetas</title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css">
</head>

<body>
    <div id="container">
        <!-- CABECERA -->
        <header>
            <div id="logo">
                <img src="<?=base_url?>assets/img/camiseta.png" alt="camiseta logo">
                <a href="index.php">
                    <h1>Tienda de camisetas</h1>
                </a>
            </div>
        </header>
        <!-- MENU -->
        <?php $categorias = Utils::showCategorias();?>s
        <nav id="menu">
            <ul>
            <?php while($cats = $categorias->fetch_object()):?>
                <li>
                    <a href="<?=base_url?>"><?=$cats->nombre;?></a>
                </li>
                <?php endwhile;?>
            </ul>
        </nav>

        <div id="content">
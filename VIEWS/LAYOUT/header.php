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
                <img src="<?=base_url?>assets/img/logoTemp.png" alt="camiseta logo">
                <a href="<?=base_url?>">
                    <h1>STORE MVC</h1>
                </a>
            </div>
        </header>
        <!-- MENU -->
        <?php $categorias = Utils::showCategorias();?>
        <nav id="menu">
            <ul>
            <li>
                <a href="<?=base_url?>">Inicio</a>
            </li>
            <?php while($cats = $categorias->fetch_object()):?>
                <li>
                    <a href="<?=base_url?>categoria/ver&id=<?=$cats->id?>"><?=$cats->nombre;?></a>
                </li>
                <?php endwhile;?>
            </ul>
        </nav>

        <div id="content">
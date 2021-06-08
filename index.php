<?php

require_once 'autoload.php';

if (isset($_GET['controller'])) {
    $nombreControlador = $_GET['controller'] . 'Controller';
} else {
    echo "La pagina que buscas no existe";
    exit();
}

//Comprobando que exista el controlador
if (isset($nombreControlador) && class_exists($nombreControlador)) {

    $controlador = new $nombreControlador();

    //para llamar vistas de forma dinamica
    // (recoger variables por get)

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action(); //de esta forma llama al metodo que tenemos
        //en esa clase
    } else {
        echo "La vista que buscas no existe";
    }
} else {
    echo "El controlador que buscas no existe";
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de camisetas</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div id="container">
        <!-- CABECERA -->
        <header>
            <div id="logo">
                <img src="assets/img/camiseta.png" alt="camiseta logo">
                <a href="index.php">
                    <h1>Tienda de camisetas</h1>
                </a>
            </div>
        </header>
        <!-- MENU -->
        <nav id="menu">
            <ul>
                <li>
                    <a href="#">Inicio</a>
                </li>
                <li>
                    <a href="#">Inicio</a>
                </li>
                <li>
                    <a href="#">Inicio</a>
                </li>
                <li>
                    <a href="#">Inicio</a>
                </li>
                <li>
                    <a href="#">Inicio</a>
                </li>
            </ul>
        </nav>
        <div id="content">
            <!-- BARRA LATERAL -->
            <aside id="lateral">
                <div id="login" class="block_aside">
                    <h3>Entrar a la web</h3>
                    <form action="#" method="post">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="">
                        <input type="submit" value="Enviar  ">
                    </form>
                    <ul>
                        <li><a href="#">Mis pedidos</a></li>
                        <li><a href="#">Gestionar pedidos</a></li>
                        <li><a href="#">Gestionar categoriass</a></li>
                    </ul>
                </div>
            </aside>
            <!-- CONTENIDO CENTRAL  -->
            <div id="central">
                <h1>Productos destacados</h1>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta azul </h2>
                    <p>30 dolares</p>
                    <a href="#" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta azul </h2>
                    <p>30 dolares</p>
                    <a href="#" class="button">Comprar</a>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <footer id="footer">
            <p>Desarrollado por miau &copy; <?= date('Y'); ?></p>
        </footer>
    </div>
</body>

</html>
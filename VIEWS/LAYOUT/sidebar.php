<!-- BARRA LATERAL -->
<aside id="lateral">
    <div id="login" class="block_aside">

        <?php if (!isset($_SESSION['identity'])) : ?>





            <h3>Entrar a la web</h3>
            <form action="<?= base_url ?>usuario/login" method="post">
                <label for="email">Email</label>
                <input type="text" name="email" id="">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="">
                <input type="submit" value="Enviar  ">
            </form>
        <?php else : ?>
            <h3><?= $_SESSION['identity']->nombre; ?> <?= $_SESSION['identity']->apellidos; ?></h3>
        <?php endif; ?>
        <ul>

            <?php if (isset($_SESSION['admin'])) : ?>
                <li><a href="#">Gestionar categorias</a></li>
                <li><a href="#">Gestionar productos</a></li>
                <li><a href="#">Gestionar pedidos</a></li>
            <?php endif; ?>


            <?php if (isset($_SESSION['identity'])) : ?>
                <li><a href="#">Mis pedidos</a></li>
                <li><a href="<?= base_url ?>/usuario/logout">cerrar sesión</a></li>
            <?php endif; ?>

        </ul>


    </div>
</aside>



<!-- CONTENIDO CENTRAL  -->
<div id="central">
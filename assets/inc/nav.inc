<nav class="navbar center navbar-expand-lg">
    <div class=" container-fluid flex-lg-column" style="padding-left: 0px; padding-right: 0px;">
        <div class="navbar-header">
            <div class="navbar-brand"><img srcset="assets/img/<?= isset($logo) ? $logo : "logo.png" ?>" alt="" /></div>
            <div class="navbar-hamburger ml-auto d-lg-none d-xl-none"><button class="hamburger animate" data-toggle="collapse" data-target=".navbar-collapse"><span></span></button></div>
        </div>
        <!-- /.navbar-header -->
        <div class="navbar-collapse collapse w-100 bg-light">
            <ul class="navbar-nav nav-fill w-100">
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="index.php?mod=Seropel&ope=listaTotal">Inicio</a>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="index.php?mod=Seropel&ope=lista&tipo=1">Serie</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <?php
                        foreach ($categoria as $item) {
                            ?>
                            <li class="nav-item dropdown dropdown-submenu"><a class="dropdown-item" href="index.php?mod=Seropel&ope=categoria&tipo=1&idCat=<?= $item->getIdCat(); ?>"><?= $item->getName(); ?></a></li>
                            <?php
                        }
                        if (isset($_SESSION["usuario"])) {
                            if ($_SESSION["usuario"]->type == 0) {
                                ?>
                                <li class="nav-item dropdown"><form class="nav-item"  action="index.php" method="POST" style="margin: 7px;" >
                                        <input name="mod" type="hidden" value="Episodio">
                                        <input name="ope" type="hidden" value="insert">
                                        <input type="search" name="name" class="form-control" >
                                        <!-- /.form-group -->
                                    </form></li>
                            <?php }
                        } ?>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="index.php?mod=Seropel&ope=lista&tipo=2">Pelicula</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        <?php
                        foreach ($categoria as $item) {
                            ?>
                            <li class="nav-item dropdown dropdown-submenu"><a class="dropdown-item" href="index.php?mod=Seropel&ope=categoria&tipo=2&idCat=<?= $item->getIdCat(); ?>"><?= $item->getName(); ?></a></li>
                            <?php
                        }
                        if (isset($_SESSION["usuario"])) {
                            if ($_SESSION["usuario"]->type == 0) {
                                ?>
                                <li class="nav-item dropdown"><form class="nav-item"  action="index.php" method="POST" style="margin: 7px;" >
                                        <input name="mod" type="hidden" value="Episodio">
                                        <input name="ope" type="hidden" value="insert">
                                        <input type="search" name="name" class="form-control" >
                                        <!-- /.form-group -->
                                    </form></li>
    <?php }
} ?>
                    </ul>
                </li>
<?php if (!isset($_SESSION["usuario"])) { ?>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" onclick="modal('login', 0, 0)">Iniciar Sesión</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                            <li class="nav-item dropdown dropdown-submenu"><a class="dropdown-item" href="#" onclick="modal('signin', 0, 0)">Registrarse</a>
                            </li>
                        </ul></li>
                        <?php } else { ?>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="index.php?mod=Usuario&ope=logout">Cerrar Sesión</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                <?php if ($_SESSION["usuario"]->type == 0) { ?>
                                <li class="nav-item dropdown dropdown-submenu"><a class="dropdown-item" href="#" onclick="modal('usuario', 0, 0)">Administrar Usuarios</a>
                                <?php } else { ?>
                                <li class="nav-item dropdown dropdown-submenu"><a class="dropdown-item" href="#" onclick="modal('signin', 0, 0)">Modificar Datos</a>
    <?php } ?>
                            </li>
                        </ul></li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="index.php?mod=Seropel&ope=milista">Mis Listas</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                            <li class="nav-item dropdown dropdown-submenu"><a class="dropdown-item" href="index.php?mod=Seropel&ope=milistaser">Mis Listas de Series</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                                    <li class="nav-item dropdown dropdown-submenu"><a class="dropdown-item" href="index.php?mod=Seropel&ope=milistaser&estado=1">Mis Listas de Series Pendientes</a></li>
                                    <li class="nav-item dropdown dropdown-submenu"><a class="dropdown-item" href="index.php?mod=Seropel&ope=milistaser&estado=2">Mis Listas de Series Siguiendo</a></li>
                                    <li class="nav-item dropdown dropdown-submenu"><a class="dropdown-item" href="index.php?mod=Seropel&ope=milistaser&estado=3">Mis Listas de Series Vistas</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown dropdown-submenu"><a class="dropdown-item" href="index.php?mod=Seropel&ope=milistapel">Mis Listas de Peliculas</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                    <li class="nav-item dropdown dropdown-submenu"><a class="dropdown-item" href="index.php?mod=Seropel&ope=milistapel&estado=1">Mis Listas de Peliculas Pendientes</a></li>
                                    <li class="nav-item dropdown dropdown-submenu"><a class="dropdown-item" href="index.php?mod=Seropel&ope=milistapel&estado=3">Mis Listas de Peliculas Vistas</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
<?php } ?>
                <li class="nav-item dropdown"><form class="search-form nav-item"  action="index.php" method="GET" style="margin: 7px;" >
                        <input name="mod" type="hidden" value="Seropel">
                        <input name="ope" type="hidden" value="buscar">
                        <input type="search" name="buscar" class="form-control" >
                        <!-- /.form-group -->
                    </form></li>
            </ul>        
        </div>
    </div>
</nav>
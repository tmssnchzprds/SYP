  <nav class="navbar center navbar-expand-lg">
      <div class="container flex-lg-column">
        <div class="navbar-header">
            <div class="navbar-brand"><img srcset="assets/img/<?=isset($logo)?$logo:"logo.png"?>" alt="" /></div>
          <div class="navbar-hamburger ml-auto d-lg-none d-xl-none"><button class="hamburger animate" data-toggle="collapse" data-target=".navbar-collapse"><span></span></button></div>
        </div>
        <!-- /.navbar-header -->
        <div class="navbar-collapse collapse w-100 bg-light">
          <ul class="navbar-nav nav-fill w-100">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="index.php?mod=Seropel&ope=listaTotal">Inicio</a>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="index.php?mod=Seropel&ope=lista&tipo=1">Serie</a>
            <ul class="dropdown-menu">
               <?php
                   foreach($categoria as $item){
                   ?>
                <li class="nav-item dropdown"><a class="dropdown-item" href="index.php?mod=Seropel&ope=categoria&tipo=1&idCat=<?=$item->getIdCat();?>"><?=$item->getName();?></a></li>
                   <?php
                   }
                   ?>
            </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="index.php?mod=Seropel&ope=lista&tipo=2">Pelicula</a>
                <ul class="dropdown-menu">
                                   <?php
                   foreach($categoria as $item){
                   ?>
                <li class="nav-item dropdown"><a class="dropdown-item" href="index.php?mod=Seropel&ope=categoria&tipo=2&idCat=<?=$item->getIdCat();?>"><?=$item->getName();?></a></li>
                   <?php
                   }
                   ?> 
                </ul>
            </li>
           <?php if (!isset($_SESSION["usuario"])) { ?>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="modal"  href="#login">Iniciar Sesión</a>
            <ul class="dropdown-menu">
                    <li class="nav-item dropdown"><a class="dropdown-item"  data-toggle="modal" href="#signin">Registrarse</a>
            </li>
            </ul></li>
            <?php } else { ?>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="index.php?mod=Usuario&ope=logout">Cerrar Sesión</a>
            <ul class="dropdown-menu">
                    <li class="nav-item dropdown"><a class="dropdown-item"  data-toggle="modal" href="#signin">Modificar Datos</a>
            </li>
            </ul></li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="index.php?mod=Seropel&ope=milista">Mis Listas</a>
              <ul class="dropdown-menu">
                <li class="nav-item dropdown"><a class="dropdown-item" href="index.php?mod=Seropel&ope=milistaser">Mis Listas de Series</a>
                <ul class="dropdown-menu">
                <li class="nav-item dropdown"><a class="dropdown-item" href="index.php?mod=Seropel&ope=milistaser&estado=1">Mis Listas de Series Pendientes</a></li>
                <li class="nav-item dropdown"><a class="dropdown-item" href="index.php?mod=Seropel&ope=milistaser&estado=2">Mis Listas de Series Siguiendo</a></li>
                <li class="nav-item dropdown"><a class="dropdown-item" href="index.php?mod=Seropel&ope=milistaser&estado=3">Mis Listas de Series Vistas</a></li>
              </ul>
                </li>
                <li class="nav-item dropdown"><a class="dropdown-item" href="index.php?mod=Seropel&ope=milistapel">Mis Listas de Peliculas</a>
              <ul class="dropdown-menu">
                <li class="nav-item dropdown"><a class="dropdown-item" href="index.php?mod=Seropel&ope=milistapel&estado=1">Mis Listas de Peliculas Pendientes</a></li>
                <li class="nav-item dropdown"><a class="dropdown-item" href="index.php?mod=Seropel&ope=milistapel&estado=3">Mis Listas de Peliculas Vistas</a></li>
              </ul>
                </li>
              </ul>
            </li>
            <?php } ?>
            <li class="nav-item dropdown"><form class="search-form nav-item"  action="index.php" method="GET" style="margin: 7px;" >
                    <input id="mod" name="mod" type="hidden" value="Seropel">
                    <input id="ope" name="ope" type="hidden" value="buscar">
                    <input type="search" id="buscar" name="buscar" class="form-control" >
                <!-- /.form-group -->
              </form></li>
          </ul>        
        </div>
      </div>
    </nav>
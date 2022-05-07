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
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle">Mis Listas</a>
              <ul class="dropdown-menu">
                <li class="nav-item dropdown"><a class="dropdown-item" href="index.php?mod=user&ope=showserie&idUsu=<?php echo $_SESSION['idUsu'];?>">Mi Lista de Serie</a></li>
                <li class="nav-item dropdown"><a class="dropdown-item" href="index.php?mod=user&ope=showpelicula&idUsu=<?php echo $_SESSION['idUsu'];?>">Mi Lista de Pelicula</a></li>
              </ul>
            </li>
            <?php } ?>
            <li class="nav-item dropdown"><form class="search-form nav-item" style="margin: 7px;" >
                  <input type="search" class="form-control" >
                <!-- /.form-group -->
              </form></li>
          </ul>        
        </div>
      </div>
    </nav>
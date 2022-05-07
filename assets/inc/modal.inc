
<!-- Modal -->
<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"  style=" width:90%;" id="myModalLabel">Iniciar Sesión</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form class="comment-form" id="login-form" action="index.php" method="POST" role="form" style="display: block;">
                    <input id="mod" name="mod" type="hidden" value="Usuario">
                    <input id="ope" name="ope" type="hidden" value="signin">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" id="email" required placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" required placeholder="Contraseña">
                    </div>
                    <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary submitBtn">Iniciar Sesión</button>
            </div>
                </form>
            </div>


        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="signin" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"  style=" width:90%;" id="myModalLabel">Registrarse</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
            <form class="comment-form" id="login-form" action="index.php" method="POST" role="form" style="display: block;">
                <input id="mod" name="mod" type="hidden" value="Usuario">
                <input id="ope" name="ope" type="hidden" value="create">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name" required placeholder="Nombre">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" id="email" required placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" required placeholder="Contraseña">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerar</button>
                <button type="submit" class="btn btn-primary submitBtn">Registrarse</button>
            </div>
            </form>
            </div>

            <!-- Modal Footer -->

        </div>
    </div>
</div>
<?php
if (!isset($detalle)){
    $detalle="";
}
?>

<!-- Modal -->
<div class="modal fade" id="modificar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"  style=" width:90%;" id="myModalLabel"><?=$detalle==""?"Añadir":"Modificar"?></h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
<form class="comment-form" id="login-form" action="index.php" method="GET" role="form" style="display: block;">
              <input id="mod" name="mod" type="hidden" value="Seropel">
              <input id="ope" name="ope" type="hidden" value="<?=$detalle==""?"insert":"update"?>">
              <?php if ($detalle!=""){ ?>
              <input id="idSeropel" name="idSeropel" type="hidden" value="<?=$detalle->getIdSeropel();?>">
              <?php } ?>
                <div class="form-group">
                    <label for="title" style="width: 24%">Título:</label>
                    <input type="text" class="form-control" style="width: 75%" name="title" id="title" required placeholder="Nombre de la Serie o Pelicula" value="<?=$detalle==""?"":$detalle->getTitle();?>">
                </div>
                <div class="form-group">
                    <label for="tipo" style="width: 24%">Tipo:</label>
                  <select id="tipo" name="tipo" style="width: 75%">
                    <option value="1">Serie</option>
                    <option value="2">Película</option>
                </select>
                </div>
               <div class="form-group">
                  <label for="idCat" style="width: 24%">Categoría:</label>
                  <select id="idCat" name="idCat" style="width: 75%">
                   <?php
                   foreach($categoria as $item){
                   ?>
                      <option value="<?=$item->getIdCat();?>" <?=$item->getIdCat()==($detalle==""?0:$detalle->getIdCat())?"selected":"";?>><?=$item->getName();?></option>
                    <?php
                   }
                   ?>
                </select>
                </div>
                <div class="form-group">
                    <label for="description" style="width: 24%">Descripción:</label>
                <textarea name="description" class="form-control" style="width: 75%" id="description" rows="5" required placeholder="Escribe aquí la descripción ..."><?=$detalle==""?"":$detalle->getDescription();?></textarea>
                </div>
                <div class="form-group">
                    <label for="url" style="width: 24%">URL de la Caratula:</label>
                    <input type="url" class="form-control" name="cover" style="width: 75%" id="cover" required placeholder="http://www.webcaratula.com/ruta/imagencaratula.jpg" value="<?=$detalle==""?"":$detalle->getCover();?>">
                </div>
              <div class="form-group">
                  <label for="date" style="width: 24%">Fecha:</label>
                    <input type="date" class="form-control" style="width: 75%" name="date" id="date" required placeholder="<?=date('d/m/Y')?>" value="<?=$detalle==""?date('d/m/Y'):$detalle->getDate();?>">
                </div>
              <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary submitBtn"><?=$detalle==""?"Añadir":"Modificar"?></button>
            </div>
            </form>
            </div>


        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="eliminar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"  style=" width:90%;" id="myModalLabel">Eliminar</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form class="comment-form" id="login-form" action="index.php" method="POST" role="form" style="display: block;">
                    <input id="mod" name="mod" type="hidden" value="Seropel">
                    <input id="ope" name="ope" type="hidden" value="delete">
                     <input id="idSeropel" name="idSeropel" type="hidden" value="<?=$detalle==""?"":$detalle->getIdSeropel();?>">
                    <p> Esta operación no se puede desacer, ¿Está Seguro?</p>
                    <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary submitBtn">Eliminar</button>
            </div>
                </form>
            </div>


        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"  style=" width:90%;" id="myModalLabel">Iniciar Sesión</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span class="fa fa-2x fa-close" style="padding: 0px; color: red;" aria-hidden="true"></span>
                    <span class="sr-only">Cerrar</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form class="comment-form needs-validation" novalidate id="login-form" action="index.php" method="POST" role="form" style="display: block;">
                    <input id="mod" name="mod" type="hidden" value="Usuario">
                    <input id="ope" name="ope" type="hidden" value="signin">
                        <div class="form-group">
                            <label for="email"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Correo Electronico:</label>
                            <input type="email" class="form-control" name="email" id="login-email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required placeholder="Email">
                        <div class="valid-feedback">
                        <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                        </div>
                        <div class="invalid-feedback">
                        <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i>El email debe estar bien formado
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Contraseña:</label>
                        <input type="password" name="password" id="login-password" class="form-control" required placeholder="Contraseña">
                        <div class="valid-feedback">
                        <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                        </div>
                        <div class="invalid-feedback">
                        <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i>La contraseña es obligatoria
                        </div>
                    </div>
                    <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-orange btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-orange btn-primary submitBtn">Iniciar Sesión</button>
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
                    <span class="fa fa-2x fa-close" style="padding: 0px; color: red;" aria-hidden="true"></span>
                    <span class="sr-only">Cerrar</span>
                </button>
                
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
            <form class="comment-form needs-validation" novalidate id="signin-form" action="index.php" method="POST" role="form" style="display: block;">
                <input id="mod" name="mod" type="hidden" value="Usuario">
                <input id="ope" name="ope" type="hidden" value="<?=!isset($_SESSION["usuario"])?"insert":"update"?>">
                <?php if (isset($_SESSION["usuario"])){ ?>
              <input id="idUsu" name="idUsu" type="hidden" value="<?=$_SESSION["usuario"]->idUsu;?>">
              <?php } ?>
                <input id="type" name="type" type="hidden"  value="<?=!isset($_SESSION["usuario"])?"1":$_SESSION["usuario"]->type?>">
                <div class="form-group">
                    <label for="name"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Nombre:</label>
                    <input type="text" class="form-control" name="name" id="name" required value="<?=!isset($_SESSION["usuario"])?"":$_SESSION["usuario"]->name?>" placeholder="Nombre">
                    <div class="valid-feedback">
                        <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                        </div>
                        <div class="invalid-feedback">
                        <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i>El nombre es obligatorio
                        </div>
                </div>
                <div class="form-group">
                    <label for="email"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Correo Electronico:</label>
                    <input type="email" class="form-control" name="email" id="email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required value="<?=!isset($_SESSION["usuario"])?"":$_SESSION["usuario"]->email?>" placeholder="Email">
                    <div class="valid-feedback">
                        <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                        </div>
                        <div class="invalid-feedback">
                        <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i>El email debe estar bien formado
                        </div>
                </div>
                <div class="form-group">
                    <label for="password"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Contraseña:</label>
                    <input type="password" name="password" id="password" class="form-control" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$" required placeholder="Contraseña">
                    <div class="valid-feedback">
                        <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                        </div>
                        <div class="invalid-feedback">
                        <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i>La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula
                        </div>
                </div>
                 <div class="form-group">
                    <label for="confirm"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Confirmar contraseña:</label>
                    <input type="password" name="confirm" id="confirm" class="form-control pwds" required placeholder="Contraseña">
                    <div id="confirmValid" class="valid-feedback">
                        <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                        </div>
                        <div id="confirmInvalid" class="invalid-feedback">
                        <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i>
                        </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="submitBtn" class="btn btn-primary submitBtn" disabled><?=!isset($_SESSION["usuario"])?"Registrarse":"Modificar Datos"?></button>
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
<div class="modal fade" id="modificarseropel" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"  style=" width:90%;" id="myModalLabel"><?=$detalle==""?"Añadir":"Modificar"?> Serie</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span class="fa fa-2x fa-close" style="padding: 0px; color: red;" aria-hidden="true"></span>
                    <span class="sr-only">Cerrar</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
<form class="comment-form needs-validation" novalidate id="seropel-form" action="index.php" method="POST" role="form" style="display: block;">
              <input id="mod" name="mod" type="hidden" value="Seropel">
              <input id="ope" name="ope" type="hidden" value="<?=$detalle==""?"insert":"update"?>">
              <?php if ($detalle!=""){ ?>
              <input id="idSeropel" name="idSeropel" type="hidden" value="<?=$detalle->getIdSeropel();?>">
              <?php } ?>
                <div class="form-group">
                    <label for="title" style="width: 24%"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Título:</label>
                    <input type="text" class="form-control" style="width: 75%" name="title" id="title" required placeholder="Nombre de la Serie o Pelicula" value="<?=$detalle==""?"":$detalle->getTitle();?>">
                    <div class="valid-feedback">
                        <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                        </div>
                        <div class="invalid-feedback">
                        <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i> El título es obligatorio
                        </div>
                </div>
                <div class="form-group">
                    <label for="tipo" style="width: 24%"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Tipo:</label>
                  <select id="tipo" name="tipo" style="width: 75%">
                    <option value="1" <?=$detalle->getType()==1?"selected":"";?>>Serie</option>
                    <option value="2" <?=$detalle->getType()==2?"selected":"";?>>Película</option>
                </select>
                    <div class="valid-feedback">
                        <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                        </div>
                        <div class="invalid-feedback">
                        <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i> Debe elegir un tipo
                        </div>
                </div>
               <div class="form-group">
                  <label for="idCat" style="width: 24%"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Categoría:</label>
                  <select id="idCat" name="idCat" style="width: 75%">
                   <?php
                   foreach($categoria as $item){
                   ?>
                      <option value="<?=$item->getIdCat();?>" <?=$item->getIdCat()==($detalle==""?0:$detalle->getIdCat())?"selected":"";?>><?=$item->getName();?></option>
                    <?php
                   }
                   ?>
                </select>
                  <div class="valid-feedback">
                        <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                        </div>
                        <div class="invalid-feedback">
                        <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i> Debe elegir una categoria
                        </div>
                </div>
                <div class="form-group">
                    <label for="description" style="width: 24%"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Descripción:</label>
                <textarea name="description" class="form-control" style="width: 75%" id="description" rows="5" required placeholder="Escribe aquí la descripción ..."><?=$detalle==""?"":$detalle->getDescription();?></textarea>
                <div class="valid-feedback">
                        <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                        </div>
                        <div class="invalid-feedback">
                        <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i>La descripción es obligatoria
                        </div>
                </div>
                <div class="form-group">
                    <label for="url" style="width: 24%"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>URL de la Caratula:</label>
                    <input type="url" class="form-control" name="cover" style="width: 75%" id="cover" pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})" required placeholder="http://www.webcaratula.com/ruta/imagencaratula.jpg" value="<?=$detalle==""?"":$detalle->getCover();?>">
                    <div class="valid-feedback">
                        <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                        </div>
                        <div class="invalid-feedback">
                        <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i> Debe introducir una URL válida
                        </div>
                </div>
              <div class="form-group">
                  <label for="date" style="width: 24%"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Fecha:</label>
                    <input type="date" class="form-control" style="width: 75%" name="date" id="date" required placeholder="<?=date('d/m/Y')?>" value="<?=$detalle==""?date('d/m/Y'):$detalle->getDate();?>">
                    <div class="valid-feedback">
                        <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                        </div>
                        <div class="invalid-feedback">
                        <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i> Debe introducir una fecha válida
                        </div>
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
<?php
if (!isset($comentario)){
    $comentario="";
}
?>
<div class="modal fade" id="modificarcom" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"  style=" width:90%;" id="myModalLabel"><?=$comentario==""?"Añadir":"Modificar"?> Comentario</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span class="fa fa-2x fa-close" style="padding: 0px; color: red;" aria-hidden="true"></span>
                    <span class="sr-only">Cerrar</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form class="comment-form needs-validation" novalidate id="commentaryform" name="commentaryform" action="index.php" method="POST" role="form" style="display: block;">
                    <input id="mod" name="mod" type="hidden" value="Comentario">
                    <input id="ope" name="ope" type="hidden" value="<?=$comentario==""?"insert":"update"?>">
                    <?php if ($comentario!=""){ ?>
                    <input id="idCom" name="idCom" type="hidden" value="<?=$comentario->getIdCom();?>">
                    <?php } ?>
                    <?php if (isset($_SESSION["usuario"])){ ?>
                    <input id="idUsu" name="idUsu" type="hidden" value="<?=$comentario==""?$_SESSION["usuario"]->idUsu:$comentario->getIdUsu();?>">
                    <?php } ?>
                    <?php if ($detalle!=""){ ?>
                    <input id="idSeropel" name="idSeropel" type="hidden" value="<?=$comentario==""?$detalle->getIdSeropel():$comentario->getIdSeropel();?>">
                    <?php }?>
                    <div class="form-group">
                  <label for="season" style="width: 24%"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Temporada:</label>
                  <select id='season' name='season' onchange='episodechange(<?php echo $comentario==""?0:$comentario->getEpisode();?>,<?php echo json_encode($episodes);?>)' required style='width: 75%'>
                        <option value="0" <?=$comentario==""?"selected":"";?>>Todas las temporadas</option>
                   <?php
                   if ($episodio!=""){
                   foreach($episodio as $item){
                   $seas=$comentario==""?0:$comentario->getSeason()
                   ?>
                        <option value="<?=$item->getSeason();?>" <?=$seas==$item->getSeason()?"selected":"";?>>Temporada <?=$item->getSeason();?></option>
                    <?php
                   } }
                   ?>
                  </select>
                  <div class="valid-feedback">
                        <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                        </div>
                        <div class="invalid-feedback">
                        <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i>Debe elegir una Temporada
                        </div>
                    </div>
                    <div class="form-group">
                  <label for="episode" style="width: 24%"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Capítulo:</label>
                  <select id="episode" name="episode" required style="width: 75%">
                      <option value="0" <?=$comentario==""?"selected":"";?>>Todos los episodios</option>
                </select>
                  <div class="valid-feedback">
                        <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                        </div>
                        <div class="invalid-feedback">
                        <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i>Debe elegir un Capítulo
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" style="width: 24%"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Comentario:</label>
                        <textarea name="commentary" class="form-control" style="width: 75%" id="commentary" rows="5" required placeholder="Escribe aquí el comentario ..."><?=$comentario==""?"":$comentario->getCommentary();?></textarea>
                        <div class="valid-feedback">
                        <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                        </div>
                        <div class="invalid-feedback">
                        <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i> El comentario es requerido
                        </div>
                    </div>
                    <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary submitBtn"><?=$comentario==""?"Añadir":"Modificar"?></button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="eliminarseropel" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"  style=" width:90%;" id="myModalLabel">Eliminar</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span class="fa fa-2x fa-close" style="padding: 0px; color: red;" aria-hidden="true"></span>
                    <span class="sr-only">Cerrar</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form class="comment-form" id="eliminar-form" action="index.php" method="POST" role="form" style="display: block;">
                    <input id="mod" name="mod" type="hidden" value="Seropel">
                    <input id="ope" name="ope" type="hidden" value="delete">
                    <?php if ($detalle!="") { ?>
                     <input id="idSeropel" name="idSeropel" type="hidden" value="<?=$detalle->getIdSeropel();?>">
                    <?php } ?>
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
<!-- Modal -->
<div class="modal fade" id="eliminarcom" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"  style=" width:90%;" id="myModalLabel">Eliminar</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span class="fa fa-2x fa-close" style="padding: 0px; color: red;" aria-hidden="true"></span>
                    <span class="sr-only">Cerrar</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form class="comment-form" id="eliminar-form" action="index.php" method="POST" role="form" style="display: block;">
                    <input id="mod" name="mod" type="hidden" value="Comentario">
                    <input id="ope" name="ope" type="hidden" value="delete">
                  <?php if ($detalle!="") { ?>
                     <input id="idCom" name="idCom" type="hidden" value="<?=$idCom;?>">
                  <?php } ?>
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
<?php
$temporada=1;
$episodes=[];
foreach($episodio as $item){
   $episodes[$temporada]=$item->getEpisode();
   $temporada++;
}
?>
<div id="cargarmodal">
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
                <form class="comment-form needs-validation" novalidate id="form" name="form" action="index.php" method="POST" role="form" style="display: block;">
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
                   foreach($episodio as $item){
                   $seas=$comentario==""?(isset($_GET["season"])?$_GET["season"]:0):$comentario->getSeason()
                   ?>
                        <option value="<?=$item->getSeason();?>" <?=$seas==$item->getSeason()?"selected":"";?>>Temporada <?=$item->getSeason();?></option>
                    <?php
                   }
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
</div>

<div id="cargarmodal">
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
                <form class="comment-form" id="form" action="index.php" method="POST" role="form" style="display: block;">
                    <input id="mod" name="mod" type="hidden" value="Comentario">
                    <input id="ope" name="ope" type="hidden" value="delete">
                  <?php if ($idCom!="") { ?>
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
</div>

<div id="cargarmodal">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"  style=" width:90%;" id="myModalLabel">Usuarios</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span class="fa fa-2x fa-close" style="padding: 0px; color: red;" aria-hidden="true"></span>
                        <span class="sr-only">Cerrar</span>
                    </button>

                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form class="comment-form needs-validation" novalidate id="form" action="index.php" method="POST" role="form">
                        <input name="mod" type="hidden" value="Usuario">
                        <input name="ope" type="hidden" value="updatetype">

                        <table style="width: 100%" class="statusMsg">
                            <tbody>
                                <?php
                                foreach ($usuario as $item) {
                                    ?>
                                    <tr>
                                        <td style="width:50%">
                                            <h5><?= $item->getName() ?></h5>
                                        </td>
                                        <td colspan="3" style="width:50%"></td>
                                    <tr>
                                    </tr>
                                <td style="width:50%">
                                    <h5><?= $item->getEmail() ?></h5>
                                </td>
                                <td style="width:40%">
                                    <input name="idUsu[]" type="hidden" value="<?= $item->getIdUsu() ?>">
                                    <?php if ($item->getType() == 0) { ?>
                                        <input name="type[]" type="hidden" value="<?= $item->getType() ?>">                                  
                                    <?php } ?>
                                    <select name="type[]" <?= $item->getType() == 0 ? "disabled" : "" ?> class="selectpicker" data-style="btn-warning">
                                        <option value="1" <?= $item->getType() == 1 ? "selected" : "" ?>>Usuario</option>
                                        <option value="2" <?= $item->getType() == 2 ? "selected" : "" ?>>Editor</option>
                                        <option value="3" <?= $item->getType() == 3 ? "selected" : "" ?>>Moderador</option>
                                        <option value="0" <?= $item->getType() == 0 ? "selected" : "" ?>>Administrador</option>
                                    </select>
                                </td>
                                <td style="width:5%">
                                    <i class="fa fa-2x fa-edit" style="padding: 0px; color: orange;" onclick="$('#myModal').modal('hide'); modal('signin', 0,<?= $item->getIdUsu() ?>)"></i>
                                </td>
                                <td style="width:5%">
                                    <i class="fa fa-2x fa-trash" style="padding: 0px; color: orange;" onclick="$('#myModal').modal('hide'); modal('eliminarusuario', 0,<?= $item->getIdUsu() ?>)"></i>

                                </td>
                                </tr>
                                <tr>
                                    <td colspan="3">

                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="submitBtn" class="btn btn-primary submitBtn">Modificar Usuarios</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Footer -->
            </div>
        </div>
    </div>
</div>
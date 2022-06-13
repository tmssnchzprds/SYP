<div id="cargarmodal">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"  style=" width:90%;" id="myModalLabel"><?= $detalle == "" ? "Añadir" : "Modificar" ?> Serie o Pelicula</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span class="fa fa-2x fa-close" style="padding: 0px; color: red;" aria-hidden="true"></span>
                        <span class="sr-only">Cerrar</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <p class="statusMsg"></p>
                    <form class="comment-form needs-validation" novalidate id="form" action="index.php" method="POST" role="form" style="display: block;">
                        <input id="mod" name="mod" type="hidden" value="Seropel">
                        <input id="ope" name="ope" type="hidden" value="<?= $detalle == "" ? "insert" : "update" ?>">
                        <?php if ($detalle != "") { ?>
                            <input id="idSeropel" name="idSeropel" type="hidden" value="<?= $detalle->getIdSeropel(); ?>">
                        <?php } ?>
                        <div class="form-group">
                            <label for="title" style="width: 24%"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Título:</label>
                            <input type="text" class="form-control" style="width: 75%" name="title" id="title" required placeholder="Nombre de la Serie o Pelicula" value="<?= $detalle == "" ? "" : $detalle->getTitle(); ?>">
                            <div class="valid-feedback">
                                <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                            </div>
                            <div class="invalid-feedback">
                                <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i> El título es obligatorio
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tipo" style="width: 24%"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Tipo:</label>
                            <select id="tipo" name="tipo"  class="selectpicker" style="width: 75%">
                                <option value="1" <?= $detalle == "" ? "" : ($detalle->getTipo() == 1 ? "selected" : ""); ?>>Serie</option>
                                <option value="2" <?= $detalle == "" ? "" : ($detalle->getTipo() == 2 ? "selected" : ""); ?>>Película</option>
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
                            <select id="idCat" name="idCat"  class="selectpicker" style="width: 75%">
                                <?php
                                foreach ($categoria as $item) {
                                    ?>
                                    <option value="<?= $item->getIdCat(); ?>" <?= $item->getIdCat() == ($detalle == "" ? 0 : $detalle->getIdCat()) ? "selected" : ""; ?>><?= $item->getName(); ?></option>
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
                            <textarea name="description" class="form-control" style="width: 75%" id="description" rows="5" required placeholder="Escribe aquí la descripción ..."><?= $detalle == "" ? "" : $detalle->getDescription(); ?></textarea>
                            <div class="valid-feedback">
                                <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                            </div>
                            <div class="invalid-feedback">
                                <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i>La descripción es obligatoria
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="url" style="width: 24%"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>URL de la Caratula:</label>
                            <input type="url" class="form-control" name="cover" style="width: 75%" id="cover" pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})" required placeholder="http://www.webcaratula.com/ruta/imagencaratula.jpg" value="<?= $detalle == "" ? "" : $detalle->getCover(); ?>">
                            <div class="valid-feedback">
                                <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                            </div>
                            <div class="invalid-feedback">
                                <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i> Debe introducir una URL válida
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date" style="width: 24%"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Fecha:</label>
                            <input type="date" class="form-control" style="width: 75%" name="date" id="date" required placeholder="<?= date('d/m/Y') ?>" value="<?= $detalle == "" ? date('d/m/Y') : $detalle->getDate(); ?>">
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
                            <button type="submit" class="btn btn-primary submitBtn"><?= $detalle == "" ? "Añadir" : "Modificar" ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

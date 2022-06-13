<div id="cargarmodal">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"  style=" width:90%;" id="myModalLabel"><?= !isset($usuario) ? "Registrarse" : "Modificar Cuenta" ?></h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span class="fa fa-2x fa-close" style="padding: 0px; color: red;" aria-hidden="true"></span>
                        <span class="sr-only">Cerrar</span>
                    </button>

                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <p class="statusMsg"></p>
                    <form class="comment-form needs-validation" novalidate id="form" action="index.php" method="POST" role="form" style="display: block;">
                        <input id="mod" name="mod" type="hidden" value="Usuario">
                        <input id="ope" name="ope" type="hidden" value="<?= !isset($usuario) ? "insert" : "update" ?>">
                        <?php
                        if (isset($_SESSION["usuario"])) {
                            if ($_SESSION["usuario"]->type == 0) {
                                $idUsu = $usuario->getIdUsu();
                                $type = $usuario->getType();
                                $name = $usuario->getName();
                                $email = $usuario->getEmail();
                            } else {
                                $idUsu = $usuario->idUsu;
                                $type = $usuario->type;
                                $name = $usuario->name;
                                $email = $usuario->email;
                            }
                        } else {
                            $idUsu = "";
                            $type = 1;
                            $name = "";
                            $email = "";
                        }
                        ?>
                        <?php if (isset($usuario)) { ?>
                            <input id="idUsu" name="idUsu" type="hidden" value="<?= $idUsu ?>">
<?php } ?>
                        <input id="type" name="type" type="hidden"  value="<?= $type ?>">
                        <div class="form-group">
                            <label for="name"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Nombre:</label>
                            <input type="text" class="form-control" name="name" id="name" required value="<?= $name ?>" placeholder="Nombre">
                            <div class="valid-feedback">
                                <i class="fa fa-2x fa-check" style="padding: 0px; color: green;"></i>
                            </div>
                            <div class="invalid-feedback">
                                <i class="fa fa-2x fa-close" style="padding: 0px; color: red;"></i>El nombre es obligatorio
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="fa fa-asterisk" style="padding: 0px; color: red;"></i>Correo Electronico:</label>
                            <input type="email" class="form-control" name="email" id="email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required value="<?= $email ?>" placeholder="Email">
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
                            <button type="submit" id="submitBtn" class="btn btn-primary submitBtn" disabled><?= !isset($usuario) ? "Registrarse" : "Modificar Datos" ?></button>
                        </div>
                    </form>
                </div>
                <!-- Modal Footer -->
            </div>
        </div>
    </div>
</div>
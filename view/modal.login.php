<div id="cargarmodal">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
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
                    <form class="comment-form needs-validation" novalidate id="form" action="index.php" method="POST" role="form" style="display: block;">
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
</div>

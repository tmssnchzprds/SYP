<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
        /**
         * Carga los datos meta
         */
        require_once "assets/inc/meta.inc";
        ?>
        <meta name="description" content="Tienda Virtual de Informatica">
        <title>Lista de Series y/o Peliculas</title>
        <?php
        /**
         * Carga los estilos
         */
        require_once "assets/inc/stylesheet.inc";
        ?>
    </head>
    <body>
        <div class="content-wrapper">
            <!-- serie -->  
            <?php
            /**
             * Carga el menú
             */
            require_once "assets/inc/nav.inc";
            ?>
            <div class="wrapper light-wrapper">
                <div class="container inner pt-60">
                    <div id="ajaxseropel">
                        <?php
                        /**
                         * Carga las listas
                         */
                        require_once "view/ajax.seropel.php";
                        ?>
                    </div>
                    <div id="ajaxmodal">
                        <?php
                        /**
                         * Carga el modal del login
                         */
                        require_once "view/modal.login.php";
                        ?>
                    </div>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.wrapper -->
            <?php
            /**
             * Carga el pie de página
             */
            require_once "assets/inc/footer.inc";
            ?>
        </div>
        <!-- /.content-wrapper -->

        <?php
        /**
         * Carga los archivos de codigo javascript
         */
        require_once "assets/inc/script.inc";
        ?>
        <script type="text/javascript">
<?php if (isset($success) && isset($msg)) { ?>
                showMessage(<?php echo $success; ?>, '<?php echo $msg; ?>');
    <?php
}
?>
        </script>
    </body>
</html>
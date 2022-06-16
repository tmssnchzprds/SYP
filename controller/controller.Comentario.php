<?php

/**
 * Interfaz de los controladores, Beans, y control de la Sesion
 */
require_once "assets/inc/controller.init.inc";

/**
 * Controla las operaciones relaccionadas con la clase Comentario
 */
class controllerComentario implements controllerGenerico {

    private $sesion;

    /**
     * Constructor crea una nueva sesion
     */
    public function __construct() {
        $this->sesion = new Sesion();
    }

    //CRUD
    /**
     * Controla la obtencion de todos los registros de la tabla comentario
     */
    public static function getAll() {
        $comentario = Comentario::getAll();
        require_once "view/show.Comentario.php";
    }

    /**
     * Controla la obtencion del registro de la tabla comentario que tiene el id que llega en una variable
     */
    public static function getId() {
        if (isset($_GET["idCom"])) {
            $comentario = Comentario::getId($_GET["idCom"]);
            return $comentario;
        } else {
            $success = 1;
            $msg = "No se ha podido obtener el registro se ha producido un error";
        }
    }

    /**
     * Controla la insercion de un Registro en la tabla comentario
     */
    public function insert() {
        if (isset($_POST["idUsu"]) && ($_POST["idSeropel"]) && ($_POST["commentary"])) {
            $comentario = new Comentario();
            $comentario->setIdUsu($_POST["idUsu"]);
            $comentario->setIdSeropel($_POST["idSeropel"]);
            $comentario->setCommentary($_POST["commentary"]);
            $comentario->setSeason(isset($_POST["season"]) ? $_POST["season"] : 0);
            $comentario->setEpisode(isset($_POST["episode"]) ? $_POST["episode"] : 0);
            $comentario->insert();
            $success = 0;
            $msg = "Se ha creado el comentario correctamente";
            /**
             * Controla la obtencion de datos asociados a una serie o pelicula por su identificador, pasado en una variable
             */
            require_once "assets/inc/controller.detalle.inc";
        } else {
            $success = 1;
            $msg = "No se ha podido crear el comentario se ha producido un error";
            /**
             * Controla las listas de Inicio
             */
            require_once "assets/inc/controller.listatotal.inc";
        }
    }

    /**
     * Controla la actualizacion de un Registro en la tabla comentario
     */
    public function update() {
        if (isset($_POST["idCom"])) {
            $comentario = Comentario::getId($_POST["idCom"]);
            if (isset($_POST["idUsu"]) && ($_POST["idSeropel"]) && ($_POST["commentary"])) {
                $comentario->setIdUsu($_POST["idUsu"]);
                $comentario->setIdSeropel($_POST["idSeropel"]);
                $comentario->setCommentary($_POST["commentary"]);
                $comentario->setSeason(isset($_POST["season"]) ? $_POST["season"] : 0);
                $comentario->setEpisode(isset($_POST["episode"]) ? $_POST["episode"] : 0);
                $comentario->update();
                $success = 0;
                $msg = "Se ha actualizado el comentario correctamente";
                /**
                 * Controla la obtencion de datos asociados a una serie o pelicula por su identificador, pasado en una variable
                 */
                require_once "assets/inc/controller.detalle.inc";
            } else {
                $success = 1;
                $msg = "No se ha podido actualizar el comentario se ha producido un error";
                /**
                 * Controla las listas de Inicio
                 */
                require_once "assets/inc/controller.listatotal.inc";
            }
        } else {
            $success = 1;
            $msg = "No se ha podido actualizar el comentario se ha producido un error";
            /**
             * Controla las listas de Inicio
             */
            require_once "assets/inc/controller.listatotal.inc";
        }
    }

    /**
     * Controla la eliminacion del registro de la tabla comentario que tiene el id que llega en una variable
     */
    public function delete() {
        if (isset($_POST["idCom"])) {
            Comentario::delete($_POST["idCom"]);
            $success = 0;
            $msg = "Se ha eliminado el comentario correctamente";
        } else {
            $success = 1;
            $msg = "No se ha podido eliminar el comentario se ha producido un error";
        }
        /**
         * Controla las listas de Inicio
         */
        require_once "assets/inc/controller.listatotal.inc";
    }

}

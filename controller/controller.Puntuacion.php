<?php

/**
 * Interfaz de los controladores, Beans, y control de la Sesion
 */
require_once "assets/inc/controller.init.inc";

/**
 * Controla las operaciones relaccionadas con la clase Puntuacion
 */
class controllerPuntuacion implements controllerGenerico {

    private $sesion;

    /**
     * Constructor crea una nueva sesion
     */
    public function __construct() {
        $this->sesion = new Sesion();
    }

    //CRUD
    /**
     * Controla la obtencion de todos los registros de la tabla puntuacion
     */
    public static function getAll() {
        $puntuacion = Puntuacion::getAll();
    }

    /**
     * Controla la obtencion del registro de la tabla puntuacion que tiene el id que llega en una variable
     */
    public static function getId() {
        if (isset($_GET["idScore"])) {
            $puntuacion = Puntuacion::getId($_GET["idScore"]);
            return $puntuacion;
        } else {
            $success = 1;
            $msg = "No se ha podido obtener el registro se ha producido un error";
        }
    }

    /**
     * Controla la insercion de un Registro en la tabla puntuacion
     */
    public function insert() {
        if (isset($_POST["idUsu"]) && isset($_POST["idSeropel"]) && isset($_POST["score"]) && isset($_POST["season"]) && isset($_POST["episode"]) && isset($_POST["idEst"])) {
            $puntuacion = new Puntuacion();
            $puntuacion->setIdUsu($_POST["idUsu"]);
            $puntuacion->setIdSeropel($_POST["idSeropel"]);
            $puntuacion->setScore($_POST["score"]);
            $puntuacion->setSeason($_POST["season"]);
            $puntuacion->setEpisode($_POST["episode"]);
            $puntuacion->setIdEst($_POST["idEst"]);
            $puntuacion->insert();
            $success = 0;
            $msg = "Se ha guadado correctamente";
            /**
             * Controla la obtencion de datos asociados a una serie o pelicula por su identificador, pasado en una variable
             */
            require_once "assets/inc/controller.detalle.inc";
        } else {
            $success = 1;
            $msg = "No se ha podido guardar se ha producido un error";
            /**
             * Controla las listas de Inicio
             */
            require_once "assets/inc/controller.listatotal.inc";
        }
    }

    /**
     * Controla la actualizacion de un Registro en la tabla puntuacion
     */
    public function update() {
        if (isset($_POST["idScore"])) {
            $puntuacion = Puntuacion::getId($_POST["idScore"]);
            if (isset($_POST["idUsu"]) && isset($_POST["idSeropel"]) && isset($_POST["score"]) && isset($_POST["season"]) && isset($_POST["episode"]) && isset($_POST["idEst"])) {
                $puntuacion->setIdUsu($_POST["idUsu"]);
                $puntuacion->setIdSeropel($_POST["idSeropel"]);
                $puntuacion->setScore($_POST["score"]);
                $puntuacion->setSeason($_POST["season"]);
                $puntuacion->setEpisode($_POST["episode"]);
                $puntuacion->setIdEst($_POST["idEst"]);
                $puntuacion->update();
                $success = 0;
                $msg = "Se ha actualizado el registro correctamente";
                /**
                 * Controla la obtencion de datos asociados a una serie o pelicula por su identificador, pasado en una variable
                 */
                require_once "assets/inc/controller.detalle.inc";
            } else {
                $success = 1;
                $msg = "No se ha podido actualizar el registro se ha producido un error";
                /**
                 * Controla las listas de Inicio
                 */
                require_once "assets/inc/controller.listatotal.inc";
            }
        } else {
            $success = 1;
            $msg = "No se ha podido actualizar el registro se ha producido un error";
            /**
             * Controla las listas de Inicio
             */
            require_once "assets/inc/controller.listatotal.inc";
        }
    }

    /**
     * Controla la eliminacion del registro de la tabla puntuacion que tiene el id que llega en una variable
     */
    public function delete() {
        if (isset($_POST["idScore"])) {
            Puntuacion::delete($_POST["idScore"]);
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

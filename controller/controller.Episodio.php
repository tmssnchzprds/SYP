<?php

/**
 * Interfaz de los controladores, Beans, y control de la Sesion
 */
require_once "assets/inc/controller.init.inc";

/**
 * Controla las operaciones relaccionadas con la clase Episodio
 */
class controllerEpisodio implements controllerGenerico {

    private $sesion;

    /**
     * Constructor crea una nueva sesion
     */
    public function __construct() {
        $this->sesion = new Sesion();
    }

    //CRUD
    /**
     * Controla la obtencion de todos los registros de la tabla episodio
     */
    public static function getAll() {
        $episodio = Episodio::getAll();
    }

    /**
     * Controla la obtencion del registro de la tabla episodio que tiene el id que llega en una variable
     */
    public static function getId() {
        if (isset($_GET["idEpi"])) {
            $episodio = Episodio::getId($_GET["idEpi"]);
            return $episodio;
        } else {
            $success = 1;
            $msg = "No se ha podido obtener el registro se ha producido un error";
        }
    }

    /**
     * Controla la insercion de un Registro en la tabla episodio
     */
    public function insert() {
        if (isset($_POST["idSeropel"]) && ($_POST["season"]) && ($_POST["episode"])) {
            $episodio = new Episodio();
            $episodio->setIdSeropel($_POST["idSeropel"]);
            $episodio->setSeason($_POST["season"]);
            $episodio->setEpisode($_POST["episode"]);
            $episodio->insert();
            $success = 0;
            $msg = "Se ha creado el registro correctamente";
            /**
             * Controla la obtencion de datos asociados a una serie o pelicula por su identificador, pasado en una variable
             */
            require_once "assets/inc/controller.detalle.inc";
        } else {
            $success = 1;
            $msg = "No se ha podido insertar el registro se ha producido un error";
            /**
             * Controla las listas de Inicio
             */
            require_once "assets/inc/controller.listatotal.inc";
        }
    }

    /**
     * Controla la actualizacion de un Registro en la tabla episodio
     */
    public function update() {
        if (isset($_POST["idEpi"])) {
            $episodio = Episodio::getId($_POST["idEpi"]);
            if (isset($_POST["idSeropel"]) && ($_POST["season"]) && ($_POST["episode"])) {
                $episodio->setIdSeropel($_POST["idSeropel"]);
                $episodio->setSeason($_POST["season"]);
                $episodio->setEpisode($_POST["episode"]);
                $episodio->update();
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
     * Controla la eliminacion del registro de la tabla episodio que tiene el id que llega en una variable
     */
    public function delete() {
        if (isset($_POST["idSeropel"]) && ($_POST["season"])) {
            $episodio = Episodio::getbySeason($_POST["idSeropel"], $_POST["season"]);
            Episodio::delete($episodio->getIdEpi());
            $success = 0;
            $msg = "Se ha eliminado el registro correctamente";
            /**
             * Controla la obtencion de datos asociados a una serie o pelicula por su identificador, pasado en una variable
             */
            require_once "assets/inc/controller.detalle.inc";
        } else {
            $success = 1;
            $msg = "No se ha podido eliminar el registro se ha producido un error";
            /**
             * Controla las listas de Inicio
             */
            require_once "assets/inc/controller.listatotal.inc";
        }
    }

}

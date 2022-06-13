<?php

require_once "assets/inc/controller.init.inc";

class controllerPuntuacion implements controllerGenerico {

    private $sesion;

    public function __construct() {
        $this->sesion = new Sesion();
    }

    //CRUD
    public static function getAll() {
        $puntuacion = Puntuacion::getAll();
    }

    public static function getId() {
        if (isset($_GET["idScore"])) {
            $puntuacion = Puntuacion::getId($_GET["idScore"]);
            return $puntuacion;
        } else {
            $success = 1;
            $msg = "No se ha podido obtener el registro se ha producido un error";
        }
    }

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
            require_once "assets/inc/controller.detalle.inc";
        } else {
            $success = 1;
            $msg = "No se ha podido guardar se ha producido un error";
            require_once "assets/inc/controller.listatotal.inc";
        }
    }

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
                require_once "assets/inc/controller.detalle.inc";
            } else {
                $success = 1;
                $msg = "No se ha podido actualizar el registro se ha producido un error";
                require_once "assets/inc/controller.listatotal.inc";
            }
        } else {
            $success = 1;
            $msg = "No se ha podido actualizar el registro se ha producido un error";
            require_once "assets/inc/controller.listatotal.inc";
        }
    }

    public function delete() {
        if (isset($_POST["idScore"])) {
            Puntuacion::delete($_POST["idScore"]);
            $success = 0;
            $msg = "Se ha eliminado el comentario correctamente";
        } else {
            $success = 1;
            $msg = "No se ha podido eliminar el comentario se ha producido un error";
        }
        require_once "assets/inc/controller.listatotal.inc";
    }

}

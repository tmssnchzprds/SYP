<?php
require_once "assets/inc/controller.init.inc";

class controllerEpisodio implements controllerGenerico{

    private $sesion;

    public function __construct(){
        $this->sesion = new Sesion() ;
    }
    
    //CRUD
    public static function getAll(){
        $episodio = Episodio::getAll() ;
    }
    public static function getId(){
	if (isset($_GET["idEpi"])) {
            $episodio = Episodio::getId($_GET["idEpi"]) ;
            return $episodio;
	} else {
            $success = 1;
            $msg = "No se ha podido obtener el registro se ha producido un error";
	}
    }
    public function insert(){
        if(isset($_POST["idSeropel"])&&($_POST["season"])&&($_POST["episode"])) {
            $episodio = new Episodio();
            $episodio->setIdSeropel($_POST["idSeropel"]) ;
            $episodio->setSeason($_POST["season"]) ;
            $episodio->setEpisode($_POST["episode"]) ;
            $episodio->insert() ;
            $success = 0;
            $msg = "Se ha creado el registro correctamente";
            require_once "assets/inc/controller.detalle.inc";
        } else {
            $success = 1;
            $msg = "No se ha podido insertar el registro se ha producido un error";
            require_once "assets/inc/controller.listatotal.inc";
        }
    }
    public function update(){
	if (isset($_POST["idEpi"])) {
            $episodio = Episodio::getId($_POST["idEpi"]) ;
            if (isset($_POST["idSeropel"])&&($_POST["season"])&&($_POST["episode"])) {
                $episodio->setIdSeropel($_POST["idSeropel"]) ;
                $episodio->setSeason($_POST["season"]) ;
                $episodio->setEpisode($_POST["episode"]) ;
		$episodio->update() ;
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
    public function delete(){
        if (isset($_POST["idSeropel"]) && ($_POST["season"])) {
            $episodio = Episodio::getbySeason($_POST["idSeropel"] , $_POST["season"]);
            Episodio::delete($episodio->getIdEpi());
            $success = 0;
            $msg = "Se ha eliminado el registro correctamente";
            require_once "assets/inc/controller.detalle.inc";
	} else {
            $success = 1;
            $msg = "No se ha podido eliminar el registro se ha producido un error";
            require_once "assets/inc/controller.listatotal.inc";
	}
    }
}

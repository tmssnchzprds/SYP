<?php
require_once "controller/controller.Generico.php" ;
require_once "model/Estado.php" ;
require_once "model/Sesion.php" ;

class controllerEstado implements controllerGenerico{

    private $sesion;

    public function __construct(){
        $this->sesion = new Sesion() ;
    }
    
    //CRUD
    public static function getAll(){
        $estado = Estado::getAll() ;
        require_once "view/show.Estado.php" ;
    }
    public static function getId(){
	if (isset($_POST["idEst"])) {
            $estado = Estado::getId($_POST["idEst"]) ;
            require_once "view/showById.Estado.php" ;
	} else {
            $this->failure() ;
	}
    }
    public function insert(){
        if(isset($_POST["name"])) {
            $estado = new Estado();
            $estado->setName($_POST["name"]) ;
            $estado->insert() ;
            $this->success() ;
        } else {
            $this->failure() ;
        }
    }
    public function update(){
	if (isset($_POST["idEst"])) {
            $estado = Estado::getId($_POST["idEst"]) ;
            if (isset($_POST["name"])) {
                $estado->setName($_POST["name"]) ;
		$estado->update() ;
                $this->success() ;
            } else {
                $this->failure() ;
            }
        } else {
            $this->failure() ;
        }
        
    }
    public function delete(){
        if (isset($_POST["idEst"])) {
            Estado::delete($_POST["idEst"]) ;
            $this->success() ;
	} else {
            $this->failure() ;
	}
    }
}

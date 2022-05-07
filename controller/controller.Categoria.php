<?php
require_once "controller/controller.Generico.php" ;
require_once "model/Categoria.php" ;
require_once "model/Sesion.php" ;

class controllerCategoria implements controllerGenerico{

    private $sesion;

    public function __construct(){
        $this->sesion = new Sesion() ;
    }
    
    //CRUD
    public static function getAll(){
        $categoria = Categoria::getAll() ;
        require_once "view/show.Categoria.php" ;
    }
    public static function getId(){
	if (isset($_POST["idCat"])) {
            $categoria = Categoria::getId($_POST["idCat"]) ;
            require_once "view/showById.Categoria.php" ;
	} else {
            $this->failure() ;
	}
    }
    public function insert(){
        if(isset($_POST["name"])) {
            $categoria = new Categoria();
            $categoria->setName($_POST["name"]) ;
            $categoria->insert() ;
            $this->success() ;
        } else {
            $this->failure() ;
        }
    }
    public function update(){
	if (isset($_POST["idCat"])) {
            $categoria = Categoria::getId($_POST["idCat"]) ;
            if (isset($_POST["name"])) {
                $categoria->setName($_POST["name"]) ;
		$categoria->update() ;
                $this->success() ;
            } else {
                $this->failure() ;
            }
        } else {
            $this->failure() ;
        }
        
    }
    public function delete(){
        if (isset($_POST["idCat"])) {
            Categoria::delete($_POST["idCat"]) ;
            $this->success() ;
	} else {
            $this->failure() ;
	}
    }

}

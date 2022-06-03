<?php
require_once "assets/inc/controller.init.inc";

class controllerCategoria implements controllerGenerico{

    private $sesion;

    public function __construct(){
        $this->sesion = new Sesion() ;
    }
    
    //CRUD
    public static function getAll(){
        $categoria = Categoria::getAll() ;
    }
    public static function getId(){
	if (isset($_GET["idCat"])) {
            $categoria = Categoria::getId($_GET["idCat"]) ;
            return $categoria;
        } else {
            $success = 1;
            $msg = "No se ha podido obtener el registro se ha producido un error";
	}
    }
    public function insert(){
        if(isset($_POST["name"])) {
            $categoria = new Categoria();
            $categoria->setName($_POST["name"]) ;
            $categoria->insert() ;
            $success = 0;
            $msg = "Se ha creado el registro correctamente";
        } else {
            $success = 1;
            $msg = "No se ha podido crear el usuario se ha producido un error";
        }
        require_once "assets/inc/controller.listatotal.inc";
    }
    public function update(){
	if (isset($_POST["idCat"])) {
            $categoria = Categoria::getId($_POST["idCat"]) ;
            if (isset($_POST["name"])) {
                $categoria->setName($_POST["name"]) ;
		$categoria->update() ;
                $success = 0;
                $msg = "Se ha actualizado el registro correctamente";
            } else {
                $success = 1;
                $msg = "No se ha podido actualizar el registro se ha producido un error";
            }
        } else {
            $success = 1;
            $msg = "No se ha podido actualizar el registro se ha producido un error";
        }
        require_once "assets/inc/controller.listatotal.inc";
    }
    public function delete(){
        if (isset($_POST["idCat"])) {
            Categoria::delete($_POST["idCat"]) ;
            $success = 0;
            $msg = "Se ha eliminado el comentario correctamente";
	} else {
            $success = 1;
            $msg = "No se ha podido eliminar el comentario se ha producido un error";
	}
        require_once "assets/inc/controller.listatotal.inc";
    }
}

<?php
require_once "assets/inc/controller.init.inc";

class controllerComentario implements controllerGenerico{

    private $sesion;

    public function __construct(){
        $this->sesion = new Sesion() ;
    }
    
    //CRUD
    public static function getAll(){
        $comentario = Comentario::getAll() ;
        require_once "view/show.Comentario.php" ;
    }
    public static function getId(){
	if (isset($_GET["idCom"])) {
            $comentario = Comentario::getId($_GET["idCom"]) ;
            return $comentario;
	} else {
            $success = 1;
            $msg = "No se ha podido obtener el registro se ha producido un error";
	}
    }
    public function insert(){
        if(isset($_POST["idUsu"])&&($_POST["idSeropel"])&&($_POST["commentary"])) {
            $comentario = new Comentario();
            $comentario->setIdUsu($_POST["idUsu"]) ;
            $comentario->setIdSeropel($_POST["idSeropel"]) ;
            $comentario->setCommentary($_POST["commentary"]) ;
            $comentario->setSeason(isset($_POST["season"])?$_POST["season"]:0) ;
            $comentario->setEpisode(isset($_POST["episode"])?$_POST["episode"]:0) ;
            $comentario->insert() ;
            $success = 0;
            $msg = "Se ha creado el comentario correctamente";
            require_once "assets/inc/controller.detalle.inc";
        } else {
            $success = 1;
            $msg = "No se ha podido crear el comentario se ha producido un error";
            require_once "assets/inc/controller.listatotal.inc";
        }
    }
    public function update(){
	if (isset($_POST["idCom"])) {
            $comentario = Comentario::getId($_POST["idCom"]) ;
            if (isset($_POST["idUsu"])&&($_POST["idSeropel"])&&($_POST["commentary"])) {
                $comentario->setIdUsu($_POST["idUsu"]) ;
                $comentario->setIdSeropel($_POST["idSeropel"]) ;
                $comentario->setCommentary($_POST["commentary"]) ;
                $comentario->setSeason(isset($_POST["season"])?$_POST["season"]:0) ;
                $comentario->setEpisode(isset($_POST["episode"])?$_POST["episode"]:0) ;
                $comentario->update() ;
                $success = 0;
                $msg = "Se ha actualizado el comentario correctamente";
                require_once "assets/inc/controller.detalle.inc";
            } else {
                $success = 1;
                $msg = "No se ha podido actualizar el comentario se ha producido un error";
                require_once "assets/inc/controller.listatotal.inc";
            }
        } else {
            $success = 1;
            $msg = "No se ha podido actualizar el comentario se ha producido un error";
            require_once "assets/inc/controller.listatotal.inc";
        }
    }
    public function delete(){
        if (isset($_POST["idCom"])) {
            Comentario::delete($_POST["idCom"]) ;
            $success = 0;
            $msg = "Se ha eliminado el comentario correctamente";
	} else {
            $success = 1;
            $msg = "No se ha podido eliminar el comentario se ha producido un error";
	}
        require_once "assets/inc/controller.listatotal.inc";
    }
}

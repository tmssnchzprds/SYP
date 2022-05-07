<?php
require_once "controller/controller.Generico.php" ;
require_once "model/Comentario.php" ;
require_once "model/Sesion.php" ;

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
	if (isset($_POST["idComSer"])) {
            $comentario = Comentario::getId($_POST["idCom"]) ;
            require_once "view/showById.Comentario.php" ;
	} else {
            $this->failure() ;
	}
    }
    public function insert(){
        if(isset($_POST["idUsu"])&&($_POST["idSeropel"])&&($_POST["commentary"])) {
            $comentario = new Comentario();
            $comentario->setIdUsu($_POST["idUsu"]) ;
            $comentario->setIdSeropel($_POST["idSeropel"]) ;
            $comentario->setCommentary($_POST["commentary"]) ;
            $comentario->insert() ;
            $this->success() ;
        } else {
            $this->failure() ;
        }
    }
    public function update(){
	if (isset($_POST["idUsu"])&&($_POST["idSeropel"])&&($_POST["commentary"])) {
            $comentario = Comentario::getId($_POST["idComSer"]) ;
            if (isset($_POST["idUsu"])&&($_POST["idSeropel"])&&($_POST["commentary"])) {
                $comentario->setIdUsu($_POST["idUsu"]) ;
                $comentario->setIdSeropel($_POST["idSeropel"]) ;
                $comentario->setCommentary($_POST["commentary"]) ;
                $comentario->update() ;
                $this->success() ;
            } else {
                $this->failure() ;
            }
        } else {
            $this->failure() ;
        }
        
    }
    public function delete(){
        if (isset($_POST["idCom"])) {
            Comentario::delete($_POST["idCom"]) ;
            $this->success() ;
	} else {
            $this->failure() ;
	}
    }
}

<?php
require_once "controller/controller.Generico.php" ;
require_once "model/Ususeropel.php" ;
require_once "model/Sesion.php" ;

class controllerUsuseropel implements controllerGenerico{

    private $sesion;

    public function __construct(){
        $this->sesion = new Sesion() ;
    }
    
    //CRUD
    public static function getAll(){
        $usuarioSeropel = UsuarioSeropel::getAll() ;
        require_once "view/show.Ususeropel.php" ;
    }
    public static function getId(){
	if (isset($_POST["idUsuseropel"])) {
            $usuarioSeropel = UsuarioSeropel::getId($_POST["idUsuseropel"]) ;
            require_once "view/showById.Ususeropel.php" ;
	} else {
            $this->failure() ;
	}
    }
    public function insert(){
        if(isset($_POST["idUsu"])&&($_POST["idSeropel"])&&($_POST["season"])&&($_POST["episode"])&&($_POST["idEst"])) {
            $usuarioSeropel = new UsuarioSeropel();
            $usuarioSeropel->setIdUsu($_POST["idUsu"]) ;
            $usuarioSeropel->setIdSeropel($_POST["idSeropel"]) ;
            $usuarioSeropel->setSeason($_POST["season"]) ;
            $usuarioSeropel->setEpisode($_POST["episode"]) ;
            $usuarioSeropel->setIdEst($_POST["idEst"]) ;
            $usuarioSeropel->insert() ;
            $this->success() ;
        } else {
            $this->failure() ;
        }
    }
    public function update(){
	if (isset($_POST["idUsuseropel"])) {
            $usuarioSeropel = UsuarioSeropel::getId($_POST["idUsuseropel"]) ;
            if (isset($_POST["idUsu"])&&($_POST["idSeropel"])&&($_POST["season"])&&($_POST["episode"])&&($_POST["idEst"])) {
                $usuarioSeropel->setIdUsu($_POST["idUsu"]) ;
                $usuarioSeropel->setIdSeropel($_POST["idSeropel"]) ;
                $usuarioSeropel->setSeason($_POST["season"]) ;
                $usuarioSeropel->setEpisode($_POST["episode"]) ;
                $usuarioSeropel->setIdEst($_POST["idEst"]) ;
		$usuarioSeropel->update() ;
                $this->success() ;
            } else {
                $this->failure() ;
            }
        } else {
            $this->failure() ;
        }
        
    }
    public function delete(){
        if (isset($_POST["idUsuseropel"])) {
            UsuarioSeropel::delete($_POST["idUsuseropel"]) ;
            $this->success() ;
	} else {
            $this->failure() ;
	}
    }

}

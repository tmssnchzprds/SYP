<?php
require_once "controller/controller.Generico.php" ;
require_once "model/Episodio.php" ;
require_once "model/Sesion.php" ;

class controllerEpisodio implements controllerGenerico{

    private $sesion;

    public function __construct(){
        $this->sesion = new Sesion() ;
    }
    
    //CRUD
    public static function getAll(){
        $episodio = Episodio::getAll() ;
        require_once "view/show.Episodio.php" ;
    }
    public static function getId(){
	if (isset($_POST["idEpi"])) {
            $episodio = Episodio::getId($_POST["idEpi"]) ;
            require_once "view/showById.Episodio.php" ;
	} else {
            $this->failure() ;
	}
    }
    public function insert(){
        if(isset($_POST["idSeropel"])&&($_POST["season"])&&($_POST["episode"])) {
            $episodio = new Episodio();
            $episodio->setIdSeropel($_POST["idSeropel"]) ;
            $episodio->setSeason($_POST["season"]) ;
            $episodio->setEpisode($_POST["episode"]) ;
            $episodio->insert() ;
            $this->success() ;
        } else {
            $this->failure() ;
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
                $this->success() ;
            } else {
                $this->failure() ;
            }
        } else {
            $this->failure() ;
        }
        
    }
    public function delete(){
        if (isset($_POST["idEpi"])) {
            Episodio::delete($_POST["idEpi"]) ;
            $this->success() ;
	} else {
            $this->failure() ;
	}
    }
   
}

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
        } else {
             $success = 1;
             $msg = "No se ha podido crear el usuario se ha producido un error";
        }
        $caption[0] = "Series Añadidas Recientemente";
        $seropel[0] = Seropel::listaactual(1);
        $caption[1] = "Series Mejor Valoradas";
        $seropel[1] = Seropel::listamejor(1);
        $caption[2] = "Peliculas Añadidas Recientemente";
        $seropel[2] = Seropel::listaactual(2);
        $caption[3] = "Peliculas Mejor Valoradas";
        $seropel[3] = Seropel::listamejor(2);
        $categoria = Categoria::getAll();
        require_once "view/show.seropel.php";
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
            } else {
                $success = 1;
                $msg = "No se ha podido actualizar el registro se ha producido un error";
            }
        } else {
            $success = 1;
            $msg = "No se ha podido actualizar el registro se ha producido un error";
        }
        $caption[0] = "Series Añadidas Recientemente";
        $seropel[0] = Seropel::listaactual(1);
        $caption[1] = "Series Mejor Valoradas";
        $seropel[1] = Seropel::listamejor(1);
        $caption[2] = "Peliculas Añadidas Recientemente";
        $seropel[2] = Seropel::listaactual(2);
        $caption[3] = "Peliculas Mejor Valoradas";
        $seropel[3] = Seropel::listamejor(2);
        $categoria = Categoria::getAll();
        require_once "view/show.seropel.php";
    }
    public function delete(){
        if (isset($_POST["idEpi"])) {
            Episodio::delete($_POST["idEpi"]) ;
            $success = 0;
            $msg = "Se ha eliminado el comentario correctamente";
	} else {
            $success = 1;
            $msg = "No se ha podido eliminar el comentario se ha producido un error";
	}
        $caption[0] = "Series Añadidas Recientemente";
        $seropel[0] = Seropel::listaactual(1);
        $caption[1] = "Series Mejor Valoradas";
        $seropel[1] = Seropel::listamejor(1);
        $caption[2] = "Peliculas Añadidas Recientemente";
        $seropel[2] = Seropel::listaactual(2);
        $caption[3] = "Peliculas Mejor Valoradas";
        $seropel[3] = Seropel::listamejor(2);
        $categoria = Categoria::getAll();
        require_once "view/show.seropel.php";
    }
   
}

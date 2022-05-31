<?php
require_once "controller/controller.Generico.php" ;
require_once "model/Seropel.php";
require_once "model/Categoria.php";
require_once "model/Episodio.php";
require_once "model/Comentario.php";
require_once "model/Puntuacion.php";
require_once "model/Sesion.php" ;

class controllerPuntuacion implements controllerGenerico{

    private $sesion;

    public function __construct(){
        $this->sesion = new Sesion() ;
    }
    
    //CRUD
    public static function getAll(){
        $puntuacion = Puntuacion::getAll() ;
    }
    public static function getId(){
	if (isset($_GET["idScore"])) {
            $puntuacion = Puntuacion::getId($_GET["idScore"]) ;
            return $puntuacion;
	} else {
            $success = 1;
            $msg = "No se ha podido obtener el registro se ha producido un error";
	}
    }
    public function insert(){
        if(isset($_POST["idUsu"])&& isset($_POST["idSeropel"])&& isset($_POST["score"])&& isset($_POST["season"])&& isset($_POST["episode"])&& isset($_POST["idEst"])) {
            $puntuacion = new Puntuacion();
            $puntuacion->setIdUsu($_POST["idUsu"]) ;
            $puntuacion->setIdSeropel($_POST["idSeropel"]) ;
            $puntuacion->setScore($_POST["score"]) ;
            $puntuacion->setSeason($_POST["season"]) ;
            $puntuacion->setEpisode($_POST["episode"]) ;
            $puntuacion->setIdEst($_POST["idEst"]) ;
            $puntuacion->insert() ;
            $success = 0;
            $msg = "Se ha guadado correctamente";
        } else {
             $success = 1;
             $msg = "No se ha podido guardar se ha producido un error".$_POST["idUsu"].$_POST["idSeropel"].$_POST["score"].$_POST["idEst"].$_POST["season"].($_POST["episode"]);
        }
if (isset($_POST["idSeropel"])) {
            $detalle = Seropel::detalle($_POST["idSeropel"]);
            if (isset($_SESSION["usuario"])){
                
               $puntuacion = Puntuacion::getPuntuacion($_POST["idSeropel"],$_SESSION["usuario"]->idUsu);
            }
            $categoria = Categoria::getAll();
            $comentarios = Comentario::comentarioSeropel($_POST["idSeropel"]);
            $cantcomentario = count($comentarios);
                if ($cantcomentario != 0) {
                    $comentarios_title = " Todos los Comentarios";
                } else {
                    $comentarios_title = " No hay Comentarios";
                }
            $episodio = Episodio::getSeropel($_POST["idSeropel"]);
            require_once "view/show.detalle.php";
        } else {
            $success = 1;
            $msg = $msg."<br>No se ha encontrado la Serie o Pelicula";
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
    public function update(){
	if (isset($_POST["idScore"])) {
            $puntuacion = Puntuacion::getId($_POST["idScore"]) ;
            if (isset($_POST["idUsu"])&& isset($_POST["idSeropel"])&& isset($_POST["score"])&& isset($_POST["season"])&& isset($_POST["episode"])&& isset($_POST["idEst"])) {
                $puntuacion->setIdUsu($_POST["idUsu"]) ;
                $puntuacion->setIdSeropel($_POST["idSeropel"]) ;
                $puntuacion->setScore($_POST["score"]) ;
                $puntuacion->setSeason($_POST["season"]) ;
                $puntuacion->setEpisode($_POST["episode"]) ;
                $puntuacion->setIdEst($_POST["idEst"]) ;
		$puntuacion->update() ;
                $success = 0;
                $msg = "Se ha actualizado el registro correctamente";
            } else {
                $success = 1;
                $msg = "No se ha podido actualizar el registro se ha producido un error";
            }
            if (isset($_POST["idSeropel"])) {
            $detalle = Seropel::detalle($_POST["idSeropel"]);
            if (isset($_SESSION["usuario"])){
                
               $puntuacion = Puntuacion::getPuntuacion($_POST["idSeropel"],$_SESSION["usuario"]->idUsu);
            }
            $categoria = Categoria::getAll();
            $comentarios = Comentario::comentarioSeropel($_POST["idSeropel"]);
            $cantcomentario = count($comentarios);
                if ($cantcomentario != 0) {
                    $comentarios_title = " Todos los Comentarios";
                } else {
                    $comentarios_title = " No hay Comentarios";
                }
            $episodio = Episodio::getSeropel($_POST["idSeropel"]);
            require_once "view/show.detalle.php";
        } else {
            $success = 1;
            $msg = $msg."<br>No se ha encontrado la Serie o Pelicula";
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
        } else {
            $success = 1;
            $msg = "No se ha podido actualizar el registro se ha producido un error";
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
    public function delete(){
        if (isset($_POST["idScore"])) {
            Puntuacion::delete($_POST["idScore"]) ;
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

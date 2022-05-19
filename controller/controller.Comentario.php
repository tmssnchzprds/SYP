<?php
require_once "controller/controller.Generico.php" ;
require_once "model/Comentario.php" ;
require_once "model/Categoria.php" ;
require_once "model/Seropel.php" ;
require_once "model/Episodio.php" ;
require_once "model/Usuario.php" ;
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
            $comentario->insert() ;
            $success = 0;
            $msg = "Se ha creado el comentario correctamente";
             $detalle = Seropel::detalle($_POST["idSeropel"]);
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
            $msg = "No se ha podido crear el comentario se ha producido un error";
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
	if (isset($_POST["idCom"])) {
            $comentario = Comentario::getId($_POST["idCom"]) ;
            if (isset($_POST["idUsu"])&&($_POST["idSeropel"])&&($_POST["commentary"])) {
                $comentario->setIdUsu($_POST["idUsu"]) ;
                $comentario->setIdSeropel($_POST["idSeropel"]) ;
                $comentario->setCommentary($_POST["commentary"]) ;
                $comentario->update() ;
                $success = 0;
            $msg = "Se ha actualizado el comentario correctamente";
             $detalle = Seropel::detalle($_POST["idSeropel"]);
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
            $msg = "No se ha podido actualizar el comentario se ha producido un error";
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
            $msg = "No se ha podido actualizar el comentario se ha producido un error";
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
        if (isset($_POST["idCom"])) {
            Comentario::delete($_POST["idCom"]) ;
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

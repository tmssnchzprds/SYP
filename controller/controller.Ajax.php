<?php
require_once "model/Seropel.php" ;
require_once "model/Categoria.php" ;
require_once "model/Episodio.php" ;
require_once "model/Comentario.php" ;
require_once "model/Sesion.php" ;

class controllerAjax{

    private $sesion;

    public function __construct(){
        $this->sesion = new Sesion() ;
    }

    public static function listaTotal() {
        $caption[0] = "Series Añadidas Recientemente";
        $seropel[0] = Seropel::listaactual(1);
        $caption[1] = "Series Mejor Valoradas";
        $seropel[1] = Seropel::listamejor(1);
        $caption[2] = "Peliculas Añadidas Recientemente";
        $seropel[2] = Seropel::listaactual(2);
        $caption[3] = "Peliculas Mejor Valoradas";
        $seropel[3] = Seropel::listamejor(2);
        $categoria = Categoria::getAll();
        require_once "view/ajax.seropel.php";
    }

    public static function lista() {
        if (isset($_GET["tipo"])) {
            if ($_GET["tipo"] == 1 || $_GET["tipo"] == 2) {

                $categoria = Categoria::getAll();
                if ($_GET["tipo"] == 1){
                    $logo = "serie.png";
                $caption[0] = "Series Añadidas Recientemente";
                $seropel[0] = Seropel::listaactual(1);
                $caption[1] = "Series Mejor Valoradas";
                $seropel[1] = Seropel::listamejor(1);
                }elseif ($_GET["tipo"] == 2){
                    $logo = "pelicula.png";
                $caption[0] = "Peliculas Añadidas Recientemente";
                $seropel[0] = Seropel::listaactual(2);
                $caption[1] = "Peliculas Mejor Valoradas";
                $seropel[1] = Seropel::listamejor(2);
                }
                $cantseropel = count($seropel[0]);
                if ($cantseropel != 0) {
                    $success = 0;
                    $msg = "Se han encontrado " . $cantseropel . " resultados";
                } else {
                    $success = 1;
                    $msg = "No se han encontrado resultados para la busqueda";
                }
                require_once "view/ajax.seropel.php";
            } else {
                $success = 1;
                $msg = "No se ha encontrado el Tipo";
                require_once "view/ajax.seropel.php";
            }
        } else {
            $success = 1;
            $msg = "No se ha encontrado el Tipo";
            require_once "view/ajax.seropel.php";
        }
    }
    public static function milista() {
        if (isset($_SESSION["usuario"])) {
                $categoria = Categoria::getAll();
                $caption[0] = "Series Pendiente Añadidas Recientemente";
                $seropel[0] = Seropel::milistaactual(1,1);
                $caption[1] = "Series Pendiente Mejor Valoradas";
                $seropel[1] = Seropel::milistamejor(1,1);
                $caption[2] = "Series Siguiendo Añadidas Recientemente";
                $seropel[2] = Seropel::milistaactual(1,2);
                $caption[3] = "Series Siguiendo Mejor Valoradas";
                $seropel[3] = Seropel::milistamejor(1,2);
                $caption[4] = "Series Visto Añadidas Recientemente";
                $seropel[4] = Seropel::milistaactual(1,3);
                $caption[5] = "Series Visto Mejor Valoradas";
                $seropel[5] = Seropel::milistamejor(1,3);
                $caption[6] = "Peliculas Pendiente Añadidas Recientemente";
                $seropel[6] = Seropel::milistaactual(2,1);
                $caption[7] = "Peliculas Pendiente Mejor Valoradas";
                $seropel[7] = Seropel::milistamejor(2,1);
                $caption[8] = "Peliculas Visto Añadidas Recientemente";
                $seropel[8] = Seropel::milistaactual(2,3);
                $caption[9] = "Peliculas Visto Mejor Valoradas";
                $seropel[9] = Seropel::milistamejor(2,3);
            $cantseropel = count($seropel[0]);
                if ($cantseropel != 0) {
                    $success = 0;
                    $msg = "Se han encontrado " . $cantseropel . " resultados";
                } else {
                    $success = 1;
                    $msg = "No se han encontrado resultados para la busqueda";
                }
                require_once "view/ajax.seropel.php";
        } else {
            $success = 1;
            $msg = "No se ha encontrado el Usuario";
            require_once "view/ajax.seropel.php";
        }
    }
    public static function milistaser() {
            $categoria = Categoria::getAll();
        if (isset($_SESSION["usuario"])) {
            if (isset($_GET["estado"])) {
                $logo = "serie.png";
                if ($_GET["estado"] == 1 || $_GET["estado"] == 2 || $_GET["estado"] == 3) {
                if ($_GET["estado"] == 1){
                $caption[0] = "Series Pendiente Añadidas Recientemente";
                $seropel[0] = Seropel::milistaactual(1,1);
                $caption[1] = "Series Pendiente Mejor Valoradas";
                $seropel[1] = Seropel::milistamejor(1,1);
                }elseif ($_GET["estado"] == 2){
                $caption[0] = "Series Siguiendo Añadidas Recientemente";
                $seropel[0] = Seropel::milistaactual(1,2);
                $caption[1] = "Series Siguiendo Mejor Valoradas";
                $seropel[1] = Seropel::milistamejor(1,2);
                }elseif ($_GET["estado"] == 3){
                $caption[0] = "Series Vistas Añadidas Recientemente";
                $seropel[0] = Seropel::milistaactual(1,3);
                $caption[1] = "Series Vistas Mejor Valoradas";
                $seropel[1] = Seropel::milistamejor(1,3);
                }
            } else {
                $success = 1;
                $msg = "No se ha encontrado el Estado";
                $caption[0] = "Series Pendiente Añadidas Recientemente";
                $seropel[0] = Seropel::milistaactual(1,1);
                $caption[1] = "Series Pendiente Mejor Valoradas";
                $seropel[1] = Seropel::milistamejor(1,1);
                $caption[2] = "Series Siguiendo Añadidas Recientemente";
                $seropel[2] = Seropel::milistaactual(1,2);
                $caption[3] = "Series Siguiendo Mejor Valoradas";
                $seropel[3] = Seropel::milistamejor(1,2);
                $caption[4] = "Series Vistas Añadidas Recientemente";
                $seropel[4] = Seropel::milistaactual(1,3);
                $caption[5] = "Series Vistas Mejor Valoradas";
                $seropel[5] = Seropel::milistamejor(1,3);
            }} else {
                $caption[0] = "Series Pendiente Añadidas Recientemente";
                $seropel[0] = Seropel::milistaactual(1,1);
                $caption[1] = "Series Pendiente Mejor Valoradas";
                $seropel[1] = Seropel::milistamejor(1,1);
                $caption[2] = "Series Siguiendo Añadidas Recientemente";
                $seropel[2] = Seropel::milistaactual(1,2);
                $caption[3] = "Series Siguiendo Mejor Valoradas";
                $seropel[3] = Seropel::milistamejor(1,2);
                $caption[4] = "Series Vistas Añadidas Recientemente";
                $seropel[4] = Seropel::milistaactual(1,3);
                $caption[5] = "Series Vistas Mejor Valoradas";
                $seropel[5] = Seropel::milistamejor(1,3);
            }
                require_once "view/ajax.seropel.php";
        } else {
            $success = 1;
            $msg = "No se ha encontrado el Usuario";
            require_once "view/ajax.seropel.php";
       }
    }

    public static function milistapel() {
        $categoria = Categoria::getAll();
        if (isset($_SESSION["usuario"])) {
           if (isset($_GET["estado"])){
                $logo = "pelicula.png";
            if ($_GET["estado"] == 1 || $_GET["estado"] == 3 ) {
                if ($_GET["estado"] == 1){
                $caption[0] = "Peliculas ".$estadoactual->getName()." Añadidas Recientemente";
                $seropel[0] = Seropel::milistaactual(2,1);
                $caption[1] = "Peliculas ".$estadoactual->getName()." Mejor Valoradas";
                $seropel[1] = Seropel::milistamejor(2,1);
                }elseif ($_GET["estado"] == 3){
                $caption[0] = "Peliculas Vistas Añadidas Recientemente";
                $seropel[0] = Seropel::milistaactual(2,3);
                $caption[1] = "Peliculas Vistas Mejor Valoradas";
                $seropel[1] = Seropel::milistamejor(2,3);
                }
            } else {
                $success = 1;
                $msg = "No se ha encontrado el Estado";
                $caption[0] = "Peliculas Pendiente Añadidas Recientemente";
                $seropel[0] = Seropel::milistaactual(2,1);
                $caption[1] = "Peliculas Pendiente Mejor Valoradas";
                $seropel[1] = Seropel::milistamejor(2,1);
                $caption[2] = "Peliculas Vistas Añadidas Recientemente";
                $seropel[2] = Seropel::milistaactual(2,3);
                $caption[3] = "Peliculas Vistas Mejor Valoradas";
                $seropel[3] = Seropel::milistamejor(2,3);
            }} else {
                $caption[0] = "Peliculas Pendiente Añadidas Recientemente";
                $seropel[0] = Seropel::milistaactual(2,1);
                $caption[1] = "Peliculas Pendiente Mejor Valoradas";
                $seropel[1] = Seropel::milistamejor(2,1);
                $caption[2] = "Peliculas Vistas Añadidas Recientemente";
                $seropel[2] = Seropel::milistaactual(2,3);
                $caption[3] = "Peliculas Vistas Mejor Valoradas";
                $seropel[3] = Seropel::milistamejor(2,3);
            }
                require_once "view/ajax.seropel.php";
        } else {
            $success = 1;
            $msg = "No se ha encontrado el Usuario";
            require_once "view/ajax.seropel.php";
        }
    }
    
    public static function categoria() {
        if (isset($_GET["idCat"]) && isset($_GET["tipo"])) {
            $categoria = Categoria::getAll();
            if ($_GET["idCat"] < count($categoria) && $_GET["tipo"] == 1 || $_GET["tipo"] == 2) {
                $categoriaactual = Categoria::getId($_GET["idCat"]);
                if ($_GET["tipo"] == 1){
                    $logo = "serie.png";
                $caption[0] = "Series Añadidas Recientemente de la categoria ".$categoriaactual->getName();
                $seropel[0] = Seropel::categoriaactual($_GET["idCat"], 1);
                $caption[1] = "Series Mejor Valoradas de la categoria ".$categoriaactual->getName();
                $seropel[1] = Seropel::categoriamejor($_GET["idCat"], 1);
                }elseif ($_GET["tipo"] == 2){
                    $logo = "pelicula.png";
                $caption[0] = "Peliculas Añadidas Recientemente de la categoria ".$categoriaactual->getName();
                $seropel[0] = Seropel::categoriaactual($_GET["idCat"], 2);
                $caption[1] = "Peliculas Mejor Valoradas de la categoria ".$categoriaactual->getName();
                $seropel[1] = Seropel::categoriamejor($_GET["idCat"], 2);
                }
                $cantseropel = count($seropel[0]);
                if ($cantseropel != 0) {
                    $success = 0;
                    $msg = "Se han encontrado " . $cantseropel . " resultados";
                } else {
                    $success = 1;
                    $msg = "No se han encontrado resultados para la busqueda";
                }
                require_once "view/ajax.seropel.php";
            } else {
                $success = 1;
                $msg = "No se ha encontrado la Categoria o el Tipo";
                require_once "view/ajax.seropel.php";
            }
        } else {
            $success = 1;
            $msg = "No se ha encontrado la Categoria o el Tipo";
            require_once "view/ajax.seropel.php";
        }
    }
    public static function buscar() {
        if (isset($_GET["buscar"])) {
            $categoria = Categoria::getAll();
                    $caption[0] = "Series Añadidas Recientemente";
                    $seropel[0] = Seropel::buscaractual($_GET["buscar"],1);
                    $caption[1] = "Series Mejor Valoradas";
                    $seropel[1] = Seropel::buscarmejor($_GET["buscar"],1);
                    $caption[2] = "Peliculas Añadidas Recientemente";
                    $seropel[2] = Seropel::buscaractual($_GET["buscar"],2);
                    $caption[3] = "Peliculas Mejor Valoradas";
                    $seropel[3] = Seropel::buscarmejor($_GET["buscar"],2);
                $cantseropel = count($seropel[0])+count($seropel[2]);
                if ($cantseropel != 0) {
                    $success = 0;
                    $msg = "Se han encontrado " . $cantseropel . " resultados para la busqueda: ".$_GET["buscar"];
                } else {
                    $success = 1;
                    $msg = "No se han encontrado resultados para la busqueda: ".$_GET["buscar"];
                }
                require_once "view/ajax.seropel.php";
            } else {
                $success = 1;
                $msg = "No se ha encontrado la Busqueda";
                require_once "view/ajax.seropel.php";
            }
    }
    public static function comentario() {
        if (isset($_GET["idSeropel"])) {
            $episodio = Episodio::getSeropel($_GET["idSeropel"]);
            $comentarios = Comentario::comentarioSeropel($_GET["idSeropel"]);
            $cantcomentario = count($comentarios);
                if ($cantcomentario != 0) {
                    $comentarios_title = " Todos los Comentarios";

                } else {
                    $comentarios_title = " No hay Comentarios";
                }
            require_once "view/ajax.comentario.php";
        } else {
            $success = 1;
            $msg = "No se ha encontrado los Comentarios";
            require_once "view/ajax.comentario.php";
        }
    }
    public static function comentariotemporada() {
        if (isset($_GET["idSeropel"]) && isset($_GET["season"])) {
            $episodio = Episodio::getSeropel($_GET["idSeropel"]);
            $comentarios = Comentario::comentarioTemporada($_GET["idSeropel"],$_GET["season"]);
            $cantcomentario = count($comentarios);
                if ($cantcomentario != 0) {
                    $comentarios_title = " Todos los Comentarios de la Temporada ".$_GET["season"];
                } else {
                    $comentarios_title = " No Hay Comentarios en la Temporada ".$_GET["season"];
                }
            require_once "view/ajax.comentario.php";
        } else {
            $success = 1;
            $msg = "No se ha encontrado los Comentarios";
            require_once "view/ajax.comentario.php";
        }
    }
    public static function comentarioepisodio() {
        if (isset($_GET["idSeropel"]) && isset($_GET["season"]) && isset($_GET["episode"])) {
            $episodio = Episodio::getSeropel($_GET["idSeropel"]);
            $comentarios = Comentario::comentarioEpisodio($_GET["idSeropel"],$_GET["season"],$_GET["episode"]);
            $cantcomentario = count($comentarios);
                if ($cantcomentario != 0) {
                    $comentarios_title = "Comentarios de la Temporada ".$_GET["season"]." Episodio ".$_GET["episode"];
                } else {
                    $comentarios_title = "No Hay Comentarios en la Temporada ".$_GET["season"]." Episodio ".$_GET["episode"];
                }
            require_once "view/ajax.comentario.php";
        } else {
            $success = 1;
            $msg = "No se ha encontrado los Comentarios";
            require_once "view/ajax.comentario.php";
        }
    }
        public static function login() {
           require_once "view/modal.login.php";
        }
        public static function signin() {
           require_once "view/modal.signin.php";
        }
        public static function modificarseropel() {
            if (isset($_GET["idSeropel"])) {
            $detalle = Seropel::detalle($_GET["idSeropel"]);
            } else {
            $detalle = "";
            }
            $categoria = Categoria::getAll();
           require_once "view/modal.modificarseropel.php";
        }
        public static function eliminarseropel() {
            if (isset($_GET["idSeropel"])) {
            $detalle = Seropel::detalle($_GET["idSeropel"]);
            } else {
            $detalle = "";
            }
           require_once "view/modal.eliminarseropel.php";
        }
        public static function modificarcom() {
            if (isset($_GET["idCom"])) {
            $comentario = Comentario::getId($_GET["idCom"]);
            } else {
            $comentario = "";
            }
            if (isset($_GET["idSeropel"])) {
            $detalle = Seropel::detalle($_GET["idSeropel"]);
            } else {
            $detalle = "";
            }
            if (isset($_GET["idSeropel"])) {
            $episodio = Episodio::getSeropel($_GET["idSeropel"]);
            } else {
            $episodio = "";
            }
           require_once "view/modal.modificarcom.php";
        }
        public static function eliminarcom() {
            if (isset($_GET["idCom"])) {
            $idCom = $_GET["idCom"];
            } else {
            $idCom = "";
            }
           require_once "view/modal.eliminarcom.php";
        }        
}
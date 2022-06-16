<?php

/**
 * Interfaz de los controladores, Beans, y control de la Sesion
 */
require_once "assets/inc/controller.init.inc";

/**
 * Controla las operaciones mediante Ajax
 */
class controllerAjax {

    private $sesion;

    /**
     * Constructor crea una nueva sesion
     */
    public function __construct() {
        $this->sesion = new Sesion();
    }

    /**
     * Controla las listas de inicio y los carga por ajax
     */
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
        /**
         * Carga la vista por ajax seropel
         */
        require_once "view/ajax.seropel.php";
    }

    /**
     * Controla las listas por tipo (serie o pelicula) y los carga por ajax
     */
    public static function lista() {
        if (isset($_GET["tipo"])) {
            if ($_GET["tipo"] == 1 || $_GET["tipo"] == 2) {
                $categoria = Categoria::getAll();
                if ($_GET["tipo"] == 1) {
                    $logo = "serie.png";
                    $caption[0] = "Series Añadidas Recientemente";
                    $seropel[0] = Seropel::listaactual(1);
                    $caption[1] = "Series Mejor Valoradas";
                    $seropel[1] = Seropel::listamejor(1);
                } elseif ($_GET["tipo"] == 2) {
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
                /**
                 * Carga la vista por ajax seropel
                 */
                require_once "view/ajax.seropel.php";
            } else {
                $success = 1;
                $msg = "No se ha encontrado el Tipo";
                /**
                 * Carga la vista por ajax seropel
                 */
                require_once "view/ajax.seropel.php";
            }
        } else {
            $success = 1;
            $msg = "No se ha encontrado el Tipo";
            /**
             * Carga la vista por ajax seropel
             */
            require_once "view/ajax.seropel.php";
        }
    }

    /**
     * Controla las listas del Usuario y los carga por ajax
     */
    public static function milista() {
        if (isset($_SESSION["usuario"])) {
            $categoria = Categoria::getAll();
            $caption[0] = "Series Pendiente Añadidas Recientemente";
            $seropel[0] = Seropel::milistaactual(1, 1);
            $caption[1] = "Series Pendiente Mejor Valoradas";
            $seropel[1] = Seropel::milistamejor(1, 1);
            $caption[2] = "Series Siguiendo Añadidas Recientemente";
            $seropel[2] = Seropel::milistaactual(1, 2);
            $caption[3] = "Series Siguiendo Mejor Valoradas";
            $seropel[3] = Seropel::milistamejor(1, 2);
            $caption[4] = "Series Visto Añadidas Recientemente";
            $seropel[4] = Seropel::milistaactual(1, 3);
            $caption[5] = "Series Visto Mejor Valoradas";
            $seropel[5] = Seropel::milistamejor(1, 3);
            $caption[6] = "Peliculas Pendiente Añadidas Recientemente";
            $seropel[6] = Seropel::milistaactual(2, 1);
            $caption[7] = "Peliculas Pendiente Mejor Valoradas";
            $seropel[7] = Seropel::milistamejor(2, 1);
            $caption[8] = "Peliculas Visto Añadidas Recientemente";
            $seropel[8] = Seropel::milistaactual(2, 3);
            $caption[9] = "Peliculas Visto Mejor Valoradas";
            $seropel[9] = Seropel::milistamejor(2, 3);
            $cantseropel = count($seropel[0]);
            if ($cantseropel != 0) {
                $success = 0;
                $msg = "Se han encontrado " . $cantseropel . " resultados";
            } else {
                $success = 1;
                $msg = "No se han encontrado resultados para la busqueda";
            }
            /**
             * Carga la vista por ajax seropel
             */
            require_once "view/ajax.seropel.php";
        } else {
            $success = 1;
            $msg = "No se ha encontrado el Usuario";
            /**
             * Carga la vista por ajax seropel
             */
            require_once "view/ajax.seropel.php";
        }
    }

    /**
     * Controla las listas de series del Usuario y las filtra por el estado, pasado en una variable, y los carga por ajax
     */
    public static function milistaser() {
        $categoria = Categoria::getAll();
        if (isset($_SESSION["usuario"])) {
            if (isset($_GET["estado"])) {
                if ($_GET["estado"] == 1 || $_GET["estado"] == 2 || $_GET["estado"] == 3) {
                    if ($_GET["estado"] == 1) {
                        $caption[0] = "Series Pendiente Añadidas Recientemente";
                        $seropel[0] = Seropel::milistaactual(1, 1);
                        $caption[1] = "Series Pendiente Mejor Valoradas";
                        $seropel[1] = Seropel::milistamejor(1, 1);
                    } elseif ($_GET["estado"] == 2) {
                        $caption[0] = "Series Siguiendo Añadidas Recientemente";
                        $seropel[0] = Seropel::milistaactual(1, 2);
                        $caption[1] = "Series Siguiendo Mejor Valoradas";
                        $seropel[1] = Seropel::milistamejor(1, 2);
                    } elseif ($_GET["estado"] == 3) {
                        $caption[0] = "Series Vistas Añadidas Recientemente";
                        $seropel[0] = Seropel::milistaactual(1, 3);
                        $caption[1] = "Series Vistas Mejor Valoradas";
                        $seropel[1] = Seropel::milistamejor(1, 3);
                    }
                } else {
                    $success = 1;
                    $msg = "No se ha encontrado el Estado";
                    $caption[0] = "Series Pendiente Añadidas Recientemente";
                    $seropel[0] = Seropel::milistaactual(1, 1);
                    $caption[1] = "Series Pendiente Mejor Valoradas";
                    $seropel[1] = Seropel::milistamejor(1, 1);
                    $caption[2] = "Series Siguiendo Añadidas Recientemente";
                    $seropel[2] = Seropel::milistaactual(1, 2);
                    $caption[3] = "Series Siguiendo Mejor Valoradas";
                    $seropel[3] = Seropel::milistamejor(1, 2);
                    $caption[4] = "Series Vistas Añadidas Recientemente";
                    $seropel[4] = Seropel::milistaactual(1, 3);
                    $caption[5] = "Series Vistas Mejor Valoradas";
                    $seropel[5] = Seropel::milistamejor(1, 3);
                }
            } else {
                $caption[0] = "Series Pendiente Añadidas Recientemente";
                $seropel[0] = Seropel::milistaactual(1, 1);
                $caption[1] = "Series Pendiente Mejor Valoradas";
                $seropel[1] = Seropel::milistamejor(1, 1);
                $caption[2] = "Series Siguiendo Añadidas Recientemente";
                $seropel[2] = Seropel::milistaactual(1, 2);
                $caption[3] = "Series Siguiendo Mejor Valoradas";
                $seropel[3] = Seropel::milistamejor(1, 2);
                $caption[4] = "Series Vistas Añadidas Recientemente";
                $seropel[4] = Seropel::milistaactual(1, 3);
                $caption[5] = "Series Vistas Mejor Valoradas";
                $seropel[5] = Seropel::milistamejor(1, 3);
            }
            /**
             * Carga la vista por ajax seropel
             */
            require_once "view/ajax.seropel.php";
        } else {
            $success = 1;
            $msg = "No se ha encontrado el Usuario";
            /**
             * Carga la vista por ajax seropel
             */
            require_once "view/ajax.seropel.php";
        }
    }

    /**
     * Controla las listas de peliculas del Usuario y las filtra por el estado, pasado en una variable, y los carga por ajax
     */
    public static function milistapel() {
        $categoria = Categoria::getAll();
        if (isset($_SESSION["usuario"])) {
            if (isset($_GET["estado"])) {
                $logo = "pelicula.png";
                if ($_GET["estado"] == 1 || $_GET["estado"] == 3) {
                    if ($_GET["estado"] == 1) {
                        $caption[0] = "Peliculas " . $estadoactual->getName() . " Añadidas Recientemente";
                        $seropel[0] = Seropel::milistaactual(2, 1);
                        $caption[1] = "Peliculas " . $estadoactual->getName() . " Mejor Valoradas";
                        $seropel[1] = Seropel::milistamejor(2, 1);
                    } elseif ($_GET["estado"] == 3) {
                        $caption[0] = "Peliculas Vistas Añadidas Recientemente";
                        $seropel[0] = Seropel::milistaactual(2, 3);
                        $caption[1] = "Peliculas Vistas Mejor Valoradas";
                        $seropel[1] = Seropel::milistamejor(2, 3);
                    }
                } else {
                    $success = 1;
                    $msg = "No se ha encontrado el Estado";
                    $caption[0] = "Peliculas Pendiente Añadidas Recientemente";
                    $seropel[0] = Seropel::milistaactual(2, 1);
                    $caption[1] = "Peliculas Pendiente Mejor Valoradas";
                    $seropel[1] = Seropel::milistamejor(2, 1);
                    $caption[2] = "Peliculas Vistas Añadidas Recientemente";
                    $seropel[2] = Seropel::milistaactual(2, 3);
                    $caption[3] = "Peliculas Vistas Mejor Valoradas";
                    $seropel[3] = Seropel::milistamejor(2, 3);
                }
            } else {
                $caption[0] = "Peliculas Pendiente Añadidas Recientemente";
                $seropel[0] = Seropel::milistaactual(2, 1);
                $caption[1] = "Peliculas Pendiente Mejor Valoradas";
                $seropel[1] = Seropel::milistamejor(2, 1);
                $caption[2] = "Peliculas Vistas Añadidas Recientemente";
                $seropel[2] = Seropel::milistaactual(2, 3);
                $caption[3] = "Peliculas Vistas Mejor Valoradas";
                $seropel[3] = Seropel::milistamejor(2, 3);
            }
            /**
             * Carga la vista por ajax seropel
             */
            require_once "view/ajax.seropel.php";
        } else {
            $success = 1;
            $msg = "No se ha encontrado el Usuario";
            /**
             * Carga la vista por ajax seropel
             */
            require_once "view/ajax.seropel.php";
        }
    }

    /**
     * Filtra las listas por categoria, pasado en una variable, y los carga por ajax
     */
    public static function categoria() {
        if (isset($_GET["idCat"]) && isset($_GET["tipo"])) {
            $categoria = Categoria::getAll();
            if ($_GET["idCat"] < count($categoria) && $_GET["tipo"] == 1 || $_GET["tipo"] == 2) {
                $categoriaactual = Categoria::getId($_GET["idCat"]);
                if ($_GET["tipo"] == 1) {
                    $logo = "serie.png";
                    $caption[0] = "Series Añadidas Recientemente de la categoria " . $categoriaactual->getName();
                    $seropel[0] = Seropel::categoriaactual($_GET["idCat"], 1);
                    $caption[1] = "Series Mejor Valoradas de la categoria " . $categoriaactual->getName();
                    $seropel[1] = Seropel::categoriamejor($_GET["idCat"], 1);
                } elseif ($_GET["tipo"] == 2) {
                    $logo = "pelicula.png";
                    $caption[0] = "Peliculas Añadidas Recientemente de la categoria " . $categoriaactual->getName();
                    $seropel[0] = Seropel::categoriaactual($_GET["idCat"], 2);
                    $caption[1] = "Peliculas Mejor Valoradas de la categoria " . $categoriaactual->getName();
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
                /**
                 * Carga la vista por ajax seropel
                 */
                require_once "view/ajax.seropel.php";
            } else {
                $success = 1;
                $msg = "No se ha encontrado la Categoria o el Tipo";
                /**
                 * Carga la vista por ajax seropel
                 */
                require_once "view/ajax.seropel.php";
            }
        } else {
            $success = 1;
            $msg = "No se ha encontrado la Categoria o el Tipo";
            /**
             * Carga la vista por ajax seropel
             */
            require_once "view/ajax.seropel.php";
        }
    }

    /**
     * Filtra las listas total o parcialmente por el titulo, pasado en una variable, y los carga por ajax
     */
    public static function buscar() {
        if (isset($_GET["buscar"])) {
            $categoria = Categoria::getAll();
            $caption[0] = "Series Añadidas Recientemente";
            $seropel[0] = Seropel::buscaractual($_GET["buscar"], 1);
            $caption[1] = "Series Mejor Valoradas";
            $seropel[1] = Seropel::buscarmejor($_GET["buscar"], 1);
            $caption[2] = "Peliculas Añadidas Recientemente";
            $seropel[2] = Seropel::buscaractual($_GET["buscar"], 2);
            $caption[3] = "Peliculas Mejor Valoradas";
            $seropel[3] = Seropel::buscarmejor($_GET["buscar"], 2);
            $cantseropel = count($seropel[0]) + count($seropel[2]);
            if ($cantseropel != 0) {
                $success = 0;
                $msg = "Se han encontrado " . $cantseropel . " resultados para la busqueda: " . $_GET["buscar"];
            } else {
                $success = 1;
                $msg = "No se han encontrado resultados para la busqueda: " . $_GET["buscar"];
            }
            /**
             * Carga la vista por ajax seropel
             */
            require_once "view/ajax.seropel.php";
        } else {
            $success = 1;
            $msg = "No se ha encontrado la Busqueda";
            /**
             * Carga la vista por ajax seropel
             */
            require_once "view/ajax.seropel.php";
        }
    }

    /**
     * Carga todos los comentarios por ajax
     */
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
            /**
             * Carga la vista por ajax comentario
             */
            require_once "view/ajax.comentario.php";
        } else {
            $success = 1;
            $msg = "No se ha encontrado los Comentarios";
            /**
             * Carga la vista por ajax comentario
             */
            require_once "view/ajax.comentario.php";
        }
    }

    /**
     * Filtra los comentarios por temporada y los carga por ajax
     */
    public static function comentariotemporada() {
        if (isset($_GET["idSeropel"]) && isset($_GET["season"])) {
            $episodio = Episodio::getSeropel($_GET["idSeropel"]);
            $comentarios = Comentario::comentarioTemporada($_GET["idSeropel"], $_GET["season"]);
            $cantcomentario = count($comentarios);
            if ($cantcomentario != 0) {
                $comentarios_title = " Todos los Comentarios de la Temporada " . $_GET["season"];
            } else {
                $comentarios_title = " No Hay Comentarios en la Temporada " . $_GET["season"];
            }
            /**
             * Carga la vista por ajax comentario
             */
            require_once "view/ajax.comentario.php";
        } else {
            $success = 1;
            $msg = "No se ha encontrado los Comentarios";
            /**
             * Carga la vista por ajax comentario
             */
            require_once "view/ajax.comentario.php";
        }
    }

    /**
     * Filtra los comentarios por episodio y los carga por ajax
     */
    public static function comentarioepisodio() {
        if (isset($_GET["idSeropel"]) && isset($_GET["season"]) && isset($_GET["episode"])) {
            $episodio = Episodio::getSeropel($_GET["idSeropel"]);
            $comentarios = Comentario::comentarioEpisodio($_GET["idSeropel"], $_GET["season"], $_GET["episode"]);
            $cantcomentario = count($comentarios);
            if ($cantcomentario != 0) {
                $comentarios_title = "Comentarios de la Temporada " . $_GET["season"] . " Episodio " . $_GET["episode"];
            } else {
                $comentarios_title = "No Hay Comentarios en la Temporada " . $_GET["season"] . " Episodio " . $_GET["episode"];
            }
            /**
             * Carga la vista por ajax comentario
             */
            require_once "view/ajax.comentario.php";
        } else {
            $success = 1;
            $msg = "No se ha encontrado los Comentarios";
            /**
             * Carga la vista por ajax comentario
             */
            require_once "view/ajax.comentario.php";
        }
    }

    /**
     * Carga el modal por ajax login
     */
    public static function login() {
        require_once "view/modal.login.php";
    }

    /**
     * Carga el modal por ajax signin
     */
    public static function signin() {
        if (isset($_SESSION["usuario"])) {
            if (isset($_GET["idCom"])) {
                $usuario = Usuario::getId($_GET["idCom"]);
            } else {
                $usuario = $_SESSION["usuario"];
            }
        }
        require_once "view/modal.signin.php";
    }

    /**
     * Carga el modal por ajax eliminarusuario
     */
    public static function eliminarusuario() {
        if (isset($_GET["idCom"])) {
            $idUsu = $_GET["idCom"];
        } else {
            $idUsu = "";
        }
        require_once "view/modal.eliminarusuario.php";
    }

    /**
     * Carga el modal por ajax usuario
     */
    public static function usuario() {
        $usuario = Usuario::getAll();
        require_once "view/modal.usuario.php";
    }

    /**
     * Carga el modal por ajax modificarseropel
     */
    public static function modificarseropel() {
        if (isset($_GET["idSeropel"])) {
            $detalle = Seropel::detalle($_GET["idSeropel"]);
        } else {
            $detalle = "";
        }
        $categoria = Categoria::getAll();
        require_once "view/modal.modificarseropel.php";
    }

    /**
     * Carga el modal por ajax eliminarseropel
     */
    public static function eliminarseropel() {
        if (isset($_GET["idSeropel"])) {
            $detalle = Seropel::detalle($_GET["idSeropel"]);
        } else {
            $detalle = "";
        }
        require_once "view/modal.eliminarseropel.php";
    }

    /**
     * Carga el modal por ajax modificarcom
     */
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

    /**
     * Carga el modal por ajax eliminarcom
     */
    public static function eliminarcom() {
        if (isset($_GET["idCom"])) {
            $idCom = $_GET["idCom"];
        } else {
            $idCom = "";
        }
        if (isset($_GET["idSeropel"])) {
            $detalle = Seropel::detalle($_GET["idSeropel"]);
        } else {
            $idSeropel = "";
        }
        require_once "view/modal.eliminarcom.php";
    }

    /**
     * Carga el modal por ajax eliminarepi
     */
    public static function eliminarepi() {
        if (isset($_GET["idCom"])) {
            $e = $_GET["idCom"];
        } else {
            $e = 0;
        }
        if (isset($_GET["idSeropel"])) {
            $detalle = Seropel::detalle($_GET["idSeropel"]);
        } else {
            $idSeropel = "";
        }
        require_once "view/modal.eliminarepi.php";
    }

}

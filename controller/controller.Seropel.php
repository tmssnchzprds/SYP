<?php

require_once "assets/inc/controller.init.inc";

class controllerSeropel implements controllerGenerico {

    private $sesion;

    public function __construct() {
        $this->sesion = new Sesion();
    }

    //CRUD
    public static function getAll() {
        $seropel = Seropel::getAll();
    }

    public static function getId() {
        if (isset($_GET["idSeropel"])) {
            $seropel = Seropel::getId($_GET["idSeropel"]);
            return $seropel;
        } else {
            $success = 1;
            $msg = "No se ha podido obtener el registro se ha producido un error";
        }
    }

    public function insert() {
        if (isset($_POST["idCat"]) && ($_POST["tipo"]) && ($_POST["title"]) && ($_POST["description"]) && ($_POST["cover"]) && ($_POST["date"])) {
            $seropel = new Seropel();
            $seropel->setIdCat($_POST["idCat"]);
            $seropel->setTipo($_POST["tipo"]);
            $seropel->setTitle($_POST["title"]);
            $seropel->setDescription($_POST["description"]);
            $seropel->setCover($_POST["cover"]);
            $seropel->setDate($_POST["date"]);
            $seropel->insert();
            $success = 0;
            $msg = "Se ha creado el registro correctamente";
        } else {
            $success = 1;
            $msg = "No se ha podido crear el registro se ha producido un error";
        }
        $seropel = [];
        require_once "assets/inc/controller.listatotal.inc";
    }

    public function update() {
        if (isset($_POST["idSeropel"])) {
            $seropel = Seropel::getId($_POST["idSeropel"]);
            if (isset($_POST["idCat"]) && ($_POST["tipo"]) && ($_POST["title"]) && ($_POST["description"]) && ($_POST["cover"]) && ($_POST["date"])) {
                $seropel->setIdCat($_POST["idCat"]);
                $seropel->setTipo($_POST["tipo"]);
                $seropel->setTitle($_POST["title"]);
                $seropel->setDescription($_POST["description"]);
                $seropel->setCover($_POST["cover"]);
                $seropel->setDate($_POST["date"]);
                $seropel->update();
                $success = 0;
                $msg = "Se ha actualizado el registro correctamente.";
            } else {
                $success = 1;
                $msg = "No se ha podido actualizar el registro se ha producido un error";
            }
            require_once "assets/inc/controller.detalle.inc";
        } else {
            $success = 1;
            $msg = "No se ha podido actualizar el registro se ha producido un error";
            require_once "assets/inc/controller.listatotal.inc";
        }
    }

    public function delete() {
        if (isset($_POST["idSeropel"])) {
            Seropel::delete($_POST["idSeropel"]);
            $success = 0;
            $msg = "Se ha eliminado el registro correctamente";
        } else {
            $success = 1;
            $msg = "No se ha podido eliminar el registro se ha producido un error";
        }
        require_once "assets/inc/controller.listatotal.inc";
    }

    public static function listaTotal() {
        require_once "assets/inc/controller.listatotal.inc";
    }

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
                require_once "view/show.seropel.php";
            } else {
                $success = 1;
                $msg = "No se ha encontrado el Tipo";
                require_once "assets/inc/controller.listatotal.inc";
            }
        } else {
            $success = 1;
            $msg = "No se ha encontrado el Tipo";
            require_once "assets/inc/controller.listatotal.inc";
        }
    }

    public static function milista() {
        if (isset($_SESSION["usuario"])) {
            $logo = "milista.png";
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
            $cantseropel = count($seropel[0]) + count($seropel[2]) + count($seropel[4]) + count($seropel[6]) + count($seropel[8]);
            if ($cantseropel != 0) {
                $success = 0;
                $msg = "Se han encontrado " . $cantseropel . " resultados";
            } else {
                $success = 1;
                $msg = "No se han encontrado resultados para la busqueda";
            }
            require_once "view/show.seropel.php";
        } else {
            $success = 1;
            $msg = "No se ha encontrado el Usuario";
            require_once "assets/inc/controller.listatotal.inc";
        }
    }

    public static function milistaser() {
        $categoria = Categoria::getAll();
        if (isset($_SESSION["usuario"])) {
            $logo = "miserie.png";
            if (isset($_GET["estado"])) {
                $logo = "serie.png";
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
                    $cantseropel = count($seropel[0]);
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
                    $cantseropel = count($seropel[0]) + count($seropel[2]) + count($seropel[4]);
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
                $cantseropel = count($seropel[0]) + count($seropel[2]) + count($seropel[4]);
            }
            if ($cantseropel != 0) {
                $success = 0;
                $msg = "Se han encontrado " . $cantseropel . " resultados";
            } else {
                $success = 1;
                $msg = "No se han encontrado resultados para la busqueda";
            }
            require_once "view/show.seropel.php";
        } else {
            $success = 1;
            $msg = "No se ha encontrado el Usuario";
            require_once "assets/inc/controller.listatotal.inc";
        }
    }

    public static function milistapel() {
        $categoria = Categoria::getAll();
        if (isset($_SESSION["usuario"])) {
            $logo = "mipelicula.png";
            if (isset($_GET["estado"])) {
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
                    $cantseropel = count($seropel[0]);
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
                    $cantseropel = count($seropel[0]) + count($seropel[2]);
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
                $cantseropel = count($seropel[0]) + count($seropel[2]);
            }
            if ($cantseropel != 0) {
                $success = 0;
                $msg = "Se han encontrado " . $cantseropel . " resultados";
            } else {
                $success = 1;
                $msg = "No se han encontrado resultados para la busqueda";
            }
            require_once "view/show.seropel.php";
        } else {
            $success = 1;
            $msg = "No se ha encontrado el Usuario";
            require_once "assets/inc/controller.listatotal.inc";
        }
    }

    public static function categoria() {
        if (isset($_GET["idCat"]) && isset($_GET["tipo"])) {
            $categoria = Categoria::getAll();
            if ($_GET["idCat"] <= count($categoria) && $_GET["tipo"] == 1 || $_GET["tipo"] == 2) {
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
                require_once "view/show.seropel.php";
            } else {
                $success = 1;
                $msg = "No se ha encontrado la Categoria o el Tipo";
                require_once "assets/inc/controller.listatotal.inc";
            }
        } else {
            $success = 1;
            $msg = "No se ha encontrado la Categoria o el Tipo";
            require_once "assets/inc/controller.listatotal.inc";
        }
    }

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
            require_once "view/show.seropel.php";
        } else {
            $success = 1;
            $msg = "No se ha encontrado la Busqueda";
            require_once "assets/inc/controller.listatotal.inc";
        }
    }

    public static function detalle() {
        require_once "assets/inc/controller.detalle.inc";
    }

}

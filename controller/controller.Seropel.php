<?php

require_once "controller/controller.Generico.php";
require_once "model/Seropel.php";
require_once "model/Categoria.php";
require_once "model/Episodio.php";
require_once "model/Comentario.php";
require_once "model/Sesion.php";

class controllerSeropel implements controllerGenerico {

    private $sesion;

    public function __construct() {
        $this->sesion = new Sesion();
    }

    //CRUD
    public static function getAll() {
        $seropel = Seropel::getAll();
        require_once "view/show.seropel.php";
    }

    public static function getId() {
        if (isset($_POST["idSeropel"])) {
            $seropel = Seropel::getId($_POST["idSeropel"]);
            require_once "view/showById.seropel.php";
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
                $msg = "Se ha actualizado el registro correctamente";
            } else {
                $success = 1;
                $msg = "No se ha podido actualizar el registro se ha producido un error";
            }
        } else {
            $success = 1;
            $msg = "No se ha podido actualizar el registro se ha producido un error";
        }
        $seropel = Seropel::listaTotal();
        $categoria = Categoria::getAll();
        $cantseropel = count($seropel);
        require_once "view/show.seropel.php";
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
        $seropel = Seropel::listaTotal();
        $categoria = Categoria::getAll();
        $cantseropel = count($seropel);
        require_once "view/show.seropel.php";
    }

    public static function listaTotal() {
        $seropel[0] = Seropel::listaactual(1);
        $seropel[1] = Seropel::listamejor(1);
        $seropel[2] = Seropel::listaactual(2);
        $seropel[3] = Seropel::listamejor(2);
        $categoria = Categoria::getAll();
        require_once "view/show.seropel.php";
    }

    public static function lista() {
        if (isset($_GET["tipo"])) {
            if ($_GET["tipo"] == 1 || $_GET["tipo"] == 2) {
                $seropel[0] = Seropel::listaactual($_GET["tipo"]);
                $seropel[1] = Seropel::listamejor($_GET["tipo"]);
                $categoria = Categoria::getAll();
                $cantseropel = count($seropel[0]);
                if ($_GET["tipo"] == 1)
                    $logo = "serie.png";
                elseif ($_GET["tipo"] == 2)
                    $logo = "pelicula.png";
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
        $seropel[0] = Seropel::listaactual(1);
        $seropel[1] = Seropel::listamejor(1);
        $seropel[2] = Seropel::listaactual(2);
        $seropel[3] = Seropel::listamejor(2);
        $categoria = Categoria::getAll();
        require_once "view/show.seropel.php";            }
        } else {
            $success = 1;
            $msg = "No se ha encontrado el Tipo";
        $seropel[0] = Seropel::listaactual(1);
        $seropel[1] = Seropel::listamejor(1);
        $seropel[2] = Seropel::listaactual(2);
        $seropel[3] = Seropel::listamejor(2);
        $categoria = Categoria::getAll();
        require_once "view/show.seropel.php";        }
    }

    public static function categoria() {
        if (isset($_GET["idCat"]) && isset($_GET["tipo"])) {
            $categoria = Categoria::getAll();
            if ($_GET["idCat"] < count($categoria) && $_GET["tipo"] == 1 || $_GET["tipo"] == 2) {
                $seropel[0] = Seropel::categoriaactual($_GET["idCat"], $_GET["tipo"]);
                $seropel[1] = Seropel::categoriamejor($_GET["idCat"], $_GET["tipo"]);
                $cantseropel = count($seropel[0]);
                if ($_GET["tipo"] == 1)
                    $logo = "serie.png";
                elseif ($_GET["tipo"] == 2)
                    $logo = "pelicula.png";
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
        $seropel[0] = Seropel::listaactual(1);
        $seropel[1] = Seropel::listamejor(1);
        $seropel[2] = Seropel::listaactual(2);
        $seropel[3] = Seropel::listamejor(2);
        $categoria = Categoria::getAll();
        require_once "view/show.seropel.php";            }
        } else {
            $success = 1;
            $msg = "No se ha encontrado la Categoria o el Tipo";
        $seropel[0] = Seropel::listaactual(1);
        $seropel[1] = Seropel::listamejor(1);
        $seropel[2] = Seropel::listaactual(2);
        $seropel[3] = Seropel::listamejor(2);
        $categoria = Categoria::getAll();
        require_once "view/show.seropel.php";        }
    }

    public static function detalle() {
        if (isset($_GET["idSeropel"])) {
            $detalle = Seropel::detalle($_GET["idSeropel"]);
            $categoria = Categoria::getAll();
            $comentario = Comentario::comentario($_GET["idSeropel"]);
            $episodio = Episodio::getSeropel($_GET["idSeropel"]);
            require_once "view/show.detalle.php";
        } else {
            $success = 1;
            $msg = "No se ha encontrado la Serie o Pelicula";
        $seropel[0] = Seropel::listaactual(1);
        $seropel[1] = Seropel::listamejor(1);
        $seropel[2] = Seropel::listaactual(2);
        $seropel[3] = Seropel::listamejor(2);
        $categoria = Categoria::getAll();
        require_once "view/show.seropel.php";
        }
    }

    public static function cambiar() {
        if (isset($_GET["idSeropel"])) {
            $seropel = Seropel::getId($_GET["idSeropel"]);
        } else {
            $seropel = "";
        }
        $categoria = Categoria::getAll();
        require_once "view/change.seropel.php";
    }

}

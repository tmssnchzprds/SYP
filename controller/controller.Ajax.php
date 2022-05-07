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
        $seropel[0] = Seropel::listaactual(1);
        $seropel[1] = Seropel::listamejor(1);
        $seropel[2] = Seropel::listaactual(2);
        $seropel[3] = Seropel::listamejor(2);
        $categoria = Categoria::getAll();
        require_once "view/ajax.seropel.php";
    }

    public static function lista() {
        if (isset($_GET["tipo"])) {
            if ($_GET["tipo"] == 1 || $_GET["tipo"] == 2) {
                $seropel[0] = Seropel::listaactual($_GET["tipo"]);
                $seropel[1] = Seropel::listamejor($_GET["tipo"]);
                $categoria = Categoria::getAll();
                require_once "view/ajax.seropel.php";
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
                require_once "view/ajax.seropel.php";
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
}
<?php
    if (isset($_GET["idSeropel"])) {
        $idSeropel=$_GET["idSeropel"];
    }
        
    if (isset($_POST["idSeropel"])) {
        $idSeropel=$_POST["idSeropel"];
    }        
            if (isset($idSeropel)) {
            $detalle = Seropel::detalle($idSeropel);
            if ($detalle->getTipo()==1)
            $logo = "dserie.png";
            if ($detalle->getTipo()==2)
            $logo = "dpelicula.png";
            if (isset($_SESSION["usuario"])){
                
               $puntuacion = Puntuacion::getPuntuacion($idSeropel,$_SESSION["usuario"]->idUsu);
            }
            $categoria = Categoria::getAll();
            $comentarios = Comentario::comentarioSeropel($idSeropel);
            $cantcomentario = count($comentarios);
                if ($cantcomentario != 0) {
                    $comentarios_title = " Todos los Comentarios";
                } else {
                    $comentarios_title = " No hay Comentarios";
                }
            $episodio = Episodio::getSeropel($idSeropel);
            require_once "view/show.detalle.php";
        } else {
            $success = 1;
            $msg = "No se ha encontrado la Serie o Pelicula";
            require_once "assets/inc/controller.listatotal.inc";
        }
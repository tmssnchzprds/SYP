<?php

require_once "model/ListaPelicula.php" ;

class controllerList{

    public function __construct(){}

    public function create(){
        if(isset($_POST["idUsu"])):
            $list = new ListaPelicula();
            $list->setIdUsu($_POST["idUsu"]) ;
            $list->setIdpel($_POST["idpel"]) ;

            $list->insert() ;
            session_start(); $_SESSION["mod"]="pelicula"; $_SESSION["ope"]="pelicula"; header("Location: index.php");
        else:
            require_once "view/pelicula.php" ;
        endif;
    }

}

?>
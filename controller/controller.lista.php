<?php

require_once "model/ListaSerie.php" ;

class controllerLista{

    public function __construct(){}

    public function create(){
        if(isset($_POST["idUsu"])):
            $lista = new ListaSerie();
            $lista->setIdUsu($_POST["idUsu"]) ;
            $lista->setIdser($_POST["idser"]) ;

            $lista->insert() ;
            session_start(); $_SESSION["mod"]="serie"; $_SESSION["ope"]="serie"; header("Location: index.php");
        else:
            require_once "view/serie.php" ;
        endif;
    }    
    
}

?>
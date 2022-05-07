<?php

require_once "model/ComentarioSerie.php" ;

class controllerComenSerie{

    public function __construct(){}

    public function create(){
        if(isset($_POST["idUsu"])):
            $comen = new ComentarioSerie();
            $comen->setIdUsu($_POST["idUsu"]) ;
            $comen->setIdser($_POST["idser"]) ;
            $comen->setCommentary($_POST["commentary"]);

            $comen->insert() ;
            session_start(); $_SESSION["mod"]="serie"; $_SESSION["ope"]="serie"; header("Location: index.php");
        else:
            // require_once "view/show.serie.php" ;
        endif;
    }    
    
}

?>
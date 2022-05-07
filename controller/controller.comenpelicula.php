<?php

require_once "model/ComentarioPelicula.php" ;

class controllerComenPelicula{

    public function __construct(){}

    public function create(){
        if(isset($_POST["idUsu"])):
            $comen = new ComentarioPelicula();
            $comen->setIdUsu($_POST["idUsu"]) ;
            $comen->setIdpel($_POST["idpel"]) ;
            $comen->setCommentary($_POST["commentary"]);

            $comen->insert() ;
            session_start(); $_SESSION["mod"]="pelicula"; $_SESSION["ope"]="pelicula"; header("Location: index.php");
        else:
            // require_once "view/show.serie.php" ;
        endif;
    }    
    
}

?>
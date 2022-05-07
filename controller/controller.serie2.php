<?php
require_once "model/Serie.php" ;
require_once "model/Sesion.php" ;
require_once "model/ComentarioSerie.php" ;
require_once "model/User.php" ;

class controllerSerie{

    private $sesion;

    public function __construct(){
        
    }

        public function index(){

            $datos = Serie::getAllSerie() ;
            require_once "view/index.serie.php" ;
        }

        public function serie(){
            $datos = Serie::getAllSerie() ;
            
            require_once "view/serie.php" ;
        }

        public function admin(){

            $datos = Serie::getAllSerie() ;
            require_once "view/admin.serie.php" ;
        }

       /* public function serie(){
            $datos = Serie::getAllSerie() ;
            require_once "view/serie.serie.php" ;
        }*/

        public function pelicula(){
            $datos = Serie::getAllPelicula() ;
            require_once "view/serie.pelicula.php" ;
        }

        public function ova(){
            $datos = Serie::getAllOva() ;
            require_once "view/serie.ova.php" ;
        }

        public function show(){
            $datos = Serie::getSerieId($_POST["idser"]);

            $valor = ComentarioSerie::allSerieComen($_POST["idser"]);

            require_once "view/show.serie.php";
        }

        public function create()
        {
            if(isset($_POST["name"])):
                $serie = new Serie();
                $serie->setName($_POST["name"]) ;
                $serie->setEpisode($_POST["episode"]) ;
                $serie->setCategory($_POST["category"]) ;
                $serie->setDescription($_POST["description"]) ;
                $serie->setStart_Date($_POST["start_date"]) ;
                $serie->setCover($_POST["cover"]) ;

                $serie->insert() ;
                session_start(); $_SESSION["mod"]="serie"; $_SESSION["ope"]="admin"; header("location: index.php") ;
            else:
                require_once "view/create.serie.php" ;
            endif;
        }

        public function delete(){
			if (isset($_POST["idser"])) {
				Serie::delete($_POST["idser"]) ;

				session_start(); $_SESSION["mod"]="serie"; $_SESSION["ope"]="admin"; header("Location: index.php");
			} else {
				session_start(); $_SESSION["mod"]="serie"; $_SESSION["ope"]="admin"; header("Location: index.php");
			}
        }
        
        public function update(){
			
			$idser = $_POST["idser"] ?? "" ;

			if (!empty($idser)) {

				$serie = Serie::getSerie($idser) ;

				if (isset($_POST["name"])) {

                    $serie->setName($_POST["name"]) ;
                    $serie->setEpisode($_POST["episode"]) ;
                    $serie->setCategory($_POST["category"]) ;
                    $serie->setDescription($_POST["description"]) ;
                    $serie->setCover($_POST["cover"]) ;

					$serie->update() ;

					session_start(); $_SESSION["mod"]="serie"; $_SESSION["ope"]="admin"; header("Location: index.php");

				} else {
					//
                    $name = $serie->getName() ;
                    $episode = $serie->getEpisode() ;
                    $category = $serie->getCategory() ;
                    $description = $serie->getDescription() ;
                    $cover = $serie->getCover() ;

					require_once "view/update.serie.php" ;
				}

			} else {
				//
				session_start(); $_SESSION["mod"]="serie"; $_SESSION["ope"]="admin"; header("Location: index.php");
			}
		}
       
}
?>
<?php
require_once "model/Pelicula.php" ;
require_once "model/Sesion.php" ;
require_once "model/ComentarioPelicula.php" ;
require_once "model/User.php" ;


class controllerPelicula{

    private $sesion;

    public function __construct(){
        
    }

        public function index(){

            $datos = Pelicula::getAllPelicula() ;
            require_once "view/index.pelicula.php" ;
        }

        public function pelicula(){
            $datos = Pelicula::getAllPelicula() ;

            require_once "view/pelicula.php" ;
        }

        public function admin(){
            $datos = Pelicula::getAllPelicula() ;
            require_once "view/admin.pelicula.php" ;
        }

        public function show(){
            $datos = Pelicula::getPeliculaId($_POST["idpel"]);

            $valor = ComentarioPelicula::allPeliculaComen($_POST["idpel"]);

            require_once "view/show.pelicula.php";
        }

        public function create()
        {
            if(isset($_POST["title"])):
                $pelicula = new Pelicula();
                $pelicula->setTitle($_POST["title"]) ;
                $pelicula->setEpisode($_POST["episode"]) ;
                $pelicula->setDescription($_POST["description"]) ;
                $pelicula->setCover($_POST["cover"]) ;

                $pelicula->insert() ;
                session_start(); $_SESSION["mod"]="pelicula"; $_SESSION["ope"]="admin"; header("location: index.php") ;
            else:
                require_once "view/create.pelicula.php" ;
            endif;
        }

        public function delete(){
			if (isset($_POST["idpel"])) {
				Pelicula::delete($_POST["idpel"]) ;

				session_start(); $_SESSION["mod"]="pelicula"; $_SESSION["ope"]="admin"; header("Location: index.php");
			} else {
				session_start(); $_SESSION["mod"]="pelicula"; $_SESSION["ope"]="admin"; header("Location: index.php");
			}
        }
        
        public function update(){
			
			$idpel = $_POST["idpel"] ?? "" ;

			if (!empty($idpel)) {

				$pelicula = Pelicula::getPelicula($idpel) ;

				if (isset($_POST["title"])) {

                    $pelicula->setTitle($_POST["title"]) ;
                    $pelicula->setEpisode($_POST["episode"]) ;
                    $pelicula->setDescription($_POST["description"]) ;
                    $pelicula->setCover($_POST["cover"]) ;

					$pelicula->update() ;

					session_start(); $_SESSION["mod"]="pelicula"; $_SESSION["ope"]="admin"; header("Location: index.php");

				} else {
					//
                    $title = $pelicula->getTitle() ;
                    $episode = $pelicula->getEpisode() ;
                    $description = $pelicula->getDescription() ;
                    $cover = $pelicula->getCover() ;

					require_once "view/update.pelicula.php" ;
				}

			} else {
				//
				session_start(); $_SESSION["mod"]="pelicula"; $_SESSION["ope"]="index"; header("Location: index.php");
			}
		}
       
}
?>
<?php

require_once "model/User.php" ;
require_once "model/Sesion.php" ;

    class controllerUser{

        private $sesion;

        public function __construct(){
            $this->sesion = new Sesion() ;
        }
        
        public function sigin(){
        
            if(isset($_SESSION["email"])){
                session_start(); $_SESSION["mod"]="serie"; $_SESSION["ope"]="serie"; header("Location: index.php");
            }
            
            if($_SERVER["REQUEST_METHOD"] == "GET" || $_SERVER["REQUEST_METHOD"] == "POST") {

                if(isset($_GET["email"]) && isset($_GET["password"])){
                    $email   = $_GET["email"];
                    $password = md5($_GET["password"]);
                }
                if(isset($_POST["email"]) && isset($_POST["password"])){
                    $email   = $_POST["email"];
                    $password = md5($_POST["password"]);
                }
                if(isset($_GET["email"]) && isset($_GET["password"])||isset($_POST["email"]) && isset($_POST["password"])){
                    $db = Database::getInstance();

                    $db->doQuery("SELECT * FROM usuario WHERE email=:email AND password=:password",
                        [":email" => $email,
                        ":password" => $password]);
            
                    $resultado = $db->getRow();
                    $this->sesion->init();
                    
                    if ($resultado) {
                        $_SESSION["email"]=$email;
                        $_SESSION["idUsu"]=$resultado->idUsu;
                        if($resultado->type==0){
                            session_start(); $_SESSION["mod"]="serie"; $_SESSION["ope"]="admin"; header("Location: index.php");
                        }else {
                            session_start(); $_SESSION["mod"]="serie"; $_SESSION["ope"]="serie"; header("Location: index.php");
                        }
                        
                    }else{
                        require_once "view/login.php";
                        echo "El nombre o la contraseña no es correcta";
                    
                    }
                } else{
                    require_once "view/login.php";
                }
            }
        }

        public function logout(){
            session_start();
            session_unset();
            session_start(); $_SESSION["mod"]="serie"; $_SESSION["ope"]="index"; header("Location: index.php") ;
        }

        public function create()
        {
            if(isset($_POST["name"])):
                $usuario = new User();
                $usuario->setName($_POST["name"]) ;
                $usuario->setPassword(md5($_POST["password"])) ;
                $usuario->setEmail($_POST["email"]) ;

                $usuario->insert() ;
                session_start(); $_SESSION["mod"]="serie"; $_SESSION["ope"]="index"; header("location: index.php") ;
            else:
                require_once "view/create.user.php" ;
            endif;
        }

        public function showSerie(){

            $datos = User::serieForUser($_POST["idUsu"]);

            require_once "view/show.listaserie.php";
        }

        public function showPelicula(){

            $datos = User::peliculaForUser($_POST["idUsu"]);

            require_once "view/show.listapelicula.php";
        }

        public static function deleteAni(){
			if (isset($_POST["idser"])) {
				User::deleteAni($_POST["idser"]) ;

				session_start(); $_SESSION["mod"]="serie"; $_SESSION["ope"]="serie"; header("Location: index.php");
			} else {
				session_start(); $_SESSION["mod"]="serie"; $_SESSION["ope"]="serie"; header("Location: index.php");
			}
        }

        public static function deleteMan(){
			if (isset($_POST["idpel"])) {
				User::deleteMan($_POST["idpel"]) ;

				session_start(); $_SESSION["mod"]="pelicula"; $_SESSION["ope"]="pelicula"; header("Location: index.php");
			} else {
				session_start(); $_SESSION["mod"]="pelicula"; $_SESSION["ope"]="pelicula"; header("Location: index.php");
			}
        }
    }
?>
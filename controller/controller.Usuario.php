<?php
require_once "controller/controller.Generico.php" ;
require_once "model/Usuario.php" ;
require_once "model/Seropel.php" ;
require_once "model/Categoria.php" ;
require_once "model/Sesion.php" ;

class controllerUsuario implements controllerGenerico{

    private $sesion;

    public function __construct(){
        $this->sesion = new Sesion() ;
    }
    
    //CRUD
    public static function getAll(){
        $usuario = Usuario::getAll() ;
        require_once "view/show.Usuario.php" ;
    }
    public static function getId(){
	if (isset($_POST["idUsu"])) {
            $usuario = Usuario::getId($_POST["idUsu"]) ;
            require_once "view/showById.Usuario.php" ;
	} else {
            $this->failure() ;
	}
    }
    public function insert(){
        if(isset($_POST["name"])&&($_POST["password"])&&($_POST["email"])&&($_POST["type"])) {
            $usuario = new Usuario();
            $usuario->setName($_POST["name"]) ;
            $usuario->setPassword($_POST["password"]) ;
            $usuario->setEmail($_POST["email"]) ;
            $usuario->setType($_POST["type"]) ;
            $usuario->insert() ;
            $this->success() ;
        } else {
            $this->failure() ;
        }
    }
    public function update(){
	if (isset($_POST["idUsu"])) {
            $usuario = Usuario::getId($_POST["idUsu"]) ;
            if (isset($_POST["name"])&&($_POST["password"])&&($_POST["email"])&&($_POST["type"])) {
                $usuario->setName($_POST["name"]) ;
                $usuario->setPassword($_POST["password"]) ;
                $usuario->setEmail($_POST["email"]) ;
                $usuario->setType($_POST["type"]) ;
                $usuario->update() ;
                $this->success() ;
            } else {
                $this->failure() ;
            }
        } else {
            $this->failure() ;
        }
        
    }
    public function delete(){
        if (isset($_POST["idUsu"])) {
            Usuario::delete($_POST["idUsu"]) ;
            $this->success() ;
	} else {
            $this->failure() ;
	}
    }
public function signin(){
        
            if(isset($_SESSION["email"])){
            $success=1;
            $msg="Ya tiene iniciada una sesión, cierrela para iniciar otra";
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
                        $_SESSION["usuario"]=$resultado;
                        $success=0;
            $msg="Ha iniciado sesion correctamente con el usuario: ".$_SESSION["usuario"]->name;

                    }else{
            $success=1;
            $msg="El nombre o la contraseña no es correcta";

                    }
                } else{
            $success=1;
            $msg="No se ha introducido usuario y contraseña";
              }
            } else {
                $success=1;
            $msg="No se ha introducido usuario y contraseña";
            }
        $seropel[0] = Seropel::listaactual(1) ;
        $seropel[1] = Seropel::listamejor(1) ;
        $seropel[2] = Seropel::listaactual(2) ;
        $seropel[3] = Seropel::listamejor(2) ;
        $categoria = Categoria::getAll() ;
        require_once "view/show.seropel.php" ;
        }
        
        public function logout(){
            session_start();
            session_unset();
            $success=0;
            $msg="Se ha cerrado la sesion correctamente";
        $seropel[0] = Seropel::listaactual(1) ;
        $seropel[1] = Seropel::listamejor(1) ;
        $seropel[2] = Seropel::listaactual(2) ;
        $seropel[3] = Seropel::listamejor(2) ;
        $categoria = Categoria::getAll() ;
        require_once "view/show.seropel.php" ;
        }
}

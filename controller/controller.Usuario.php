<?php

/**
 * Interfaz de los controladores, Beans, y control de la Sesion
 */
require_once "assets/inc/controller.init.inc";

/**
 * Controla las operaciones relaccionadas con la clase Usuario
 */
class controllerUsuario implements controllerGenerico {

    private $sesion;

    /**
     * Constructor crea una nueva sesion
     */
    public function __construct() {
        $this->sesion = new Sesion();
    }

    //CRUD
    /**
     * Controla la obtencion de todos los registros de la tabla usuario
     */
    public static function getAll() {
        $usuario = Usuario::getAll();
    }

    /**
     * Controla la obtencion del registro de la tabla usuario que tiene el id que llega en una variable
     */
    public static function getId() {
        if (isset($_GET["idUsu"])) {
            $usuario = Usuario::getId($_GET["idUsu"]);
            return $usuario;
        } else {
            $success = 1;
            $msg = "No se ha podido obtener el registro se ha producido un error";
        }
    }

    /**
     * Controla la insercion de un Registro en la tabla usuario
     */
    public function insert() {
        if (isset($_POST["name"]) && ($_POST["password"]) && ($_POST["email"]) && ($_POST["type"])) {
            $usuario = new Usuario();
            $usuario->setName($_POST["name"]);
            $usuario->setPassword(md5($_POST["password"]));
            $usuario->setEmail($_POST["email"]);
            $usuario->setType($_POST["type"]);
            $usuario->insert();
            $success = 0;
            $msg = "Se ha creado el usuario correctamente";
        } else {
            $success = 1;
            $msg = "No se ha podido crear el usuario se ha producido un error";
        }
        /**
         * Controla las listas de Inicio
         */
        require_once "assets/inc/controller.listatotal.inc";
    }

    /**
     * Controla la actualizacion de un Registro en la tabla usuario
     */
    public function update() {
        if (isset($_POST["idUsu"])) {
            $usuario = Usuario::getId($_POST["idUsu"]);
            if (isset($_POST["name"]) && ($_POST["password"]) && ($_POST["email"]) && ($_POST["type"])) {
                $usuario->setName($_POST["name"]);
                $usuario->setPassword(md5($_POST["password"]));
                $usuario->setEmail($_POST["email"]);
                $usuario->setType($_POST["type"]);
                $usuario->update();
                $success = 0;
                $msg = "Se ha modificado el usuario correctamente";
            } else {
                $success = 1;
                $msg = "No se ha podido modificar el usuario se ha producido un error";
            }
        } else {
            $success = 1;
            $msg = "No se ha podido modificar el usuario se ha producido un error";
        }
        /**
         * Controla las listas de Inicio
         */
        require_once "assets/inc/controller.listatotal.inc";
    }

    /**
     * Controla la eliminacion del registro de la tabla usuario que tiene el id que llega en una variable
     */
    public function delete() {
        if (isset($_POST["idUsu"])) {
            Usuario::delete($_POST["idUsu"]);
            $success = 0;
            $msg = "Se ha eliminado el comentario correctamente";
        } else {
            $success = 1;
            $msg = "No se ha podido eliminar el comentario se ha producido un error";
        }
        /**
         * Controla las listas de Inicio
         */
        require_once "assets/inc/controller.listatotal.inc";
    }

    /**
     * Controla el logueo en la aplicacion
     */
    public function signin() {
        if (isset($_SESSION["usuario"])) {
            $success = 1;
            $msg = "Ya tiene iniciada una sesión, cierrela para iniciar otra";
        }
        if ($_SERVER["REQUEST_METHOD"] == "GET" || $_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_GET["email"]) && isset($_GET["password"])) {
                $email = $_GET["email"];
                $password = md5($_GET["password"]);
            }
            if (isset($_POST["email"]) && isset($_POST["password"])) {
                $email = $_POST["email"];
                $password = md5($_POST["password"]);
            }
            if (isset($_GET["email"]) && isset($_GET["password"]) || isset($_POST["email"]) && isset($_POST["password"])) {
                $db = Database::getInstance();
                $db->doQuery("SELECT * FROM usuario WHERE email=:email AND password=:password",
                        [":email" => $email,
                            ":password" => $password]);

                $resultado = $db->getRow();
                $this->sesion->init();

                if ($resultado) {
                    $_SESSION["usuario"] = $resultado;
                    $success = 0;
                    $msg = "Ha iniciado sesion correctamente con el usuario: " . $_SESSION["usuario"]->name;
                } else {
                    $success = 1;
                    $msg = "El nombre o la contraseña no es correcta";
                }
            } else {
                $success = 1;
                $msg = "No se ha introducido usuario y contraseña";
            }
        } else {
            $success = 1;
            $msg = "No se ha introducido usuario y contraseña";
        }
        /**
         * Controla las listas de Inicio
         */
        require_once "assets/inc/controller.listatotal.inc";
    }

    /**
     * Cierra la sesion abierta
     */
    public function logout() {
        session_start();
        session_unset();
        $success = 0;
        $msg = "Se ha cerrado la sesion correctamente";
        /**
         * Controla las listas de Inicio
         */
        require_once "assets/inc/controller.listatotal.inc";
    }

    /**
     * Controla la actualizacion del tipo de todos los Registros en la tabla usuario
     */
    public function updatetype() {
        if (isset($_POST["idUsu"]) && isset($_POST["type"])) {
            foreach (array_combine($_POST["idUsu"], $_POST["type"]) as $idUsu => $type) {
                $usuario = Usuario::getId($idUsu);
                $usuario->setType($type);
                $usuario->update();
            }
            $success = 0;
            $msg = "Se ha modificado los usuarios correctamente";
        } else {
            $success = 1;
            $msg = "No se ha podido modificar el usuario se ha producido un error";
        }
        /**
         * Controla las listas de Inicio
         */
        require_once "assets/inc/controller.listatotal.inc";
    }

}

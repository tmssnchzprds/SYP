<?php

/**
 * Controla la conexión con la Base de Datos
 */
require_once "model/Database.php";
/**
 * Interfaz de los Beans
 */
require_once "model/Generico.php";

/**
 * Contiene los metodos que realizan las operaciones necesarias en la tabla usuario
 */
class Usuario implements Generico {

    private $idUsu;
    private $name;
    private $password;
    private $email;
    private $type;

    public function __construct() {
        
    }

    //SETTER
    public function setIdUsu($dta) {
        $this->idUsu = $dta;
    }

    public function setName($dta) {
        $this->name = $dta;
    }

    public function setPassword($dta) {
        $this->password = $dta;
    }

    public function setEmail($dta) {
        $this->email = $dta;
    }

    public function setType($dta) {
        $this->type = $dta;
    }

    //GETTER
    public function getIdUsu() {
        return $this->idUsu;
    }

    public function getName() {
        return $this->name;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getType() {
        return $this->type;
    }

    //CRUD
    /**
     * Obtiene todos los registros de la tabla usuario
     */
    public static function getAll() {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT * FROM usuario;");

        $datos = [];

        while ($item = $bd->getRow("Usuario")) {
            array_push($datos, $item);
        }

        return $datos;
    }

    /**
     * Obtiene el registro en la tabla usuario que tiene el id indicado como parametro
     * @param type $id
     */
    public static function getId($idUsu) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT * FROM usuario WHERE idUsu=:idUsu ;",
                [":idUsu" => $idUsu]);

        return $bd->getRow("Usuario");
    }

    /**
     * Inserta un Registro en la tabla usuario
     */
    public function insert() {
        $bd = Database::getInstance();
        $bd->doQuery("INSERT INTO usuario (name, password, email, type) VALUES (:name, :password, :email, :type);",
                [":name" => $this->name,
                    ":password" => $this->password,
                    ":email" => $this->email,
                    ":type" => $this->type]);
    }

    /**
     * Actualiza un Registro en la tabla usuario
     */
    public function update() {
        $bd = Database::getInstance();
        $bd->doQuery("UPDATE usuario SET name=:name, password=:password, email=:email, type=:type WHERE idUsu=:idUsu ;",
                [":name" => $this->name,
                    ":password" => $this->password,
                    ":email" => $this->email,
                    ":type" => $this->type,
                    ":idUsu" => $this->idUsu]);
    }

    /**
     * Elimina el registro de la tabla usuario que tiene el id indicado como parametro
     * @param type $id
     */
    public function delete($idUsu) {
        $bd = Database::getInstance();
        $bd->doQuery("DELETE FROM usuario WHERE idUsu=:idUsu ;",
                [":idUsu" => $idUsu]);
    }

}

?>
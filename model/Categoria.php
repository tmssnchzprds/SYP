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
 * Contiene los metodos que realizan las operaciones necesarias en la tabla categoria
 */
class Categoria implements Generico {

    private $idCat;
    private $name;

    public function __construct() {
        
    }

    //SETTER
    public function setIdCat($dta) {
        $this->idCat = $dta;
    }

    public function setName($dta) {
        $this->name = $dta;
    }

    //GETTER
    public function getIdCat() {
        return $this->idCat;
    }

    public function getName() {
        return $this->name;
    }

    //CRUD
    /**
     * Obtiene todos los registros de la tabla categoria
     */
    public static function getAll() {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT * FROM categoria ORDER BY name ;");

        $datos = [];

        while ($item = $bd->getRow("Categoria")) {
            array_push($datos, $item);
        }

        return $datos;
    }

    /**
     * Obtiene el registro en la tabla categoria que tiene el id indicado como parametro
     * @param type $id
     */
    public static function getId($idCat) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT * FROM categoria WHERE idCat=:idCat ;",
                [":idCat" => $idCat]);

        return $bd->getRow("Categoria");
    }

    /**
     * Inserta un Registro en la tabla categoria
     */
    public function insert() {
        $bd = Database::getInstance();
        $bd->doQuery("INSERT INTO categoria (name) VALUES (:name);",
                [":name" => $this->name]);
    }

    /**
     * Actualiza un Registro en la tabla categoria
     */
    public function update() {
        $bd = Database::getInstance();
        $bd->doQuery("UPDATE categoria SET name=:name WHERE idCat=:idCat ;",
                [":name" => $this->name,
                    ":idCat" => $this->idCat]);
    }

    /**
     * Elimina el registro de la tabla categoria que tiene el id indicado como parametro
     * @param type $id
     */
    public function delete($idCat) {
        $bd = Database::getInstance();
        $bd->doQuery("DELETE FROM categoria WHERE idCat=:idCat ;",
                [":idCat" => $idCat]);
    }

}

?>
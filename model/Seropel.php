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
 * Contiene los metodos que realizan las operaciones necesarias en la tabla seropel
 */
class Seropel implements Generico {

    private $idSeropel;
    private $idCat;
    private $tipo;
    private $title;
    private $description;
    private $cover;
    private $date;
    private $categoria;
    private $valoracion;

    public function __construct() {
        
    }

    //SETTER
    public function setIdSeropel($dta) {
        $this->idSeropel = $dta;
    }

    public function setIdCat($dta) {
        $this->idCat = $dta;
    }

    public function setTipo($dta) {
        $this->tipo = $dta;
    }

    public function setTitle($dta) {
        $this->title = $dta;
    }

    public function setDescription($dta) {
        $this->description = $dta;
    }

    public function setCover($dta) {
        $this->cover = $dta;
    }

    public function setDate($dta) {
        $this->date = $dta;
    }

    public function setCategoria($dta) {
        $this->categoria = $dta;
    }

    public function setValoracion($dta) {
        $this->valoracion = $dta;
    }

    //GETTER
    public function getIdSeropel() {
        return $this->idSeropel;
    }

    public function getIdCat() {
        return $this->idCat;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getCover() {
        return $this->cover;
    }

    public function getDate() {
        return $this->date;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getValoracion() {
        return $this->valoracion;
    }

    //CRUD
    /**
     * Obtiene todos los registros de la tabla seropel
     */
    public static function getAll() {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT * FROM seropel");

        $datos = [];

        while ($item = $bd->getRow("Seropel")) {
            array_push($datos, $item);
        }

        return $datos;
    }

    /**
     * Obtiene el registro en la tabla seropel que tiene el id indicado como parametro
     * @param type $id
     */
    public static function getId($idSeropel) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT * FROM seropel WHERE idSeropel=:idSeropel ;",
                [":idSeropel" => $idSeropel]);

        return $bd->getRow("Seropel");
    }

    /**
     * Inserta un Registro en la tabla seropel
     */
    public function insert() {
        $bd = Database::getInstance();
        $bd->doQuery("INSERT INTO seropel (tipo, idCat, title, description, cover, date) VALUES (:tipo, :idCat, :title, :description, :cover, :date);",
                [":tipo" => $this->tipo,
                    ":idCat" => $this->idCat,
                    ":title" => $this->title,
                    ":description" => $this->description,
                    ":cover" => $this->cover,
                    ":date" => $this->date]);
    }

    /**
     * Actualiza un Registro en la tabla seropel
     */
    public function update() {
        $bd = Database::getInstance();
        $bd->doQuery("UPDATE seropel SET tipo=:tipo, idCat=:idCat, title=:title, description=:description, cover=:cover, date=:date WHERE idSeropel=:idSeropel ;",
                [":tipo" => $this->tipo,
                    ":idCat" => $this->idCat,
                    ":title" => $this->title,
                    ":description" => $this->description,
                    ":cover" => $this->cover,
                    ":date" => $this->date,
                    ":idSeropel" => $this->idSeropel]);
    }

    /**
     * Elimina el registro de la tabla seropel que tiene el id indicado como parametro
     * @param type $id
     */
    public function delete($idSeropel) {
        $bd = Database::getInstance();
        $bd->doQuery("DELETE FROM seropel WHERE idSeropel=:idSeropel ;",
                [":idSeropel" => $idSeropel]);
    }

    //CONSULTAS
    /**
     * Obtiene los registros en la tabla seropel cuyo tipo (serie o pelicula) coincida con el parametro tipo, el mombre de la categoria y la media de la valoracion ordenados por inserción en la BBDD (idSeropel)
     * @param type $tipo
     * @return array
     */
    public static function listaactual($tipo) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT s.*,ca.name AS categoria, AVG(IFNULL(p.score, 0)) AS valoracion FROM seropel s JOIN categoria ca ON s.idCat = ca.idCat LEFT JOIN puntuacion p ON s.idSeropel = p.idSeropel WHERE s.tipo=:tipo GROUP BY s.idSeropel ORDER BY s.idSeropel DESC;",
                [":tipo" => $tipo]);

        $datos = [];

        while ($item = $bd->getRow("Seropel")) {
            array_push($datos, $item);
        }

        return $datos;
    }

    /**
     * Obtiene los registros en la tabla seropel cuyo tipo (serie o pelicula) coincida con el parametro tipo, el mombre de la categoria y la media de la valoracion ordenado por valoracion
     * @param type $tipo
     * @return array
     */
    public static function listamejor($tipo) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT s.*,ca.name AS categoria, AVG(IFNULL(p.score, 0)) AS valoracion FROM seropel s JOIN categoria ca ON s.idCat = ca.idCat LEFT JOIN puntuacion p ON s.idSeropel = p.idSeropel WHERE s.tipo=:tipo GROUP BY s.idSeropel ORDER BY valoracion DESC;",
                [":tipo" => $tipo]);

        $datos = [];

        while ($item = $bd->getRow("Seropel")) {
            array_push($datos, $item);
        }

        return $datos;
    }

    /**
     * Obtiene los registros en la tabla seropel cuyo tipo (serie o pelicula) coincida con el parametro tipo que tengan en la tabla puntuacion el estado que indica el parametro estado y pertenezcan al usuario que tiene iniciada la sesión, el mombre de la categoria y la media de la valoracion ordenados por inserción en la BBDD (idSeropel)
     * @param type $tipo
     * @param type $estado
     * @return array
     */
    public static function milistaactual($tipo, $estado) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT s.*,ca.name AS categoria, AVG(IFNULL(p.score, 0)) AS valoracion FROM seropel s JOIN categoria ca ON s.idCat = ca.idCat LEFT JOIN puntuacion p ON s.idSeropel = p.idSeropel WHERE s.tipo=:tipo AND p.idUsu=:idUsu AND p.idEst=:idEstado GROUP BY s.idSeropel ORDER BY s.idSeropel DESC;",
                [":tipo" => $tipo,
                    ":idUsu" => $_SESSION["usuario"]->idUsu,
                    ":idEstado" => $estado]);

        $datos = [];

        while ($item = $bd->getRow("Seropel")) {
            array_push($datos, $item);
        }

        return $datos;
    }

    /**
     * Obtiene los registros en la tabla seropel cuyo tipo (serie o pelicula) coincida con el parametro tipo que tengan en la tabla puntuacion el estado que indica el parametro estado y pertenezcan al usuario que tiene iniciada la sesión, el mombre de la categoria y la media de la valoracion ordenado por valoracion
     * @param type $tipo
     * @param type $estado
     * @return array
     */
    public static function milistamejor($tipo, $estado) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT s.*,ca.name AS categoria, AVG(IFNULL(p.score, 0)) AS valoracion FROM seropel s JOIN categoria ca ON s.idCat = ca.idCat LEFT JOIN puntuacion p ON s.idSeropel = p.idSeropel WHERE p.idUsu=:idUsu AND p.idEst=:idEstado AND s.tipo=:tipo GROUP BY s.idSeropel ORDER BY valoracion DESC;",
                [":tipo" => $tipo,
                    ":idUsu" => $_SESSION["usuario"]->idUsu,
                    ":idEstado" => $estado]);

        $datos = [];

        while ($item = $bd->getRow("Seropel")) {
            array_push($datos, $item);
        }

        return $datos;
    }

    /**
     * Obtiene los registros en la tabla seropel cuya categoria coincida con el parametro idCat y cuyo tipo (serie o pelicula) coincida con el parametro tipo, el mombre de la categoria y la media de la valoracion ordenados por inserción en la BBDD (idSeropel)
     * @param type $idCat
     * @param type $tipo
     * @return array
     */
    public static function categoriaactual($idCat, $tipo) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT s.*,ca.name AS categoria, AVG(IFNULL(p.score, 0)) AS valoracion FROM seropel s JOIN categoria ca ON s.idCat = ca.idCat LEFT JOIN puntuacion p ON s.idSeropel = p.idSeropel WHERE s.tipo=:tipo AND s.idCat=:idCat GROUP BY s.idSeropel ORDER BY s.idSeropel DESC;",
                [":idCat" => $idCat,
                    ":tipo" => $tipo]);

        $datos = [];

        while ($item = $bd->getRow("Seropel")) {
            array_push($datos, $item);
        }

        return $datos;
    }

    /**
     * Obtiene los registros en la tabla seropel cuya  categoria coincida con el parametro idCat y cuyo tipo (serie o pelicula) coincida con el parametro tipo, el mombre de la categoria y la media de la valoracion ordenado por valoracion
     * @param type $idCat
     * @param type $tipo
     * @return array
     */
    public static function categoriamejor($idCat, $tipo) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT s.*,ca.name AS categoria, AVG(IFNULL(p.score, 0)) AS valoracion FROM seropel s JOIN categoria ca ON s.idCat = ca.idCat LEFT JOIN puntuacion p ON s.idSeropel = p.idSeropel WHERE s.tipo=:tipo AND s.idCat=:idCat GROUP BY s.idSeropel ORDER BY valoracion DESC;",
                [":idCat" => $idCat,
                    ":tipo" => $tipo]);

        $datos = [];

        while ($item = $bd->getRow("Seropel")) {
            array_push($datos, $item);
        }

        return $datos;
    }

    /**
     * Obtiene los registros en la tabla seropel cuyo titulo coincida total o parcialmente con el parametro buscar, el mombre de la categoria y la media de la valoracion ordenados por inserción en la BBDD (idSeropel)
     * @param type $buscar
     * @param type $tipo
     * @return array
     */
    public static function buscaractual($buscar, $tipo) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT s.*,ca.name AS categoria, AVG(IFNULL(p.score, 0)) AS valoracion FROM seropel s JOIN categoria ca ON s.idCat = ca.idCat LEFT JOIN puntuacion p ON s.idSeropel = p.idSeropel WHERE s.tipo=:tipo AND s.title LIKE \"%" . $buscar . "%\" GROUP BY s.idSeropel ORDER BY s.idSeropel DESC;",
                [":tipo" => $tipo]);

        $datos = [];

        while ($item = $bd->getRow("Seropel")) {
            array_push($datos, $item);
        }

        return $datos;
    }

    /**
     * Obtiene los registros en la tabla seropel cuyo titulo coincida total o parcialmente con el parametro buscar, el mombre de la categoria y la media de la valoracion ordenado por valoracion
     * @param type $buscar
     * @param type $tipo
     * @return array
     */
    public static function buscarmejor($buscar, $tipo) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT s.*,ca.name AS categoria, AVG(IFNULL(p.score, 0)) AS valoracion FROM seropel s JOIN categoria ca ON s.idCat = ca.idCat LEFT JOIN puntuacion p ON s.idSeropel = p.idSeropel WHERE s.tipo=:tipo AND s.title LIKE \"%" . $buscar . "%\" GROUP BY s.idSeropel ORDER BY valoracion DESC;",
                [":tipo" => $tipo]);

        $datos = [];

        while ($item = $bd->getRow("Seropel")) {
            array_push($datos, $item);
        }

        return $datos;
    }

    /**
     * Obtiene el registro en la tabla seropel que tiene el idSeropel indicado como parametro, el mombre de la categoria y la media de la valoracion
     * @param type $idSeropel
     * @return type
     */
    public static function detalle($idSeropel) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT s.*,ca.name AS categoria, AVG(IFNULL(p.score, 0)) AS valoracion FROM seropel s JOIN categoria ca ON s.idCat = ca.idCat LEFT JOIN puntuacion p ON s.idSeropel = p.idSeropel WHERE s.idSeropel=:idSeropel GROUP BY s.idSeropel;",
                [":idSeropel" => $idSeropel]);
        return $bd->getRow("Seropel");
    }

}

?>
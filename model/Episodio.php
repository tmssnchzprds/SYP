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
 * Contiene los metodos que realizan las operaciones necesarias en la tabla episodio
 */
class Episodio implements Generico {

    private $idEpi;
    private $idSeropel;
    private $season;
    private $episode;

    public function __construct() {
        
    }

    //SETTER
    public function setIdEpi($dta) {
        $this->idEpi = $dta;
    }

    public function setIdSeropel($dta) {
        $this->idSeropel = $dta;
    }

    public function setSeason($dta) {
        $this->season = $dta;
    }

    public function setEpisode($dta) {
        $this->episode = $dta;
    }

    //GETTER
    public function getIdEpi() {
        return $this->idEpi;
    }

    public function getIdSeropel() {
        return $this->idSeropel;
    }

    public function getSeason() {
        return $this->season;
    }

    public function getEpisode() {
        return $this->episode;
    }

    //CRUD
    /**
     * Obtiene todos los registros de la tabla episodio
     */
    public static function getAll() {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT * FROM episodio;");

        $datos = [];

        while ($item = $bd->getRow("Episodio")) {
            array_push($datos, $item);
        }

        return $datos;
    }

    /**
     * Obtiene el registro en la tabla episodio que tiene el id indicado como parametro
     * @param type $id
     */
    public static function getId($idEpi) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT * FROM episodio WHERE idEpi=:idEpi ;",
                [":idEpi" => $idEpi]);

        return $bd->getRow("Episodio");
    }

    /**
     * Inserta un Registro en la tabla episodio
     */
    public function insert() {
        $bd = Database::getInstance();
        $bd->doQuery("INSERT INTO episodio (idSeropel, season, episode) VALUES (:idSeropel, :season, :episode);",
                [":idSeropel" => $this->idSeropel,
                    ":season" => $this->season,
                    ":episode" => $this->episode]);
    }

    /**
     * Actualiza un Registro en la tabla episodio
     */
    public function update() {
        $bd = Database::getInstance();
        $bd->doQuery("UPDATE episodio SET idSeropel=:idSeropel, season=:season, episode=:episode WHERE idEpi=:idEpi ;",
                [":idSeropel" => $this->idSeropel,
                    ":season" => $this->season,
                    ":episode" => $this->episode,
                    ":idEpi" => $this->idEpi]);
    }

    /**
     * Elimina el registro de la tabla episodio que tiene el id indicado como parametro
     * @param type $id
     */
    public function delete($idEpi) {
        $bd = Database::getInstance();
        $bd->doQuery("DELETE FROM episodio WHERE idEpi=:idEpi ;",
                [":idEpi" => $idEpi]);
    }

    //CONSULTAS
    /**
     * Obtiene los registros en la tabla episodio que tiene el idSeropel indicado como parametro
     * @param type $idSeropel
     * @return array
     */
    public static function getSeropel($idSeropel) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT * FROM episodio WHERE idSeropel=:idSeropel ORDER BY season, episode;",
                [":idSeropel" => $idSeropel]);

        $datos = [];

        while ($item = $bd->getRow("Episodio")) {
            array_push($datos, $item);
        }

        return $datos;
    }

    /**
     * Obtiene el registro en la tabla episodio que tiene el idSeropel indicado como parametro y season indicado como parametro
     * @param type $idSeropel
     * @param type $season
     * @return type
     */
    public static function getbySeason($idSeropel, $season) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT * FROM episodio WHERE idSeropel=:idSeropel AND season=:season ;",
                [":idSeropel" => $idSeropel,
                    ":season" => $season]);

        return $bd->getRow("Episodio");
    }

}

?>
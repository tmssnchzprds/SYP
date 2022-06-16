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
 * Contiene los metodos que realizan las operaciones necesarias en la tabla puntuacion
 */
class Puntuacion implements Generico {

    private $idScore;
    private $idUsu;
    private $idSeropel;
    private $season;
    private $episode;
    private $score;
    private $idEst;

    public function __construct() {
        
    }

    //SETTER
    public function setIdScore($dta) {
        $this->idScore = $dta;
    }

    public function setIdUsu($dta) {
        $this->idUsu = $dta;
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

    public function setScore($dta) {
        $this->score = $dta;
    }

    public function setIdEst($dta) {
        $this->idEst = $dta;
    }

    //GETTER
    public function getIdScore() {
        return $this->idScore;
    }

    public function getIdUsu() {
        return $this->idUsu;
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

    public function getScore() {
        return $this->score;
    }

    public function getIdEst() {
        return $this->idEst;
    }

    //CRUD
    /**
     * Obtiene todos los registros de la tabla puntuacion
     */
    public static function getAll() {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT * FROM puntuacion;");

        $datos = [];

        while ($item = $bd->getRow("Puntuacion")) {
            array_push($datos, $item);
        }

        return $datos;
    }

    /**
     * Obtiene el registro en la tabla puntuacion que tiene el id indicado como parametro
     * @param type $id
     */
    public static function getId($idScore) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT * FROM puntuacion WHERE idScore=:idScore ;",
                [":idScore" => $idScore]);

        return $bd->getRow("Puntuacion");
    }

    /**
     * Inserta un Registro en la tabla puntuacion
     */
    public function insert() {
        $bd = Database::getInstance();
        $bd->doQuery("INSERT INTO puntuacion (idUsu, idSeropel, score, season, episode, idEst) VALUES (:idUsu, :idSeropel, :score, :season, :episode, :idEst);",
                [":idUsu" => $this->idUsu,
                    ":idSeropel" => $this->idSeropel,
                    ":season" => $this->season,
                    ":episode" => $this->episode,
                    ":score" => $this->score,
                    ":idEst" => $this->idEst]);
    }

    /**
     * Actualiza un Registro en la tabla puntuacion
     */
    public function update() {
        $bd = Database::getInstance();
        $bd->doQuery("UPDATE puntuacion SET idUsu=:idUsu, idSeropel=:idSeropel, score=:score, season=:season, episode=:episode, idEst=:idEst WHERE idScore=:idScore ;",
                [":idUsu" => $this->idUsu,
                    ":idSeropel" => $this->idSeropel,
                    ":season" => $this->season,
                    ":episode" => $this->episode,
                    ":score" => $this->score,
                    ":idEst" => $this->idEst,
                    ":idScore" => $this->idScore]);
    }

    /**
     * Elimina el registro de la tabla puntuacion que tiene el id indicado como parametro
     * @param type $id
     */
    public function delete($idScore) {
        $bd = Database::getInstance();
        $bd->doQuery("DELETE FROM puntuacion WHERE idScore=:idScore ;",
                [":idScore" => $idScore]);
    }

    //CONSULTAS
    /**
     * Obtiene los registros en la tabla puntuacion cuyo idSeropel coincida con el parametro idSeropel y idUsu coincida con el parametro idUsu
     * @param type $idSeropel
     * @param type $idUsu
     * @return type
     */
    public static function getPuntuacion($idSeropel, $idUsu) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT * FROM puntuacion WHERE idSeropel=:idSeropel AND idUsu=:idUsu AND season=0 AND episode=0;",
                [":idSeropel" => $idSeropel,
                    ":idUsu" => $idUsu]);

        return $bd->getRow("Puntuacion");
    }

    /**
     * Obtiene los registros en la tabla puntuacion cuyo idSeropel coincida con el parametro idSeropel, idUsu coincida con el parametro idUsu y season coincida con el parametro season  
     * @param type $idSeropel
     * @param type $idUsu
     * @param type $season
     * @return type
     */
    public static function getPuntuacions($idSeropel, $idUsu, $season) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT * FROM puntuacion WHERE idSeropel=:idSeropel AND idUsu=:idUsu AND season=:season AND episode=0 ;",
                [":idSeropel" => $idSeropel,
                    ":season" => $season,
                    ":idUsu" => $idUsu]);

        return $bd->getRow("Puntuacion");
    }

    /**
     * Obtiene los registros en la tabla puntuacion cuyo idSeropel coincida con el parametro idSeropel, idUsu coincida con el parametro idUsu, season coincida con el parametro season y episode coincida con el parametro episode  
     * @param type $idSeropel
     * @param type $idUsu
     * @param type $season
     * @param type $episode
     * @return type
     */
    public static function getPuntuacione($idSeropel, $idUsu, $season, $episode) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT * FROM puntuacion WHERE idSeropel=:idSeropel AND idUsu=:idUsu AND season=:season AND episode=:episode ;",
                [":idSeropel" => $idSeropel,
                    ":season" => $season,
                    ":episode" => $episode,
                    ":idUsu" => $idUsu]);

        return $bd->getRow("Puntuacion");
    }

}

?>
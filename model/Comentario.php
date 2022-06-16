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
 * Contiene los metodos que realizan las operaciones necesarias en la tabla comentario
 */
class Comentario implements Generico {

    private $idCom;
    private $idUsu;
    private $idSeropel;
    private $season;
    private $episode;
    private $commentary;
    private $usuario;

    public function __construct() {
        
    }

    //SETTER
    public function setIdCom($dta) {
        $this->idCom = $dta;
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

    public function setCommentary($dta) {
        $this->commentary = $dta;
    }

    public function setUsuario($dta) {
        $this->usuario = $dta;
    }

    //GETTER
    public function getIdCom() {
        return $this->idCom;
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

    public function getCommentary() {
        return $this->commentary;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    //CRUD
    /**
     * Obtiene todos los registros de la tabla comentario
     */
    public static function getAll() {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT * FROM comentario;");

        $datos = [];

        while ($item = $bd->getRow("Comentario")) {
            array_push($datos, $item);
        }

        return $datos;
    }

    /**
     * Obtiene el registro en la tabla comentario que tiene el id indicado como parametro
     * @param type $id
     */
    public static function getId($idCom) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT * FROM comentario WHERE idCom=:idCom ;",
                [":idCom" => $idCom]);

        return $bd->getRow("Comentario");
    }

    /**
     * Inserta un Registro en la tabla comentario
     */
    public function insert() {
        $bd = Database::getInstance();
        $bd->doQuery("INSERT INTO comentario (idUsu, idSeropel, season, episode, commentary) VALUES (:idUsu, :idSeropel, :season, :episode, :commentary);",
                [":idUsu" => $this->idUsu,
                    ":idSeropel" => $this->idSeropel,
                    ":season" => $this->season,
                    ":episode" => $this->episode,
                    ":commentary" => $this->commentary]);
    }

    /**
     * Actualiza un Registro en la tabla comentario
     */
    public function update() {
        $bd = Database::getInstance();
        $bd->doQuery("UPDATE comentario SET idUsu=:idUsu, idSeropel=:idSeropel, season=:season, episode=:episode, commentary=:commentary WHERE idCom=:idCom ;",
                [":idUsu" => $this->idUsu,
                    ":idSeropel" => $this->idSeropel,
                    ":season" => $this->season,
                    ":episode" => $this->episode,
                    ":commentary" => $this->commentary,
                    ":idCom" => $this->idCom]);
    }

    /**
     * Elimina el registro de la tabla comentario que tiene el id indicado como parametro
     * @param type $id
     */
    public function delete($idCom) {
        $bd = Database::getInstance();
        $bd->doQuery("DELETE FROM comentario WHERE idCom=:idCom ;",
                [":idCom" => $idCom]);
    }

    //CONSULTAS
    /**
     * Obtiene los registros en la tabla comentario y el nombre de usuario asociado que tiene el idSeropel indicado como parametro
     * @param type $idSeropel
     * @return array
     */
    public static function comentarioSeropel($idSeropel) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT c.*, u.name as usuario FROM comentario c JOIN usuario u ON u.idUsu = c.idUsu  WHERE c.idSeropel=:idSeropel ;",
                [":idSeropel" => $idSeropel]);

        $datos = [];

        while ($item = $bd->getRow("Comentario")) {
            array_push($datos, $item);
        }

        return $datos;
    }

    /**
     * Obtiene los registros en la tabla comentario y el nombre de usuario asociado que tiene el idSeropel indicado como parametro y la season indicada como parametro
     * @param type $idSeropel
     * @param type $season
     * @return array
     */
    public static function comentarioTemporada($idSeropel, $season) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT c.*, u.name as usuario FROM comentario c JOIN usuario u ON u.idUsu = c.idUsu  WHERE c.idSeropel=:idSeropel AND c.season=:season ;",
                [":idSeropel" => $idSeropel,
                    ":season" => $season]);

        $datos = [];

        while ($item = $bd->getRow("Comentario")) {
            array_push($datos, $item);
        }

        return $datos;
    }

    /**
     * Obtiene los registros en la tabla comentario y el nombre de usuario asociado que tiene el idSeropel indicado como parametro, la season indicada como parametro y el episode indicado como parametro
     * @param type $idSeropel
     * @param type $season
     * @param type $episode
     * @return array
     */
    public static function comentarioEpisodio($idSeropel, $season, $episode) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT c.*, u.name as usuario FROM comentario c JOIN usuario u ON u.idUsu = c.idUsu  WHERE c.idSeropel=:idSeropel AND c.season=:season AND c.episode=:episode ;",
                [":idSeropel" => $idSeropel,
                    ":season" => $season,
                    ":episode" => $episode]);

        $datos = [];

        while ($item = $bd->getRow("Comentario")) {
            array_push($datos, $item);
        }

        return $datos;
    }

}

?>
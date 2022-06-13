<?php

require_once "model/Database.php";
require_once "model/Generico.php";

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
    public static function getAll() {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT * FROM comentario;");

        $datos = [];

        while ($item = $bd->getRow("Comentario")) {
            array_push($datos, $item);
        }

        return $datos;
    }

    public static function getId($idCom) {
        $bd = Database::getInstance();
        $bd->doQuery("SELECT * FROM comentario WHERE idCom=:idCom ;",
                [":idCom" => $idCom]);

        return $bd->getRow("Comentario");
    }

    public function insert() {
        $bd = Database::getInstance();
        $bd->doQuery("INSERT INTO comentario (idUsu, idSeropel, season, episode, commentary) VALUES (:idUsu, :idSeropel, :season, :episode, :commentary);",
                [":idUsu" => $this->idUsu,
                    ":idSeropel" => $this->idSeropel,
                    ":season" => $this->season,
                    ":episode" => $this->episode,
                    ":commentary" => $this->commentary]);
    }

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

    public function delete($idCom) {
        $bd = Database::getInstance();
        $bd->doQuery("DELETE FROM comentario WHERE idCom=:idCom ;",
                [":idCom" => $idCom]);
    }

    //CONSULTAS
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
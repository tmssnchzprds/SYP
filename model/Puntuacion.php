<?php
require_once "model/Database.php" ;
require_once "model/Generico.php" ;

class Puntuacion implements Generico{

    private $idScore ;
    private $idUsu ;
    private $idSeropel ;
    private $season ;
    private $episode ;
    private $score ;
    private $idEst ;
    
    public function __construct(){}

    //SETTER
    public function setIdScore($dta)       {$this->idScore = $dta;}
    public function setIdUsu($dta)       {$this->idUsu = $dta;}
    public function setIdSeropel($dta)       {$this->idSeropel = $dta;}
    public function setSeason($dta)       {$this->season = $dta;}
    public function setEpisode($dta)       {$this->episode = $dta;}
    public function setScore($dta)       {$this->score = $dta;}
    public function setIdEst($dta)       {$this->idEst = $dta;}
    
    //GETTER
    public function getIdScore()       {return $this->idScore;}
    public function getIdUsu()       {return $this->idUsu;}
    public function getIdSeropel()       {return $this->idSeropel;}
    public function getSeason()       {return $this->season;}
    public function getEpisode()       {return $this->episode;}
    public function getScore()       {return $this->score;}
    public function getIdEst()       {return $this->idEst;}

    //CRUD
    public static function getAll(){
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT * FROM puntuacion;") ;

        $datos = [] ;

        while($item = $bd->getRow("Puntuacion")){
            array_push($datos,$item);
        }
 
        return $datos;
    }
    
    public static function getId($idScore){
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT * FROM puntuacion WHERE idScore=:idScore ;",
            [ ":idScore" => $idScore ]) ;

        return $bd->getRow("Puntuacion") ;
    }

    public function insert(){
        $bd = Database::getInstance();
        $bd->doQuery("INSERT INTO puntuacion (idUsu, idSeropel, score, season, episode, idEst) VALUES (:idUsu, :idSeropel, :score, :season, :episode, :idEst);",
            [":idUsu"=>$this->idUsu,
            ":idSeropel"=>$this->idSeropel,
            ":season"=>$this->season,
            ":episode"=>$this->episode,
            ":score"=>$this->score,
            ":idEst"=>$this->idEst]) ;
    }

    public function update(){
        $bd = Database::getInstance() ;
        $bd->doQuery("UPDATE puntuacion SET idUsu=:idUsu, idSeropel=:idSeropel, score=:score, season=:season, episode=:episode, idEst=:idEst WHERE idScore=:idScore ;",
            [":idUsu"=>$this->idUsu,
            ":idSeropel"=>$this->idSeropel,
            ":season"=>$this->season,
            ":episode"=>$this->episode,
            ":score"=>$this->score,
            ":idEst"=>$this->idEst,
            ":idScore"=>$this->idScore]) ;
    } 
    
    public function delete($idScore){
        $bd = Database::getInstance() ;
        $bd->doQuery("DELETE FROM puntuacion WHERE idScore=:idScore ;",
            [ ":idScore" => $idScore ]) ;
    }
 
    //CONSULTAS
    public static function getPuntuacion($idSeropel,$idUsu){
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT * FROM puntuacion WHERE idSeropel=:idSeropel AND idUsu=:idUsu AND season=0 AND episode=0;",
            [ ":idSeropel" => $idSeropel,
              ":idUsu" => $idUsu]) ;

        return $bd->getRow("Puntuacion") ;
    }
    
   public static function getPuntuacions($idSeropel,$idUsu,$season){
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT * FROM puntuacion WHERE idSeropel=:idSeropel AND idUsu=:idUsu AND season=:season AND episode=0 ;",
            [ ":idSeropel" => $idSeropel,
              ":season" => $season,
              ":idUsu" => $idUsu]) ;

        return $bd->getRow("Puntuacion") ;
    }
    
    public static function getPuntuacione($idSeropel,$idUsu,$season,$episode){
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT * FROM puntuacion WHERE idSeropel=:idSeropel AND idUsu=:idUsu AND season=:season AND episode=:episode ;",
            [ ":idSeropel" => $idSeropel,
              ":season" => $season,
              ":episode" => $episode,
              ":idUsu" => $idUsu]) ;

        return $bd->getRow("Puntuacion") ;
    }
}
?>
<?php
require_once "model/Database.php" ;
require_once "model/Generico.php" ;

class Ususeropel implements Generico{

    private $idUsuSeropel ;
    private $idUsu ;
    private $idSeropel ;
    private $season ;
    private $episode ;
    private $idEst ;

    public function __construct(){}

    //SETTER
    public function setIdUsuSeropel($dta)       {$this->idUsuSeropel = $dta;}
    public function setIdUsu($dta)       {$this->idUsu = $dta;}
    public function setIdSeropel($dta)       {$this->idSeropel = $dta;}
    public function setSeason($dta)       {$this->season = $dta;}
    public function setEpisode($dta)       {$this->episode = $dta;}
    public function setIdEst($dta)       {$this->idEst = $dta;}
    
    //GETTER
    public function getIdUsuSeropel()       {return $this->idUsuSeropel;}
    public function getIdUsu()       {return $this->idUsu;}
    public function getIdSeropel()       {return $this->idSeropel;}
    public function getSeason()       {return $this->season;}
    public function getEpisode()       {return $this->episode;}
    public function getIdEst()       {return $this->idEst;}

    //CRUD
    public static function getAll(){
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT * FROM ususeropel;") ;

        $datos = [] ;

        while($item = $bd->getRow("UsuarioSeropel")){
            array_push($datos,$item);
        }
 
        return $datos;
    }
    
    public static function getId($idUsuSeropel) {
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT * FROM ususeropel WHERE idUsuSeropel=:idUsuSeropel ;",
            [ ":idUsuSeropel" => $idUsuSeropel ]) ;

        return $bd->getRow("UsuarioSeropel") ;
    }

    public function insert(){
        $bd = Database::getInstance();
        $bd->doQuery("INSERT INTO ususeropel (idUsu, idSeropel,season, episode, idEst) VALUES (:idUsu, :idSeropel, :season, :episode, :idEst);",
            [":idUsu"=>$this->idUsu,
            ":idSeropel"=>$this->idSeropel,
            ":season"=>$this->season,
            ":episode"=>$this->episode,
            ":idEst"=>$this->idEst]) ;
    }

    public function update()
    {
        $bd = Database::getInstance() ;
        $bd->doQuery("UPDATE ususeropel SET idUsu=:idUsu, idSeropel=:idSeropel, season=:season, episode=:episode, idEst=:idEst WHERE idUsuSeropel=:idUsuSeropel ;",
            [":idUsu"=>$this->idUsu,
            ":idSeropel"=>$this->idSeropel,
            ":season"=>$this->season,
            ":episode"=>$this->episode,
            ":idEst"=>$this->idEst,
            ":idUsuSeropel"=>$this->idUsuSeropel]) ;
    } 
    
    public function delete($idUsuSeropel){
        $bd = Database::getInstance() ;
        $bd->doQuery("DELETE FROM ususeropel WHERE idUsuSeropel=:idUsuSeropel ;",
            [ ":idUsuSeropel" => $idUsuSeropel ]) ;
    }
 
    //CONSULTAS
}
?>
<?php
require_once "model/Database.php" ;
require_once "model/Generico.php" ;

class Episodio implements Generico{

    private $idEpi ;
    private $idSeropel ;
    private $season ;
    private $episode ;

    public function __construct(){}

    //SETTER
    public function setIdEpi($dta)       {$this->idEpi = $dta;}
    public function setIdSeropel($dta)      {$this->idSeropel = $dta;}
    public function setSeason($dta)   {$this->season = $dta;}
    public function setEpisode($dta)        {$this->episode = $dta;}

    //GETTER
    public function getIdEpi()       {return $this->idEpi;}
    public function getIdSeropel()      {return $this->idSeropel;}
    public function getSeason()   {return $this->season;}
    public function getEpisode()        {return $this->episode;}

    //CRUD
    public static function getAll(){
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT * FROM episodio;") ;

        $datos = [] ;

        while($item = $bd->getRow("Episodio")){
            array_push($datos,$item);
        }
 
        return $datos;
    }
    
    public static function getId($idEpi) {
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT * FROM episodio WHERE idEpi=:idEpi ;",
            [ ":idEpi" => $idEpi ]) ;

        return $bd->getRow("Episodio") ;
    }

    public function insert(){
        $bd = Database::getInstance();
        $bd->doQuery("INSERT INTO episodio (idSeropel, season, episode) VALUES (:idSeropel, :season, :episode);",
            [":idSeropel"=>$this->idSeropel,
            ":category"=>$this->season,
            ":episode"=>$this->episode]) ;
    }

    public function update()
    {
        $bd = Database::getInstance() ;
        $bd->doQuery("UPDATE episodio SET idSeropel=:idSeropel, season=:season, episode=:episode WHERE idEpi=:idEpi ;",
            [":idSeropel"=>$this->idSeropel,
            ":category"=>$this->season,
            ":episode"=>$this->episode,
            ":idEpi"=>$this->idEpi]) ;
    } 
    
    public function delete($idEpi){
        $bd = Database::getInstance() ;
        $bd->doQuery("DELETE FROM episodio WHERE idEpi=:idEpi ;",
            [ ":idEpi" => $idEpi ]) ;
    }
 
    //CONSULTAS
    
      public static function getSeropel($idSeropel){
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT * FROM episodio WHERE idSeropel=:idSeropel ORDER BY season, episode;",
            [":idSeropel"=>$idSeropel]    ) ;

        $datos = [] ;

        while($item = $bd->getRow("Episodio")){
            array_push($datos,$item);
        }
 
        return $datos;
    }
}
?>
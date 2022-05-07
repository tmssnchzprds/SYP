<?php
require_once "model/Database.php" ;
require_once "model/Generico.php" ;

class Estado implements Generico{

    private $idEst ;
    private $name ;

    public function __construct(){}

    //SETTER
    public function setIdEst($dta)       {$this->idEst = $dta;}
    public function setName($dta)      {$this->name = $dta;}
    
    //GETTER
    public function getIdEst()       {return $this->idEst;}
    public function getName()      {return $this->name;}

    //CRUD
    public static function getAll(){
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT * FROM estado;") ;

        $datos = [] ;

        while($item = $bd->getRow("Estado")){
            array_push($datos,$item);
        }
 
        return $datos;
    }
    
    public static function getId($idEst) {
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT * FROM estado WHERE idEst=:idEst ;",
            [ ":idEst" => $idEst ]) ;

        return $bd->getRow("Estado") ;
    }

    public function insert(){
        $bd = Database::getInstance();
        $bd->doQuery("INSERT INTO estado (name) VALUES (:name);",
            [":name"=>$this->name]) ;
    }

    public function update()
    {
        $bd = Database::getInstance() ;
        $bd->doQuery("UPDATE estado SET name=:name WHERE idEst=:idEst ;",
            [":name"=>$this->name,
            ":idEst"=>$this->idEst]) ;
    } 
    
    public function delete($idEst){
        $bd = Database::getInstance() ;
        $bd->doQuery("DELETE FROM estado WHERE idEst=:idEst ;",
            [ ":idEst" => $idEst ]) ;
    }
 
    //CONSULTAS
}
?>
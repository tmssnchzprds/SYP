<?php
require_once "model/Database.php" ;
require_once "model/Generico.php" ;


class Categoria implements Generico{

    private $idCat ;
    private $name ;

    public function __construct(){}

    //SETTER
    public function setIdCat($dta)       {$this->idCat = $dta;}
    public function setName($dta)      {$this->name = $dta;}

    //GETTER
    public function getIdCat()       {return $this->idCat;}
    public function getName()      {return $this->name;}

 
    //CRUD
    public static function getAll(){
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT * FROM categoria ORDER BY name ;") ;

        $datos = [] ;

        while($item = $bd->getRow("Categoria")){
            array_push($datos,$item);
        }
 
        return $datos;
    }
    
    public static function getId($idCat) {
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT * FROM categoria WHERE idCat=:idCat ;",
            [ ":idCat" => $idCat ]) ;

        return $bd->getRow("Categoria") ;
    }

    public function insert(){
        $bd = Database::getInstance();
        $bd->doQuery("INSERT INTO categoria (name) VALUES (:name);",
            [":name"=>$this->name]) ;
    }

    public function update()
    {
        $bd = Database::getInstance() ;
        $bd->doQuery("UPDATE categoria SET name=:name WHERE idCat=:idCat ;",
            [":name"=>$this->name,
            ":idCat"=>$this->idCat]) ;
    } 
    
    public function delete($idCat){
        $bd = Database::getInstance() ;
        $bd->doQuery("DELETE FROM categoria WHERE idCat=:idCat ;",
            [ ":idCat" => $idCat ]) ;
    }
 
    //CONSULTAS
}
?>
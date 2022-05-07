<?php
require_once "model/Database.php" ;
require_once "model/Generico.php" ;

class Comentario implements Generico{

    private $idCom ;
    private $idUsu ;
    private $idSeropel ;
    private $commentary ;
    private $usuario ;

    public function __construct(){}

    //SETTER
    public function setIdCom($dta)       {$this->idCom = $dta;}
    public function setIdUsu($dta)       {$this->idUsu = $dta;}
    public function setIdSeropel($dta)       {$this->idSeropel = $dta;}
    public function setCommentary($dta)  {$this->commentary = $dta;}
    public function setUsuario($dta)  {$this->usuario = $dta;}
    
    //GETTER
    public function getIdCom()       {return $this->idCom;}
    public function getIdUsu()       {return $this->idUsu;}
    public function getIdSeropel()       {return $this->idSeropel;}
    public function getCommentary()  {return $this->commentary;}
    public function getUsuario()  {return $this->usuario;}

    //CRUD
    public static function getAll(){
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT * FROM comentario;") ;

        $datos = [] ;

        while($item = $bd->getRow("Comentario")){
            array_push($datos,$item);
        }
 
        return $datos;
    }
    
    public static function getId($idCom) {
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT * FROM comentario WHERE idCom=:idCom ;",
            [ ":idCom" => $idCom ]) ;

        return $bd->getRow("Comentario") ;
    }

    public function insert(){
        $bd = Database::getInstance();
        $bd->doQuery("INSERT INTO comentario (idUsu, idSeropel, commentary) VALUES (:idUsu, :idSeropel, :commentary);",
            [":idUsu"=>$this->idUsu,
            ":idSeropel"=>$this->idSeropel,
            ":commentary"=>$this->commentary]) ;
    }

    public function update()
    {
        $bd = Database::getInstance() ;
        $bd->doQuery("UPDATE comentario SET idUsu=:idUsu, idSeropel=:idSeropel, commentary=:commentary WHERE idCom=:idCom ;",
            [":idUsu"=>$this->idUsu,
            ":idSeropel"=>$this->idSeropel,
            ":commentary"=>$this->commentary,
            ":idCom"=>$this->idCom]) ;
    } 
    
    public function delete($idCom){
        $bd = Database::getInstance() ;
        $bd->doQuery("DELETE FROM comentario WHERE idCom=:idCom ;",
            [ ":idCom" => $idCom ]) ;
    }
 
    //CONSULTAS
    public static function comentario($idSeropel){
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT c.*, u.name as usuario FROM comentario c JOIN usuario u ON s.idUsu = c.idUsu  WHERE idSeropel=:idSeropel ;",
            [ ":idSeropel" => $idSeropel ]) ;    

        $datos = [] ;

        while($item = $bd->getRow("Comentario")){
            array_push($datos,$item);
        }
 
        return $datos;
    }
  

    }
?>
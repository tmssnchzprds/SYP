<?php
interface Generico {
    public static function getAll();
     public static function getId($id);
   public function insert();
    public function update();
    public function delete($id);
}
       /*public static function serieForUser($idUsu){

            $bd = new Database;
            $bd->doQuery("SELECT * FROM serie JOIN listserie ON listserie.idser = serie.idser
            WHERE idUsu=:idUsu ORDER BY name;", [":idUsu"=>$idUsu]);
    
            $datos = [];
    
            while($item = $bd->getRow("Serie")){
                array_push($datos,$item);
            }
    
            return $datos;
        }

        public static function peliculaForUser($idUsu){

            $bd = new Database;
            $bd->doQuery("SELECT * FROM pelicula JOIN listapelicula ON listapelicula.idpel = pelicula.idpel
            WHERE idUsu=:idUsu  ORDER BY title;", [":idUsu"=>$idUsu]);
    
            $datos = [];
    
            while($item = $bd->getRow("Pelicula")){
                array_push($datos,$item);
            }
    
            return $datos;
        }

        public function deleteAni($idser){
            $bd = Database::getInstance() ;
            $bd->doQuery("DELETE FROM listserie WHERE idser=:idser ;",
                [ ":idser" => $idser
                  ]) ;
        }

        public function deleteMan($idpel){
            $bd = Database::getInstance() ;
            $bd->doQuery("DELETE FROM listapelicula WHERE idpel=:idpel;",
                [ ":idpel" => $idpel
                  ]) ;
        }
    public static function getAllSerie(){
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT * FROM serie WHERE category = 'Serie' ORDER BY name;") ;

        $datos = [] ;

        while($item = $bd->getRow("Serie")){
            array_push($datos,$item);
        }
 
        return $datos;
    }

    public static function getAllPelicula(){
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT * FROM serie WHERE category = 'Película' ORDER BY name;") ;

        $datos = [] ;

        while($item = $bd->getRow("Serie")){
            array_push($datos,$item);
        }
 
        return $datos;
    }

    public static function getAllOva(){
        $bd = Database::getInstance() ;
        $bd->doQuery("SELECT * FROM serie WHERE category = 'OVA' ORDER BY name;") ;

        $datos = [] ;

        while($item = $bd->getRow("Serie")){
            array_push($datos,$item);
        }
 
        return $datos;
    }

    public static function getSerieId($idser){

        $bd = new Database;
        $bd->doQuery("SELECT * FROM serie WHERE idser=:idser;", [":idser"=>$idser]);

        $datos = [];

        while($item = $bd->getRow("Serie")){
            array_push($datos,$item);
        }

        return $datos;
    }

         */
?>
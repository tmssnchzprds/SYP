<?php

/**
 * Interfaz de los controladores
 */
interface controllerGenerico {

    /**
     * Controla la obtencion de todos los registros de la BBDD
     */
    public static function getAll();

    /**
     * Controla la obtencion del registro de la BBDD que tiene el id que llega en una variable
     */
    public static function getId();

    /**
     * Controla la insercion de un Registro en la BBDD
     */
    public function insert();

    /**
     * Controla la actualizacion de un Registro en la BBDD
     */
    public function update();

    /**
     * Controla la eliminacion del registro de la BBDD que tiene el id que llega en una variable
     */
    public function delete();
}

?>
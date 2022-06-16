<?php

/**
 * Interfaz de los Beans
 */
interface Generico {

    /**
     * Obtiene todos los registros de la BBDD
     */
    public static function getAll();

    /**
     * Obtiene el registro de la BBDD que tiene el id indicado como parametro
     * @param type $id
     */
    public static function getId($id);

    /**
     * Inserta un Registro en la BBDD
     */
    public function insert();

    /**
     * Actualiza un Registro en la BBDD
     */
    public function update();

    /**
     * Elimina el registro de la BBDD que tiene el id indicado como parametro
     * @param type $id
     */
    public function delete($id);
}

?>
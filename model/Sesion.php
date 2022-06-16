<?php

/**
 * Controla la Sesión
 */
class Sesion {

    /**
     * Inicia la Sesión
     */
    public function init() {
        session_start();
    }

    /**
     * Obtiene la Sesión
     * @param type $key
     * @return type
     */
    public function get($key) {
        return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    /**
     * Cierra la Sesión
     */
    public function close() {
        session_unset();
        session_destroy();
    }

    /**
     * Obtiene el estado de la Sesión
     * @return type
     */
    public function getStatus() {
        return session_status();
    }

}

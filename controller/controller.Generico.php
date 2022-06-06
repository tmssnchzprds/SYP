<?php

interface controllerGenerico {

    public static function getAll();

    public static function getId();

    public function insert();

    public function update();

    public function delete();
}

?>
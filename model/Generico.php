<?php

interface Generico {

    public static function getAll();

    public static function getId($id);

    public function insert();

    public function update();

    public function delete($id);
}

?>
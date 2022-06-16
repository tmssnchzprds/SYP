<?php
session_start();
ini_set("display_errors", 1) ;
ini_set("display_startup_errors", 1) ;
error_reporting(0) ;
if (isset($_GET["mod"]) && isset($_GET["ope"])) {
    $mod = $_GET["mod"];
    $ope = $_GET["ope"];
} elseif (isset($_POST["mod"]) && isset($_POST["ope"])) {
    $mod = $_POST["mod"];
    $ope = $_POST["ope"];
} else {
    $mod = "Seropel";
    $ope = "listaTotal";
}
/**
 * Carga el controlador
 */
require_once "controller/controller.$mod.php" ;
$nme = "controller$mod" ;
$cont = new $nme();
//Si el metodo existe lo ejecuta
if(method_exists($cont,$ope))
    $cont->$ope() ;
else
    die("Error al realizar la operacion") ;
?>
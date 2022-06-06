<?php

$caption[0] = "Series Añadidas Recientemente";
$seropel[0] = Seropel::listaactual(1);
$caption[1] = "Series Mejor Valoradas";
$seropel[1] = Seropel::listamejor(1);
$caption[2] = "Peliculas Añadidas Recientemente";
$seropel[2] = Seropel::listaactual(2);
$caption[3] = "Peliculas Mejor Valoradas";
$seropel[3] = Seropel::listamejor(2);
$categoria = Categoria::getAll();
require_once "view/show.seropel.php";

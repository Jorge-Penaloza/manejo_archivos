<?php

/** Autocargador de librerias **/
spl_autoload_register('autocargador');
function autocargador($insNom)
{
	include $insNom . '.php';
}

$dato = new fileCSV();
echo $dato->setFile('miarchivo.csv');

/*$dato->codigo = 3;
$dato->nombre = 'Anais Cantillana';
$dato->titulo = 'Doctor en ciencias';
$dato->curso = 'Optimizacion inteligente';
$dato->insertar();*/
if ($dato->buscar(3)) 
{
	echo $dato->codigo."<br>";
	echo $dato->nombre."<br>";
	echo $dato->titulo."<br>";
	echo $dato->curso ."<br>";
}

?>
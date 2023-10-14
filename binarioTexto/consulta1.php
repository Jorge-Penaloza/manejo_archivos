<?php

/** Autocargador de librerias **/
spl_autoload_register('autocargador');
function autocargador($insNom)
{
	include $insNom . '.php';
}

$dato = new fileBinary();
echo $dato->setFile('miarchivo.txt');
$dato->setTam(10,90,60,40);
/*$dato->codigo = 3;
$dato->nombre = 'Anais Cantillana';
$dato->titulo = 'Doctor en ciencias';
$dato->curso = 'Optimizacion inteligente';
$dato->insertar();*/
if ($dato->buscar(1)) 
{
	echo $dato->codigo."<br>";
	echo $dato->nombre."<br>";
	echo $dato->titulo."<br>";
	echo $dato->curso ."<br>";
}

?>
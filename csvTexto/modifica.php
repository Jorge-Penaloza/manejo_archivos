<?php

/** Autocargador de librerias **/
spl_autoload_register('autocargador');
function autocargador($insNom)
{
	include $insNom . '.php';
}

$dato = new fileCSV();
echo $dato->setFile('miarchivo.csv');

$dato->codigo = 1;
$dato->nombre = 'Anais Cantillana';
$dato->titulo = 'Doctor en neurologia';
$dato->curso = 'Biologica avanzada';
$dato->actualiza();

$dato->codigo = 2;
$dato->nombre = 'George';
$dato->titulo = 'Doctor Control';
$dato->curso = 'Sistemas de control';
$dato->actualiza();


$campos = array('codigo', 'nombre', 'titulo', 'curso');
$resultado = $dato->buscarTodo();
if(count($resultado) > 0)
    {
    echo "<table>";
    echo "<tr>";
    foreach ($campos as $key => $value) 
    {
        echo "<th>".$value."</th>"; 
    }
    echo "</tr>";
    echo "<tr>";
    foreach ($resultado as $fila)
    {
        $cadena = "<tr>";
        foreach ($fila as $key => $value) 
        {
            $cadena .= "<td>".$value."</td>";
        }
        echo $cadena;
        echo "</tr>";
    }
    echo "</tr>";
    echo "</table>";
}
else
    echo  "No hay registros";
?>
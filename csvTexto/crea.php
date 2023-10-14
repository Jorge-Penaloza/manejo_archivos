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
$dato->titulo = 'Doctor en ciencias';
$dato->curso = 'Optimizacion inteligente';
$dato->insertar();
$dato->codigo = 2;
$dato->nombre = 'George';
$dato->titulo = 'Doctor automatizacion';
$dato->curso = 'Control inteligente';
$dato->insertar();
$dato->codigo = 3;
$dato->nombre = 'Anibal Lexter';
$dato->titulo = 'Doctor en literatura';
$dato->curso = 'Comprension Lectora';
$dato->insertar();
$dato->codigo = 4;
$dato->nombre = 'Barbara Rebollero';
$dato->titulo = 'Periodista';
$dato->curso = 'Analisis de informacion';
$dato->insertar();


$campos = array('codigo', 'nombre', 'titulo', 'curso');
$resultado = $dato->buscarTodo();
echo count($dato->buscarTodo());
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
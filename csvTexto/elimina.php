<?php

/** Autocargador de librerias **/
spl_autoload_register('autocargador');
function autocargador($insNom)
{
	include $insNom . '.php';
}

$dato = new fileCSV();
echo $dato->setFile('miarchivo.csv');

if ($dato->buscar(2)) 
{
	echo $dato->codigo."<br>";
	echo $dato->nombre."<br>";
	echo $dato->titulo."<br>";
	echo $dato->curso ."<br>";
}
$dato->elimina(2);
if ($dato->buscar(2)) 
{
	echo $dato->codigo."<br>";
	echo $dato->nombre."<br>";
	echo $dato->titulo."<br>";
	echo $dato->curso ."<br>";
}
else {
    echo "Registro no encontrado";
}

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

<?php
    if( file_exists("datos.csv") == true )
        echo "<p>El archivo datos.csv existe</p>";
    else
        echo "<p>El archivo datos.csv no se ha encontrado</p>";
        
    if( file_exists("datos.txt") == true )
        echo "<p>El archivo datos.txt existe</p>";
    else
        echo "<p>El archivo datos.txt no se ha encontrado</p>";

    if( file_exists("binarioTexto") == true )
        echo "<p>El directorio binarioTexto existe</p>";
    else
        echo "<p>El directorio binarioTexto no existe</p>";

    if( file_exists("../sem 4/") == true )
        echo "<p>El directorio sem 4 existe</p>";
    else
        echo "<p>El directorio sem 4 no existe</p>";
    
?>
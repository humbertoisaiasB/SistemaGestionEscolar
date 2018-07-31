<?php 
	session_start();
	 //Ejemplo aprenderaprogramar.com, archivo escribir.php

 // Obtener cada línea en un array:
     $aLineas = file($_SESSION['id'].'.txt');
    print_r($aLineas);

    echo "<p>CONTENIDO DEL ARCHIVO</p>";
    echo "<p>=====================</p>";
    // Mostrar el contenido del archivo:
    foreach( $aLineas as $linea )
        echo $linea."<br/ >";
    echo "<p>Borrando la tercera línea...</p>";
    // Borrar el tercer elemento del array (la tercera línea):
     array_splice($aLineas, 10, 1);
    print_r($aLineas);
    // Abrir el archivo:
     $archivo = fopen($_SESSION['id'].'.txt', "w+b");
    // Guardar los cambios en el archivo:
     foreach( $aLineas as $linea )
         fwrite($archivo, $linea);
    echo "<p>CONTENIDO DEL ARCHIVO</p>";
    echo "<p>=====================</p>";
    // Mostrar el contenido del archivo:
    foreach( $aLineas as $linea )
        echo $linea."<br/ >";
     fclose($archivo);


?>
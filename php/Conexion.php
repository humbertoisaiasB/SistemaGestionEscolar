<?php 
	$SERVER = 'localhost';
	$USER = 'root';
	$PASS = '';
	$DB = 'gestion';

	$con = mysqli_connect($SERVER, $USER, $PASS, $DB);
   
	if (!$con) {
	    echo "Error: No se ha podido conectar a MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
?>	
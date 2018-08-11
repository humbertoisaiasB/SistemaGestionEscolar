<?php 
	//$SERVER = 'localhost';
	$SERVER = 'localhost';
	$USER = 'root';
	//$USER = 'gestion_User';
	
	//$PASS = ']VOe)5MOz5iF';
	$PASS = '';
	//'bH3Vn:=>koD';
	//$DB = 'gestion_database';
	$DB = 'gestion'; 
	$con = mysqli_connect($SERVER, $USER, $PASS, $DB);
   
	if (!$con) {
	    echo "Error: No se ha podido conectar a MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
?>	
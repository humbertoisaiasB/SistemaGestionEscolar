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
	function datos($curp,$numero){
		//año,mes,dia,sexo,nacionalidad
		$datosE = "";
		$variable = strtoupper($curp);
		$aux = 0;
		$aux1 = 0;
		for($i=0; $i<=17; $i++){
			if($i==5){
				$aux1 = $i;
				$datosE[0]= $variable[$i].$variable[$aux1+1];
				$aux += $datosE[0];
				if($aux>=22){
					$datosE[0] = "19".$aux;
				}else{
					$datosE[0] = "20".$aux;
				}
			}elseif($i==7){
				$aux1 = $i;
				//Se obtiene dias
				$datosE[1] = $variable[$i].$variable[$aux1+1];
			}elseif($i==9){
				$aux1 = $i;
				//Se obtiene mes
				$datosE[2] = $variable[$i].$variable[$aux1+1];
			}elseif($i==11){
				$aux1 = $i;
				if($i=="M"){
					$datosE[3] = "Femenino";
				}else{
					$datosE[3] = "Masculino";
				}
			}elseif($i==12){
				$aux1 = $i;
				if($curp[$i].$curp[$aux1+1]=="NE"){
				$datosE[4] = "Extranjera";
				}else{
					$datosE[4] = "Mexicana";
				}
			}
		}
		return $datosE;
	}
	//
?>	
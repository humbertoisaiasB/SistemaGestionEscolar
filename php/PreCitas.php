<?php 
	include 'Conexion.php';
	include 'SubirPdf.php'; 
	session_start();
	$casoDe = false;
	if($casoDe == true){
		
	}
	subir();
	$sql=mysqli_query($con,"INSERT into citas (id_Candidato,id_Empleo) VALUES ('$_SESSION[id_Candidato]','$_POST[empleo]' ) " );

?>
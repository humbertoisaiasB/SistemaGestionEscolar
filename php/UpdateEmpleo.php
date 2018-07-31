<?php 
	include 'Conexion.php';
	$link=''.$_SERVER["HTTP_REFERER"]; 
	$url =explode("?",$link);
	if(isset($_POST['btn_Empleo'] )){
		if(!mysqli_query($con,"update empleo set Puesto='$_POST[txt_puesto]',Descripcion='$_POST[txt_Desc]', Puestos_dis='$_POST[sl_PuestosD]', Sueldo='$_POST[txt_Sueldo]', Turno='$_POST[sl_Turno]' where id_Empleo='$_POST[Num]' ") ){
			header("Location: ".$url[0]."?mod=Not");
			exit;
		}
		header("Location: ".$url[0]."?mod=Yes");
			exit;
	}
	header("Location: ".$url[0]);
	exit;
	
?>
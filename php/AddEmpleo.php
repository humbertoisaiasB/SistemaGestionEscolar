<?php
	session_start();
	include ("Conexion.php");
	$link=''.$_SERVER["HTTP_REFERER"]; 
	$url =explode("?",$link);
	if (isset($_POST['btn_empleo'])){
		if(!mysqli_query($con,"insert into empleo (id_Empleador, Dia, Mes, Ano, Puesto,Descripcion, Puestos_dis, Sueldo, Turno)
		VALUES ('".$_SESSION['id_Empleador']."','".date("d")."','".date("m")."','".date("y")."','$_POST[txt_puesto]','$_POST[txt_Desc]', '$_POST[sl_PuestosD]', '$_POST[txt_Sueldo]' ,'$_POST[sl_Turno]' )")){
			header("Location: ".$url[0]."?alert=Not");
			exit;
		}
			header("Location: ".$url[0]."?alert=Yes");
			exit;
	}
	header("Location: ".$url[0]);
	exit;
		
?>

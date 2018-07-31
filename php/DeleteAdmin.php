<?php

  include ("Conexion.php");
  session_start();
  $asd = mysqli_query($con,"select * from usuarios u where u.id_usuario='$_POST[info]'");
  $row = mysqli_fetch_array($asd);
  if(isset($_POST['info'])){
  	if($row['Tipo'] == "Empresa"){
  		$sql=mysqli_query($con,"delete from empresa where id_Usuario=".$_POST['info']);
  		$sql2=mysqli_query($con,"delete from usuarios where id_Usuario=".$_POST['info']);
  	}
  	elseif ($row['Tipo'] ==  "Empleador") {
  		$sql=mysqli_query($con,"delete from empleador where id_Usuario=".$_POST['info']);
  		$sql2=mysqli_query($con,"delete from usuarios where id_Usuario=".$_POST['info']);
  	}
    elseif ($row['Tipo'] ==  "Candidato") {
  		$sql=mysqli_query($con,"delete from cantidato where id_Usuario=".$_POST['info']);
  		$sql2=mysqli_query($con,"delete from usuarios where id_Usuario=".$_POST['info']);
  	}
  }

 ?>
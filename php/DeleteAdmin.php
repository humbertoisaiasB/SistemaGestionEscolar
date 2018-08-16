<?php

  include ("Conexion.php");
  session_start();
  $asd = mysqli_query($con,"select * from usuarios u where u.id_usuario='$_POST[info]'");
  $row = mysqli_fetch_array($asd);
  if(isset($_POST['info'])){
  	if($row['Tipo'] == "Alumno"){
  		$sql=mysqli_query($con,"delete from alumnos where id_Usuario=".$_POST['info']);
  		$sql2=mysqli_query($con,"delete from usuarios where id_Usuario=".$_POST['info']);
  	}
  	elseif ($row['Tipo'] ==  "Maestro") {
  		$sql=mysqli_query($con,"delete from Maestro where id_Usuario=".$_POST['info']);
  		$sql2=mysqli_query($con,"delete from usuarios where id_Usuario=".$_POST['info']);
  	}
    elseif ($row['Tipo'] ==  "PersonalA") {
  		$sql=mysqli_query($con,"delete from PersonalA where id_Usuario=".$_POST['info']);
  		$sql2=mysqli_query($con,"delete from usuarios where id_Usuario=".$_POST['info']);
  	}
  }

 ?>
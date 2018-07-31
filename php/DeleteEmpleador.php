<?php

  include ("Conexion.php");
  session_start();
  if(isset($_POST['info'])){
  	$sql=mysqli_query($con,"delete from empleador where id_Usuario=".$_POST['info']);
  	$sql2=mysqli_query($con,"delete from usuarios where id_Usuario=".$_POST['info']);
  }

 ?>

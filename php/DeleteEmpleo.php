<?php
  include ("Conexion.php");
  if(isset($_POST['empleo'])){
  	$sql=mysqli_query($con,"delete from empleo where id_Empleo=".$_POST['empleo']);
  }

 ?>

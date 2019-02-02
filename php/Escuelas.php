<?php
	include 'Conexion.php';
  	session_start();
  	if($_POST['tipo'] == "Directores"){
      $sql = mysqli_query($con,"select Nom,Ap,Am,u.id_Usuario,Tipo from usuarios u where Tipo='$_POST[filtro]' and claveEscuela='$_POST[clave]' and Nom like '$_POST[busqueda]%' limit 0,6");
      while ($row=mysqli_fetch_array($sql)){
      echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
      <img src="../assets/images/estudiante.png" height="70px" width="70px">
         <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
         </a> </div>
        ';
      }
    }elseif ($_POST['tipo'] == "Escuelas") {
      $antes = mysqli_query($con, "select Modalidad from zona where clave='$_POST[clave]'");
      $row1 = mysqli_fetch_array($antes);
    	$sql = mysqli_query($con,"select nombreEscuela, clave, nombreLocalidad from zona where zonaEscolar=".$_POST['zona']." and Modalidad = '$row1[Modalidad]'");
      	while ($row=mysqli_fetch_array($sql)){
      	echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultar('."'".''.$row['clave'].''."'".');" data-toggle="modal" href="#Mod">
      	<img src="../assets/images/escuelas.png" height="70px" width="70px">
         <h5 align="center"> '.$row['nombreEscuela'].'</h5>
         <h5 align="center"> '.$row['nombreLocalidad'].'</h5>
         </a> </div>
        	';
      	}
    } 
?>
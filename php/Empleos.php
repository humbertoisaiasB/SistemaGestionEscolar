<?php 
	session_start();
	include 'Conexion.php';
	$sql=mysqli_query($con,"select * from empleo where id_Empleador=".$_SESSION['id_Empleador']." and Puesto like '$_POST[busqueda]%' " );
	if(isset($_POST['tipo']) && $_POST['tipo']=="Consultar" ){
		while ($row=mysqli_fetch_array($sql) ){
		  echo  '<div class="col-sm-4"> <a  class="thumbnail" onclick="return EmpleosA('.$row['id_Empleo'].','."'Consultar'".' )">
			<img src="../assets/images/Jobs.png" height="70px" width="70px">
		     <h5 align=center> '.$row['Puesto'].'  </h5>
		     </a> </div>';
	 	}
	}else if(isset($_POST['tipo']) && $_POST['tipo']=="Modificar" ){
		while ($row=mysqli_fetch_array($sql) ){
		  echo  '<div class="col-sm-4"> <a  class="thumbnail" onclick="return EmpleosA('.$row['id_Empleo'].','."'Modificar'".')">
			<img src="../assets/images/Jobs.png" height="70px" width="70px">
		     <h5 align=center> '.$row['Puesto'].'  </h5>
		     </a> </div>';
	 	}

	}else if (isset($_POST['tipo']) && $_POST['tipo']=="Eliminar" ){
		while ($row=mysqli_fetch_array($sql) ){
		  echo  '<div class="col-sm-4"> <a  class="thumbnail" onclick="return EmpleosA('.$row['id_Empleo'].','."'Eliminar'".')">
			<img src="../assets/images/Jobs.png" height="70px" width="70px">
		     <h5 align=center> '.$row['Puesto'].'  </h5>
		     </a> </div>';
	 	}
	}
	
?>
<?php  
	include "Conexion.php";
		$aux = strtoupper($_POST['curpC']);
		$num = strlen($aux);
		if($num == 18 || $num == 16){
			$sql=mysqli_query($con,"select a.curpAlumno from alumnos AS a WHERE a.curpAlumno like '".$_POST['curpC']."%' LIMIT 0, 6");
			$row = mysqli_fetch_array($sql);
			if($row['curpAlumno']==$aux){
				echo  '<div class="alert alert-danger" role="alert">
      					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	 					<strong>¡Cuidado!</strong> CURP duplicada, cambiela.
      			   </div>
        ';
			}else{
				echo  '<div class="alert alert-success" role="alert">
      					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	 					<strong></strong>Puede continuar.
      			   </div>
        		';
			}
		}
?>
<?php  
	include "Conexion.php";
		$aux = strtoupper($_POST['curpC']);
		$num = strlen($aux);
		$sql = "";
		if(isset($_POST['tipoU']) && $_POST['tipoU']=="Alumno"){
			$sql=mysqli_query($con,"select a.curpAlumno from alumnos AS a WHERE a.curpAlumno like '".$_POST['curpC']."%' LIMIT 0, 6");
		}elseif(isset($_POST['tipoU']) && $_POST['tipoU']=="Maestro"){
			$sql=mysqli_query($con,"select m.curpMaestro from maestro AS m WHERE m.curpMaestro like '".$_POST['curpC']."%' LIMIT 0, 6");
		}elseif(isset($_POST['tipoU']) && $_POST['tipoU']=="PersonalA"){
			$sql=mysqli_query($con,"select a.curpPersonalA from alumnos AS a WHERE a.curpAlumno like '".$_POST['curpC']."%' LIMIT 0, 6");
		}elseif(isset($_POST['tipoU']) && $_POST['tipoU']=="Director") {
			$sql=mysqli_query($con,"select d.curpDirector from director AS d WHERE d.curpDirector like '".$_POST['curpC']."%' LIMIT 0, 6");
		}
		if($num == 18 || $num == 16){
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
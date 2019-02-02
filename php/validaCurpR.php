<?php  
	function compara($cad1,$cad2,$num){
		if ($num == 18 || $num == 16) {
			if ($cad1==$cad2) {
			echo  '<div class="alert alert-danger" role="alert">
      					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	 					<strong>¡Cuidado!</strong> CURP duplicada, cambiela.
      			   </div>';
			}else{
				echo  '<div class="alert alert-success" role="alert">
      					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	 					<strong></strong>Puede continuar.
      			   </div>
        		';
			}
		}else{
			echo  '<div class="alert alert-info" role="alert">
      					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	 					<strong></strong>Buscando...
      			   </div>
        		';
		}
	}
	include "Conexion.php";
		$aux = strtoupper($_POST['curpC']);
		$num = strlen($aux);
		$sql = "";
		if(isset($_POST['tipoU']) && $_POST['tipoU']=="Alumno"){
			$sql=mysqli_query($con,"select a.curpAlumno from alumnos AS a WHERE a.curpAlumno like '".$_POST['curpC']."%' LIMIT 0, 6");
			$row = mysqli_fetch_array($sql);
			compara($row['curpAlumno'],$aux,$num);
		}elseif(isset($_POST['tipoU']) && $_POST['tipoU']=="Maestro"){
			$sql=mysqli_query($con,"select m.curpMaestro from maestro AS m WHERE m.curpMaestro like '".$_POST['curpC']."%' LIMIT 0, 6");
			$row = mysqli_fetch_array($sql);
			compara($row['curpMaestro'],$aux,$num);
		}elseif(isset($_POST['tipoU']) && $_POST['tipoU']=="PersonalA"){
			$sql=mysqli_query($con,"select pe.curpAdmi from  personaladmi AS pe WHERE pe.curpAdmi like '".$_POST['curpC']."%' LIMIT 0, 6");
			$row = mysqli_fetch_array($sql);
			compara($row['curpAdmi'],$aux,$num);
		}elseif(isset($_POST['tipoU']) && $_POST['tipoU']=="Director") {
			$sql=mysqli_query($con,"select d.curpDirector from director AS d WHERE d.curpDirector like '".$_POST['curpC']."%' LIMIT 0, 6");
			$row = mysqli_fetch_array($sql);
			compara($row['curpDirector'],$aux,$num);
		}elseif(isset($_POST['tipoU']) && $_POST['tipoU']=="Supervisor") {
			$sql=mysqli_query($con,"select s.curpSupervisor from supervisor AS s WHERE s.curpSupervisor like '".$_POST['curpC']."%' LIMIT 0, 6");
			$row = mysqli_fetch_array($sql);
			compara($row['curpSupervisor'],$aux,$num);
		}elseif(isset($_POST['tipoU']) && $_POST['tipoU']=="SubDirector") {
			$sql=mysqli_query($con,"select s.curpSubDirector from subDirector AS sb WHERE sb.curpSubDirector like '".$_POST['curpC']."%' LIMIT 0, 6");
			$row = mysqli_fetch_array($sql);
			compara($row['curpSubDirector'],$aux,$num);
		}
?>
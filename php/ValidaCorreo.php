<?php  
	function compara($cad1,$cad2,$num){
		if ($num>=8) {
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
		$aux = $_POST['correo'];
		$num = 9;
		$sql = "";
			$sql=mysqli_query($con,"select Correo from usuarios WHERE Correo like '".$_POST['correo']."%' LIMIT 0, 6");
			$row = mysqli_fetch_array($sql);
			compara($row['Correo'],$aux,$num);
?>
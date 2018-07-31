<?php 
	session_start();
	include 'Conexion.php';
	$sql=mysqli_query($con,"SELECT * FROM citas c, empleo e, empleador edr, candidato can, usuarios u where c.id_Empleo=e.id_Empleo and e.id_Empleador=edr.id_Empleador and c.id_Candidato=can.id_Candidato and can.id_Usuario=u.id_Usuario and c.Dia='0' and edr.id_Empleador=".$_SESSION['id_Empleador']);
	if(mysqli_num_rows($sql)>0){
		while ($row=mysqli_fetch_array($sql) ){
			  echo  '<div class="col-sm-4"> <a  class="thumbnail" onclick="return InfoSolicitudes('."'$row[Puesto]'".','.$row['id_Usuario'].','.$row['id_Cita'].' )"; data-toggle="modal" href="#InfoAlert" >
				<img src="../assets/images/Ndate.png" height="70px" width="70px">
				<h5 align=center> <b>'.$row['Puesto'].'</b>  </h5>
			     <h5 align=center> '.$row['Nom'].'  </h5>
			     </a> </div>';
		 	}
	}else{
		echo '<h3 align=center><b><i class="glyphicon glyphicon-remove-circle" ></i> No hay candidatos por el momento</b> </h3>';
	}	 	

?>
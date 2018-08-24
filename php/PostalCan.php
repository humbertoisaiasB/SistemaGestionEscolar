<?php 
	include ("Conexion.php");
	  if(isset($_POST['codigo']) && strlen($_POST['codigo'])==5 ) {
	  		$tipoF = (isset($_POST['tipoU']) && $_POST['tipoU']=="Alumno" || $_POST['tipoU']=="Maestro" || $_POST['tipoU']=="Director") ?  $_POST['tipoU']:"No";
	  		$result=mysqli_query($con,"Select estado, ciudad, asentamiento from sepomex where cp=$_POST[codigo]");
	  		$row=mysqli_fetch_array($result);	
	  		if(mysqli_num_rows($result)>0){
?>
	<label for="Sl_Pais<?php echo $tipoF;?>">País:</label>
	<select class="form-control" name="Sl_Pais<?php echo $tipoF;?>" >
	<option>México</option>  </select>
					      
	<label for="Sl_Estado<?php echo $tipoF;?>">Estado:</label>
	<select class="form-control" name="Sl_Estado<?php echo $tipoF;?>">
		<option> <?php echo utf8_encode($row['estado']); ?></option> 
	</select>			       
										     
   <label for="Sl_Ciudad<?php echo $tipoF;?>">Ciudad:</label>
   <select class="form-control" name="Sl_Ciudad<?php echo $tipoF;?>" >
   		<option><?php echo utf8_encode($row['ciudad']); ?></option>  
   </select>
			
	<label for="Sl_Colonia<?php echo $tipoF;?>">Colonia/Fraccionamiento:</label>
   <select class="form-control" name="Sl_Colonia<?php echo $tipoF;?>">
   		<?php if (mysqli_num_rows($result)>1){ while($row=mysqli_fetch_array($result)){?> 
   			<option><?php echo utf8_encode($row['asentamiento']); echo "</option>"; 
   			} echo "</select>";}else {
   				echo "<option>"; echo utf8_encode($row['asentamiento']); echo "</option></select>";
   			} 
   		}
   	}
?>

   											      
												      
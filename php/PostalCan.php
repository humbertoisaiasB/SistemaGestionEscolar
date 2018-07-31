<?php 
	include ("Conexion.php");
	  if(isset($_POST['txt_CPCan']) && strlen($_POST['txt_CPCan'])==5 ) {
	  		$result=mysqli_query($con,"Select estado, ciudad, asentamiento from sepomex where cp=$_POST[txt_CPCan]");
	  		$row=mysqli_fetch_array($result);	
	  		if(mysqli_num_rows($result)>0){
?>
	<label for="Sl_Pais">País:</label>
	<select class="form-control" name="Sl_Pais" >
	<option>México</option>  </select>
					      
	<label for="Sl_Estado">Estado:</label>
	<select class="form-control" name="Sl_Estado">
		<option> <?php echo utf8_encode($row['estado']); ?></option> 
	</select>			       
										     
   <label for="Sl_Ciudad">Ciudad:</label>
   <select class="form-control" name="Sl_Ciudad" >
   		<option><?php echo utf8_encode($row['ciudad']); ?></option>  
   </select>
			
	<label for="Sl_Colonia">Colonia/Fraccionamiento:</label>
   <select class="form-control" name="Sl_Colonia">
   		<?php if (mysqli_num_rows($result)>1){ while($row=mysqli_fetch_array($result)){?> 
   			<option><?php echo utf8_encode($row['asentamiento']); echo "</option>"; 
   			} echo "</select>";}else {
   				echo "<option>"; echo utf8_encode($row['asentamiento']); echo "</option></select>";
   			} 
   		}
   	}
?>

   											      
												      
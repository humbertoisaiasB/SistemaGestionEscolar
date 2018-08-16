<?php 
	include ("Conexion.php");
	  if(isset($_POST['numeroZ'])) {
	  		$sql=mysqli_query($con,"Select clave,nombreEscuela,nombreMunicipio,Turno from zona where ZonaEscolar=$_POST[numeroZ]");
?>
	<label for="nombreEs">Nombre de la secundaria:</label>
	<select class="form-control" name="nombreEs" >
		  <?php  
			if (mysqli_num_rows($sql)>0){ 
				while($row=mysqli_fetch_array($sql)){
					echo '<option value="'.$row['nombreEscuela'].'">';
					echo utf8_encode($row['nombreEscuela']);
					echo '</option>';
				}
				echo '</select>';
			}else{
				echo '<option></option>';
				echo '</select>';
			}
		}
		?>			      
<?php 
	include ("Conexion.php");
	$aux = "";
	$DivLocalidad = "";
	$Zona = "";
	$idLocalidad = "";
	$idLocalidadA = "";
	$idNombreE = ""; 
	$Clave = "";
	$Destino1A = "";
	$Destino2A = "";
	if($_POST['tipoU'] == "Alumno"){
		$DivZona = "div_ZonaA";
		$DivLoca = "div_LocalidadA";
		$DivNombreE = "nombreEscuelaA";
		$idLocalidad = "localidadA";
		$idLocalidadA = "'"."localidadA"."'";
		$idNombreE = "destinoA";
		$Clave = "'"."clavecitaCA"."'";
		$Destino1A = "'"."prueba12A"."'";
		$Destino1B = "prueba12A";
		$Destino2A = "'"."prueba13A"."'";
		$Destino3A = "'"."prueba13EA"."'";
	}elseif($_POST['tipoU'] == "Maestro") {
		$DivZona = "div_ZonaM";
		$DivLoca = "div_LocalidadM";
		$DivNombreE = "nombreEscuelaM";
		$idLocalidad = "localidadM";
		$idLocalidadA = "'"."localidadM"."'";
		$idNombreE = "destinoM";
		$Clave = "'"."clavecitaCM"."'";
		$Destino1A = "'"."prueba12M"."'";
		$Destino1B = "prueba12M";
		$Destino2A = "'"."prueba13M"."'";
		$Destino3A = "'"."prueba13EM"."'";
		
	}elseif($_POST['tipoU'] == "Director"){
		$DivZona = "div_ZonaD";
		$DivLoca = "div_LocalidadD";
		$DivNombreE = "nombreEscuelaD";
		$idLocalidad = "localidadD";
		$idLocalidadA = "'"."localidadD"."'";
		$idNombreE = "destinoD";
		$Clave = "'"."clavecitaCD"."'";
		$Destino1A = "'"."prueba12D"."'";
		$Destino1B = "prueba12D";
		$Destino2A = "'"."prueba13D"."'";
		$Destino3A = "prueba13ED";
	}elseif($_POST['tipoU'] == "personal"){
		$DivZona = "div_ZonaAdmi";
		$DivLoca = "div_LocalidadAdmi";
		$DivNombreE = "nombreEscuelaAdmi";
		$idLocalidad = "localidadAdmi";
		$idLocalidadA = "'"."localidadAdmi"."'";
		$idNombreE = "destinoAdmi";
		$Clave = "'"."clavecitaCAdmi"."'";
		$Destino1A = "'"."prueba12Admi"."'";
		$Destino1B = "prueba12Admi";
		$Destino2A = "'"."prueba13Admi"."'";
		$Destino3A = "prueba13EAdmi";
	}elseif($_POST['tipoU'] == "Supervisor") {
		$DivZona = "div_ZonaSupervisor";
		$DivLoca = "div_LocalidadSupervisor";
		$DivNombreE = "nombreEscuelaSupervisor";
		$idLocalidad = "localidadSupervisor";
		$idLocalidadA = "'"."localidadSupervisor"."'";
		$idNombreE = "destinoSupervisor";
		$Clave = "'"."clavecitaCSupervisor"."'";
		$Destino1A = "'"."prueba12Supervisor"."'";
		$Destino1B = "prueba12Supervisor";
		$Destino2A = "'"."prueba13Supervisor"."'";
		$Destino3A = "'"."prueba13ESupervisor"."'";
		
	}
	if(isset($_POST['numeroZ'])){
	  		$sql=mysqli_query($con,"Select clave,nombreEscuela,nombreLocalidad,Turno, ZonaEscolar from zona where ZonaEscolar=$_POST[numeroZ]");
?>	
	<div style="display:inline-flex;
				margin-top:20px;">
				<div id="<?php echo $DivZona;?>" style="display: inline-flex; margin-bottom: 3px; margin: 5px;">
					<label style="margin:4px;">Zona: <span class="label label-success"><?php echo $_POST['numeroZ']; ?></span></label>
				</div>
				<div id="<?php echo $DivLoca;?>" style="display: inline-flex; margin-bottom: 3px; margin: 5px;">
					<label style="margin: 4px" for="<?php echo $idLocalidad;?>">Localidad:</label>
	<select class="form-control" name="<?php echo $idLocalidad;?>" id="<?php echo $idLocalidad;?>" onchange="return ShowSelected(<?php echo $idLocalidadA;?>,<?php echo $Clave;?>,<?php echo $Destino1A;?>,<?php echo $Destino2A;?>,<?php echo $Destino3A;?>);">
		<option value="">Seleciona una opcion</option>
		  <?php  
			if (mysqli_num_rows($sql)>0){ 
				while($row=mysqli_fetch_array($sql)){
					echo '<option value="'.$row['nombreEscuela'].'-'.$row['clave'].'">';
					echo utf8_encode($row['nombreLocalidad']);
					echo '</option>';
				}
				echo '</select>';
			}else{
				echo '<option></option>';
				echo '</select>';
			}
		}
?>	
	</div>
	<div id="<?php echo $DivNombreE;?>" style="display: inline-flex; margin-bottom: 3px; margin: 5px;">
		<label style="margin: 4px;">Nombre: <span id="<?php echo $Destino1B;?>"class="label label-info"></span></label>
	</div>
</div>
	
	

	      
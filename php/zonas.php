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
	$Modalidad = "";
	if($_POST['tipoU'] == "Alumno"){
		$DivZona = "div_ZonaAlumno";
		$DivLoca = "div_LocalidadAlumno";
		$DivNombreE = "nombreEscuelaAlumno";
		$idLocalidad = "localidadAlumno";
		$idLocalidadA = "'"."localidadAlumno"."'";
		$idNombreE = "destinoAlumno";
		$Clave = "'"."clavecitaCAlumno"."'";
		$Destino1A = "'"."prueba12Alumno"."'";
		$Destino1B = "prueba12Alumno";
		$Destino2A = "'"."prueba13Alumno"."'";
		$Destino3A = "'"."prueba13EAlumno"."'";
	}elseif($_POST['tipoU'] == "Maestro") {
		$DivZona = "div_ZonaMaestro";
		$DivLoca = "div_LocalidadMaestro";
		$DivNombreE = "nombreEscuelaMaestro";
		$idLocalidad = "localidadMaestro";
		$idLocalidadA = "'"."localidadMaestro"."'";
		$idNombreE = "destinoMaestro";
		$Clave = "'"."clavecitaCMaestro"."'";
		$Destino1A = "'"."prueba12Maestro"."'";
		$Destino1B = "prueba12Maestro";
		$Destino2A = "'"."prueba13Maestro"."'";
		$Destino3A = "'"."prueba13EMaestro"."'";
		
	}elseif($_POST['tipoU'] == "Director"){
		$DivZona = "div_ZonaDirector";
		$DivLoca = "div_LocalidadDirector";
		$DivNombreE = "nombreEscuelaDirector";
		$idLocalidad = "localidadDirector";
		$idLocalidadA = "'"."localidadDirector"."'";
		$idNombreE = "destinoDirector";
		$Clave = "'"."clavecitaCDirector"."'";
		$Destino1A = "'"."prueba12Director"."'";
		$Destino1B = "prueba12Director";
		$Destino2A = "'"."prueba13Director"."'";
		$Destino3A = "'"."prueba13EDirector"."'";
	}elseif($_POST['tipoU'] == "PersonalA"){
		$DivZona = "div_ZonaPersonalA";
		$DivLoca = "div_LocalidadPersonalA";
		$DivNombreE = "nombreEscuelaPersonalA";
		$idLocalidad = "localidadPersonalA";
		$idLocalidadA = "'"."localidadPersonalA"."'";
		$idNombreE = "destinoPersonalA";
		$Clave = "'"."clavecitaCPersonalA"."'";
		$Destino1A = "'"."prueba12PersonalA"."'";
		$Destino1B = "prueba12PersonalA";
		$Destino2A = "'"."prueba13PersonalA"."'";
		$Destino3A = "'"."prueba13EPersonalA"."'";
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
		
	}elseif($_POST['tipoU'] == "SubDirector") {
		$DivZona = "div_ZonaSubDirector";
		$DivLoca = "div_LocalidadSubDirector";
		$DivNombreE = "nombreEscuelaSubDirector";
		$idLocalidad = "localidadSubDirector";
		$idLocalidadA = "'"."localidadSubDirector"."'";
		$idNombreE = "destinoSubDirector";
		$Clave = "'"."clavecitaCSubDirector"."'";
		$Destino1A = "'"."prueba12SubDirector"."'";
		$Destino1B = "prueba12SubDirector";
		$Destino2A = "'"."prueba13SubDirector"."'";
		$Destino3A = "'"."prueba13ESubDirector"."'";
		
	}
	if(isset($_POST['numeroZ'])){
		//Modificaciones aqui
		if($_POST['tipoU'] == "Supervisor"){
			$sql = mysqli_query($con,"select s.claveS,s.Modalidad,z.clave,s.nombre FROM zona AS z INNER JOIN supervicion AS s ON (z.Modalidad=s.Modalidad)WHERE z.Modalidad='$_POST[modalidad]' and z.zonaEscolar=$_POST[numeroZ] and s.claveS='$_POST[claveE]' limit 0,1");
			$row = mysqli_fetch_array($sql);
			?>
			<div style="display:inline-flex;
				margin-top:20px;">
			<div id="<?php echo $DivZona;?>" style="display: inline-flex; margin-bottom: 3px; margin: 5px;">
					<label style="margin:4px;">Zona: <span class="label label-success"><?php echo $_POST['numeroZ']; ?></span></label>
				</div>
				<div id="<?php echo $DivLoca;?>" style="display: inline-flex; margin-bottom: 3px; margin: 5px;">
					<label style="margin: 4px" for="<?php echo $idLocalidad;?>">Localidad:</label>
	<select class="form-control" name="<?php echo $idLocalidad;?>" id="<?php echo $idLocalidad;?>" onchange="return ShowSelectedSupervisor(<?php echo $idLocalidadA;?>,<?php echo $Clave;?>,<?php echo $Destino1A;?>,<?php echo $Destino2A;?>,<?php echo $Destino3A;?>);">
		<option value="todo">Selecione una opcion.</option>
		<option value="<?php echo ''.$row['nombre'].'-'.$row['clave'].'';?>"><?php echo " - ".$row['nombre'];?></option>
	</select>	
	</div>
<?php
	}else{
		$sql = mysqli_query($con,"Select clave,nombreEscuela,nombreLocalidad,Turno, ZonaEscolar from zona where ZonaEscolar=$_POST[numeroZ] and Modalidad='$_POST[modalidad]'"); 
?>			
			<div style="display:inline-flex;
				margin-top:20px;">
				<div id="<?php echo $DivZona;?>" style="display: inline-flex; margin-bottom: 3px; margin: 5px;">
					<label style="margin:4px;">Zona: <span class="label label-success"><?php echo $_POST['numeroZ']; ?></span></label>
				</div>
				<div id="<?php echo $DivLoca;?>" style="display: inline-flex; margin-bottom: 3px; margin: 5px;">
					<label style="margin: 4px" for="<?php echo $idLocalidad;?>">Escuelas:</label>
	<select class="form-control" name="<?php echo $idLocalidad;?>" id="<?php echo $idLocalidad;?>" onchange="return ShowSelected(<?php echo $idLocalidadA;?>,<?php echo $Clave;?>,<?php echo $Destino1A;?>,<?php echo $Destino2A;?>,<?php echo $Destino3A;?>);">
		<option value="">Seleciona una opcion</option>
		  <?php  
			if (mysqli_num_rows($sql)>0){ 
				while($row=mysqli_fetch_array($sql)){
					echo '<option value="'.$row['nombreEscuela'].'-'.$row['clave'].'">';
					echo utf8_encode($row['nombreEscuela'])." - ".$row['clave'];
					echo '</option>';
					$Modalidad = $row['Modalidad'];
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

<?php  
	if($_POST['tipoU'] != "Alumno" ){
		?>
		<div class="alert alert-danger" role="alert">
      						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	 						<strong>¡Cuidado!</strong> A continuacion tienes que selecionar tu funcion en la escuela donde laboras.
      				</div>
    <div id="div_S_Quehace<?php echo $_POST['tipoU'];?>" style="display: inline-flex;margin: 20px; ">
					<label for="S_Quehace<?php echo $_POST['tipoU'];?>">Funcion:  </label>
					<select class="form-control" name="S_Quehace<?php echo $_POST['tipoU'];?>" id="S_Quehace<?php echo $_POST['tipoU'];?>" onchange="return funcionDeterminada('S_Quehace<?php echo $_POST['tipoU']?>','#decide<?php echo $_POST['tipoU']?>','<?php echo $_POST['tipoU']?>','<?php echo $_POST['modalidad'];?>');">
						<option value="ninguno">Elige una opcion</option>
						<option value="super">Enlace de supervicion</option>
						<option value="maestroG">Maestro de Grupo</option>
						<option value="directorG">Enlace de Dirección con Grupo</option>
						<option value="directorNG">Enlace de Dirección sin Grupo</option>
						<option value="sub">SubDirector</option>
						<option value="asesorP">Asesor Técnico Pedagógico</option>
						<option value="otra">Otra funcion...</option>
					</select>
				</div>
				 <div id="decide<?php echo $_POST['tipoU'];?>">
          
        		</div>
				<!-- Aqui empieza la modificacion -->  
		<?php
	}else{
		?>
		<div id="div_S_Quehace<?php echo $_POST['tipoU'];?>" style="display: inline-flex;margin: 10px; ">
			<label for="S_Quehace<?php echo $_POST['tipoU'];?>"></label>
					<select class="form-control" name="S_Quehace<?php echo $_POST['tipoU'];?>" id="S_Quehace<?php echo $_POST['tipoU'];?>" onchange="return funcionDeterminada('S_Quehace<?php echo $_POST['tipoU']?>','#decide<?php echo $_POST['tipoU']?>','<?php echo $_POST['tipoU']?>','<?php echo $_POST['modalidad'];?>');">
						<option value="ninguno">Elige una opcion</option>
						<option value="nuevo">Proporciona tu grado y grupo</option>
					</select>
				</div>
				 <div id="decide<?php echo $_POST['tipoU'];?>">
          
        		</div>
		<?php  
	}
?>    
	<?php  }?>
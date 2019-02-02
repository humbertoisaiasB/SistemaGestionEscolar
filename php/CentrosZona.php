	<?php  
		include ("Conexion.php");
		if($_POST['tipo'] == "Supervisor"){
		$i= 0;
		//Cosas que tendra la tabla en la base de datos
		//NommbreTabla : supervicion
		//Atributos : 
		$sql=mysqli_query($con,"select s.zonaEscolar,s.claveS,s.Modalidad,s.nombre from supervicion as s where s.Modalidad='$_POST[modalidad]' ORDER BY s.zonaEscolar  ");
	?>
	<!-- Aqui voy a poner el codigo que agregare -->
	<div id="div_Zona<?php echo $_POST['tipo'];?>" class="row">
		<label style="margin: 5px;" id="tipoModalidad<?php echo $_POST['tipo'];?>"></label>Tipo de Modalidad:<span style="margin:10px;font-size: 15px;" id="Modalidad" name="prueba13<?php echo $_POST['tipo'];?>" class="label label-info"><?php echo $_POST['modalidad']."";?></span><input type="hidden" id="prueba14<?php echo $_POST['tipo'];?>" name="prueba14<?php echo $_POST['tipo'];?>" value="<?php echo $_POST['modalidad']."";?>">
		<div class="col-2">
			<div class="btn-group btn-lg" role="group">
				<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Supervisiones
				<span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<!-- Aqui tengo que agregar los cambios para que este metodo pueda abirir centros de trabajos mas no zonas en si-->

					<!-- Aqui acaba ese codigo -->
					<?php
					if (mysqli_num_rows($sql)>0){ 
						while($row=mysqli_fetch_array($sql)){
							$i++;
							echo '<li value="'.$row['claveS'].'"><a onclick="return zonaRD('.$row['zonaEscolar'].','."'".''.$_POST['tipo'].''."'".','."'"."#zonaY".$_POST['tipo']."'".','."'".$_POST['modalidad']."'".','."'".''.$row['claveS'].''."'".');">'.$row['nombre'].'</a></li>';
						}
						$i=0;
					}else{
						echo '<li ><a> Queso </a></li>';
					}
					?>
				</ul>
			</div>
			<div id="clave<?php echo $_POST['tipo'];?>" style="display: inline-flex; margin-bottom: 3px; margin: 5px;">
		<label style="margin: 5px;" id="clavecitaC<?php echo $_POST['tipo'];?>"></label><span style="margin:10px;font-size: 15px;" id="prueba13<?php echo $_POST['tipo'];?>" name="prueba13<?php echo $_POST['tipo'];?>" class="label label-info"></span><input type="hidden" id="prueba13E<?php echo $_POST['tipo'];?>" name="prueba13E<?php echo $_POST['tipo'];?>" value="">
			</div>
		</div>
		<div id="zonaY<?php echo $_POST['tipo'];?>"></div>
		<div>
			
		</div>
	</div>
	<!-- Hey aqui -->
	<?php  
		}else{
	?>
	<div id="div_Zona<?php echo $_POST['tipo'];?>" class="row">
		<label style="margin: 5px;" id="tipoModalidad<?php echo $_POST['tipo'];?>"></label>Tipo de Modalidad:<span style="margin:10px;font-size: 15px;" id="Modalidad" name="prueba13<?php echo $_POST['tipo'];?>" class="label label-info"><?php echo $_POST['modalidad']."";?></span><input type="hidden" id="prueba14<?php echo $_POST['tipo'];?>" name="prueba14<?php echo $_POST['tipo'];?>" value="<?php echo $_POST['modalidad']."";?>">
		<div class="col-2">
			<div class="btn-group btn-lg" role="group">
				<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Zona escolar
				<span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<?php

						$nada="";
						$total= 0;
						$limite = $_POST['modalidad']."";
						if($limite=="Telesecundaria"){
							$total = 56;
						}elseif ($limite == "Tecnicas") {
							$total = 21;
						}else{
							$total = 46;
						}
						for($i=1; $i<=$total; $i++){
							echo '<li value="'.$i.'"><a onclick="return zonaRD('.$i.','."'".''.$_POST['tipo'].''."'".','."'"."#zonaY".$_POST['tipo']."'".','."'".$_POST['modalidad']."'".','.$nada.');">'.$i.'</a></li>';
						}
					?>
				</ul>
			</div>
			<div id="clave<?php echo $_POST['tipo'];?>" style="display: inline-flex; margin-bottom: 3px; margin: 5px;">
		<label style="margin: 5px;" id="clavecitaC<?php echo $_POST['tipo'];?>"></label><span style="margin:10px;font-size: 15px;" id="prueba13<?php echo $_POST['tipo'];?>" name="prueba13<?php echo $_POST['tipo'];?>" class="label label-info"></span><input type="hidden" id="prueba13E<?php echo $_POST['tipo'];?>" name="prueba13E<?php echo $_POST['tipo'];?>" value="">
			</div>
		</div>
		<div id="zonaY<?php echo $_POST['tipo'];?>"></div>
		<div>
			
		</div>
	</div>
	<?php  
}?>
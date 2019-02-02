<?php  
	include "Conexion.php";
	$Grupos = array("A","B","C","D","E","F","G");
	$contenidoDetodo = array("","","","","","","","");
	//Arrreglo de los de muchos donde tengo que...
	//donde datosR([modalidad],[clave],[grado],[grupo])
	//inicia
	//Aqui iran las varibles
	//Las Modalidades
	$modalidades = "";
	//Los centros
	$centros = "";
	//Los grados
	$grados = "";
	//los grupos
	$grupos = "";
	//termina
	$datosR = array(
		array("", "", "", ""),
		array("", "", "", ""),
		array("", "", "", ""),
		array("", "", "", "")
	);
	if(isset($_POST['todo'])){
		$numero = strlen($_POST['todo']);
		$variable = $_POST['todo'];
		$variable1 = "";
		$auxPalabras = "";
		$cont = 0;
		$cont1 = 0;
		for($i=0; $i < $numero; $i++){
			if($variable[$i] == "*"){
				$contenidoDetodo[$cont]=$auxPalabras;
				$cont++;
				$auxPalabras = "";
			}else{
				$auxPalabras = $auxPalabras."".$variable[$i];
			} 
		}
		$auxPalabras = "";
		for($i=0; $i < $cont; $i++){ 
			$variable1 = $contenidoDetodo[$i];
			for($j=0; $j<strlen($contenidoDetodo[$i]); $j++){ 
				if($variable1[$j] == "|"){
					$datosR[$i][$cont1] = $auxPalabras;
					$cont1++;
					$auxPalabras = "";
				}else{
					$auxPalabras = $auxPalabras."".$variable1[$j];
				}	
			}
      $cont1 =0;
			$variable1 = "";
		}
		//Aqui ya con datos el arreglo datosR
		//esto mostrara a todos sus alumnos
		//Recordando que modalidad|clave|grado|grupo
		for($i=0; $i<$cont; $i++){ 
			$modalidad = $datosR[$i][0];
      		$clave = $datosR[$i][1];
      		$grado = $datosR[$i][2];
      		$grupo = $datosR[$i][3];
      		$modalidades = $modalidades.'<option value="'."$modalidad".'">'.$modalidad.'</option>\n';
      		$centros = $centros.'<option value="'."$clave".'">'.$clave.'</option>\n';
      		$grados = $grados.'<option value="'."$grado".'">'.$grado.'</option>\n';
      		$grupos = $grupos.'<option value="'."$grupo".'">'.$grupo.'</option>\n';
		}
	}else{
    echo "Orale no entra al primerooo";
  }
?>
<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="text-align:center;">Informes</h4>
    </div>
    <div class="modal-body">
		<div id="div_Datos<?php echo $_POST['tipo'];?>" class="row">
			<div class="col-2">
				<?php
				 //Aqui empieza el filtrado de datos
			     //Se tiene queescojer por medio de la variable post y el parametro tipo
			     //Con para pretende hacer otro filtro para ser mas especificos.
				//La primera seria listado: listado
				//La segunda seria expediente listado: expediente
				//La tercera seria Total de H y M: total
				//La cuarta seria ficha de identificacion: identificacion
				//La quinta seria reporte personal de archivos subidos ala plataforma: personal
			     if($_POST['tipo'] == "listado"){
			     	if($_POST['para'] == "Alumno"){
			     		//Aqui pegamos el codigo del modal
			     		?>
			     		<label>Escoja el centro de trabajo asi como el grado y el grupo.</label>
						<div class="alert alert-info" role="alert">
      					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	 					<strong>¡Atencion!</strong> Aqui usted podra utilizar los diferentes filtos para la creacion de el informe que mas se adapte a sus necesidades.
      					</div>
						<div style="display:block;margin:10px;">
							<div id="div_S_Modalidad<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px; ">
								<label for="S_Modalidad<?php echo $_POST['tipoU'];?>">Modalidad:</label>
								<select class="form-control" name="S_Modalidad<?php echo $_POST['tipoU'];?>" id="S_Modalidad<?php echo $_POST['tipoU'];?>">
									<option value="todos">Todos las modalidades</option>
									<?php 
										echo $modalidades;
									 ?>
								</select>
							</div>
							<div id="div_S_Centros<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px; ">
								<label for="S_Centros<?php echo $_POST['tipoU'];?>">Centro de trabajo:</label>
								<select class="form-control" name="S_Centros<?php echo $_POST['tipoU'];?>" id="S_Centros<?php echo $_POST['tipoU'];?>">
									<option value="todos">Todos sus centros de trabajo</option>
									<?php 
										echo $centros;
									 ?>
								</select>
							</div>
						<div id="div_S_Grados<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px; ">
							<label for="S_Grados<?php echo $_POST['tipoU'];?>">Grado:</label>
							<select class="form-control" name="S_Grados<?php echo $_POST['tipoU'];?>" id="S_Grados<?php echo $_POST['tipoU'];?>">
								<option value="todos">Todos sus grados</option>
								<?php 
									echo $grados;
								?>
							</select>
						</div>
						<div id="div_S_Grupos<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px;">
							<label for="S_Grupos<?php echo $_POST['tipoU'];?>">Grupo:</label>
							<select class="form-control" name="S_Grupos<?php echo $_POST['tipoU'];?>" id="S_Grupos<?php echo $_POST['tipoU'];?>">
								<option value="todos">Todos sus grupos</option>
								<?php 
									echo $grupos;
								?>
							</select>
						</div>
						<button class="btn btn-success" onclick="return crearPdf('listado','<?php echo $_POST['tipoU'];?>','#resultado');">crear</button>
						<div id="resultado">
							
						</div>
					</div>
			     		<?php 
			     		//Aqui termina el codigo del modal
			     	}elseif ($_POST['para'] == "Maestro") {
			     		
			     	}elseif ($_POST['para'] == "PersonalA") {
			     		
			     	}elseif ($_POST['para'] == "Director"){

			     	}elseif ($_POST['para'] == "SubDirector"){

			     	}
			     }elseif($_POST['tipo'] == "expediente"){
			     	if ($_POST['para'] == "Alumno") {
			     		//Aqui pegamos el codigo del modal
			     		?>
			     		<label>Escoja el centro de trabajo asi como el grado y el grupo.</label>
						<div class="alert alert-info" role="alert">
      					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	 					<strong>¡Atencion!</strong> Aqui usted podra utilizar los diferentes filtos para la creacion de el informe que mas se adapte a sus necesidades.
      					</div>
						<div style="display:block;margin:10px;">
							<div id="div_S_Modalidad<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px; ">
								<label for="S_Modalidad<?php echo $_POST['tipoU'];?>">Modalidad:</label>
								<select class="form-control" name="S_Modalidad<?php echo $_POST['tipoU'];?>" id="S_Modalidad<?php echo $_POST['tipoU'];?>">
									<option value="todos">Todos las modalidades</option>
									<?php 
										echo $modalidades;
									 ?>
								</select>
							</div>
							<div id="div_S_Centros<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px; ">
								<label for="S_Centros<?php echo $_POST['tipoU'];?>">Centro de trabajo:</label>
								<select class="form-control" name="S_Centros<?php echo $_POST['tipoU'];?>" id="S_Centros<?php echo $_POST['tipoU'];?>">
									<option value="todos">Todos sus centros de trabajo</option>
									<?php 
										echo $centros;
									 ?>
								</select>
							</div>
						<div id="div_S_Grados<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px; ">
							<label for="S_Grados<?php echo $_POST['tipoU'];?>">Grado:</label>
							<select class="form-control" name="S_Grados<?php echo $_POST['tipoU'];?>" id="S_Grados<?php echo $_POST['tipoU'];?>">
								<option value="todos">Todos sus grados</option>
								<?php 
									echo $grados;
								?>
							</select>
						</div>
						<div id="div_S_Grupos<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px;">
							<label for="S_Grupos<?php echo $_POST['tipoU'];?>">Grupo:</label>
							<select class="form-control" name="S_Grupos<?php echo $_POST['tipoU'];?>" id="S_Grupos<?php echo $_POST['tipoU'];?>">
								<option value="todos">Todos sus grupos</option>
								<?php 
									echo $grupos;
								?>
							</select>
						</div>
						<button class="btn btn-success" onclick="return crearPdf('expediente','<?php echo $_POST['tipoU'];?>','#resultado');">crear</button>
						<div id="resultado">
							
						</div>
					</div>
			     		<?php 
			     		//Aqui termina el codigo del modal
			     	}elseif ($_POST['para'] == "Maestro") {
			     		
			     	}elseif ($_POST['para'] == "PersonalA") {
			     		
			     	}elseif ($_POST['para'] == "Director"){

			     	}elseif ($_POST['para'] == "SubDirector"){

			     	}

			     }elseif ($_POST['tipo'] == "total"){
			     	if ($_POST['para'] == "Alumno") {
			     		//Aqui pegamos el codigo del modal
			     		?>
			     		<label>Escoja el centro de trabajo asi como el grado y el grupo.</label>
						<div class="alert alert-info" role="alert">
      					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	 					<strong>¡Atencion!</strong> Aqui usted podra utilizar los diferentes filtos para la creacion de el informe que mas se adapte a sus necesidades.
      					</div>
						<div style="display:block;margin:10px;">
							<div id="div_S_Modalidad<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px; ">
								<label for="S_Modalidad<?php echo $_POST['tipoU'];?>">Modalidad:</label>
								<select class="form-control" name="S_Modalidad<?php echo $_POST['tipoU'];?>" id="S_Modalidad<?php echo $_POST['tipoU'];?>">
									<option value="todos">Todos las modalidades</option>
									<?php 
										echo $modalidades;
									 ?>
								</select>
							</div>
							<div id="div_S_Centros<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px; ">
								<label for="S_Centros<?php echo $_POST['tipoU'];?>">Centro de trabajo:</label>
								<select class="form-control" name="S_Centros<?php echo $_POST['tipoU'];?>" id="S_Centros<?php echo $_POST['tipoU'];?>">
									<option value="todos">Todos sus centros de trabajo</option>
									<?php 
										echo $centros;
									 ?>
								</select>
							</div>
						<div id="div_S_Grados<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px; ">
							<label for="S_Grados<?php echo $_POST['tipoU'];?>">Grado:</label>
							<select class="form-control" name="S_Grados<?php echo $_POST['tipoU'];?>" id="S_Grados<?php echo $_POST['tipoU'];?>">
								<option value="todos">Todos sus grados</option>
								<?php 
									echo $grados;
								?>
							</select>
						</div>
						<div id="div_S_Grupos<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px;">
							<label for="S_Grupos<?php echo $_POST['tipoU'];?>">Grupo:</label>
							<select class="form-control" name="S_Grupos<?php echo $_POST['tipoU'];?>" id="S_Grupos<?php echo $_POST['tipoU'];?>">
								<option value="todos">Todos sus grupos</option>
								<?php 
									echo $grupos;
								?>
							</select>
						</div>
						<div id="div_S_Sexo<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px;">
							<label for="S_Sexo<?php echo $_POST['tipoU'];?>">Grupo:</label>
							<select class="form-control" name="S_Sexo<?php echo $_POST['tipoU'];?>" id="S_Sexo<?php echo $_POST['tipoU'];?>">
								<option value="todos">Hombre y mujer</option>
								<option value="Masculino">Hombre</option>
								<option value="Femenino">Mujer</option>
							</select>
						</div>
						<button class="btn btn-success" onclick="return crearPdf('total','<?php echo $_POST['tipoU'];?>','#resultado');">crear</button>
						
					</div>
			     		<?php 
			     		//Aqui termina el codigo del modal
			     	}elseif ($_POST['para'] == "Maestro") {
			     		
			     	}elseif ($_POST['para'] == "PersonalA") {
			     		
			     	}elseif ($_POST['para'] == "Director"){

			     	}elseif ($_POST['para'] == "SubDirector"){

			     	}
			     }elseif ($_POST['tipo'] == "identificacion"){
			     	if ($_POST['para'] == "Alumno") {
			     		//Aqui pegamos el codigo del modal
			     		?>
			     		<label>Escoja lo que llevara su ficha de identificacion.</label>
						<div class="alert alert-info" role="alert">
      					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	 					<strong>¡Atencion!</strong> Aqui usted podra utilizar los diferentes filtos para la creacion de el informe que mas se adapte a sus necesidades.
      					</div>
						<div style="display:block;margin:10px;">
							<div id="div_S_Centros<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px; ">
								<label for="S_Centros<?php echo $_POST['tipoU'];?>">Centro de trabajo:</label>
								<select class="form-control" name="S_Centros<?php echo $_POST['tipoU'];?>" id="S_Centros<?php echo $_POST['tipoU'];?>">
									<option value="todos">Todos sus centros de trabajo</option>
									<?php 
										echo $centros;
									 ?>
								</select>
							</div>
						<div id="div_S_Grados<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px; ">
							<label for="S_Grados<?php echo $_POST['tipoU'];?>">Grado:</label>
							<select class="form-control" name="S_Grados<?php echo $_POST['tipoU'];?>" id="S_Grados<?php echo $_POST['tipoU'];?>">
								<option value="todos">Todos sus grados</option>
								<?php 
									echo $grados;
								?>
							</select>
						</div>
						<div id="div_S_Grupos<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px;">
							<label for="S_Grupos<?php echo $_POST['tipoU'];?>">Grupo:</label>
							<select class="form-control" name="S_Grupos<?php echo $_POST['tipoU'];?>" id="S_Grupos<?php echo $_POST['tipoU'];?>">
								<option value="todos">Todos sus grupos</option>
								<?php 
									echo $grupos;
								?>
							</select>
						</div>
						<button class="btn btn-success" onclick="return crearPdf('identificacion','<?php echo $_POST['tipoU'];?>','#resultado');">crear</button>
						<div id="resultado">
							
						</div>
					</div>
			     		<?php 
			     		//Aqui termina el codigo del modal
			     	}elseif ($_POST['para'] == "Maestro") {
			     		
			     	}elseif ($_POST['para'] == "PersonalA") {
			     		
			     	}elseif ($_POST['para'] == "Director"){

			     	}elseif ($_POST['para'] == "SubDirector"){

			     	}
			     }elseif ($_POST['tipo'] == "personal") {
			     	if ($_POST['para'] == "Alumno") {
			     		//Aqui pegamos el codigo del modal
			     		?>
			     		<label>Escoja el centro de trabajo asi como el grado y el grupo.</label>
						<div class="alert alert-info" role="alert">
      					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	 					<strong>¡Atencion!</strong> Aqui usted podra utilizar los diferentes filtos para la creacion de el informe que mas se adapte a sus necesidades.
      					</div>
						<div style="display:block;margin:10px;">
							<div id="div_S_Centros<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px; ">
								<label for="S_Centros<?php echo $_POST['tipoU'];?>">Centro de trabajo:</label>
								<select class="form-control" name="S_Centros<?php echo $_POST['tipoU'];?>" id="S_Centros<?php echo $_POST['tipoU'];?>">
									<option value="todos">Todos sus centros de trabajo</option>
									<?php 
										echo $centros;
									 ?>
								</select>
							</div>
						<div id="div_S_Grados<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px; ">
							<label for="S_Grados<?php echo $_POST['tipoU'];?>">Grado:</label>
							<select class="form-control" name="S_Grados<?php echo $_POST['tipoU'];?>" id="S_Grados<?php echo $_POST['tipoU'];?>">
								<option value="todos">Todos sus grados</option>
								<?php 
									echo $grados;
								?>
							</select>
						</div>
						<div id="div_S_Grupos<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px;">
							<label for="S_Grupos<?php echo $_POST['tipoU'];?>">Grupo:</label>
							<select class="form-control" name="S_Grupos<?php echo $_POST['tipoU'];?>" id="S_Grupos<?php echo $_POST['tipoU'];?>">
								<option value="todos">Todos sus grupos</option>
								<?php 
									echo $grupos;
								?>
							</select>
						</div>
						<button class="btn btn-success" onclick="return crearPdf('personal','<?php echo $_POST['tipoU'];?>','#resultado');">crear</button>
						<div id="resultado">
							
						</div>
					</div>
			     		<?php 
			     		//Aqui termina el codigo del modal
			     	}elseif ($_POST['para'] == "Maestro") {
			     		
			     	}elseif ($_POST['para'] == "PersonalA") {
			     		
			     	}elseif ($_POST['para'] == "Director"){

			     	}elseif ($_POST['para'] == "SubDirector"){

			     	}
			     }
				 ?>
            </div>
            <?php

             ?>
		</div>
	</div>
    </div>
  </div>
</div>
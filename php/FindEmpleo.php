<?php 
	include 'Conexion.php';
	//Los documentos son 8 y son:
	session_start();
	$nombreArchivoC = "";
	$compara = $_POST['curp']."_";
	$nombreDocu = array("".$compara."BG","".$compara."CP","".$compara."CU","".$compara."IMF","".$compara."IMD","".$compara."IPF","".$compara."IPD","".$compara."CD","".$compara."CM","".$compara."AN");
	$nombresArchivos = array("Boleta de calificaciones de 6 grado.","Certificado de primaria.","CURP del alumno.","INE de la Mamá(Frente).","INE de la Mamá(Detrás)","INE del Papá(Frente).","INE del Papá(Detrás)","Comprobante de Domicilio.","Certificado Medico.","Acta de Nacimiento.");
	$aux = array("no","no","no","no","no","no","no","no","no","no");
	$documentos = 9;
	$caso = "no";
	$cont = 0;
	$aux1 = "";
	$sql=mysqli_query($con,"select u.id_Usuario, u.Nom, a.id_Alumno, a.curpAlumno, u.Documento FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.id_Usuario='$_POST[busqueda]' && u.id_Usuario=a.id_Usuario");

	if (mysqli_num_rows($sql)>0){
		while ($row=mysqli_fetch_array($sql)){
			if($documentos!=$row['Documento']){
				$directorio = opendir("documentos/alumno/$row[curpAlumno]"); //ruta actual
					while($archivo = readdir($directorio)){
						if (!is_dir($archivo)) {
							$nombreArchivoC = nombreCadena($archivo);
							$aux[$cont] = $nombreArchivoC;
							$cont = $cont + 1;
						}
					}
					for($i=0; $i<=$documentos; $i++){ 
						for($j=0; $j<=$documentos; $j++){
							if($nombreDocu[$i]==$aux[$j]){
								$aux1=$aux[$j];
								$caso = "si";
								echo  '<div class="col-sm-3 cambio thumbnail"> <a onclick="return InfoSolicitudes('.$row['id_Usuario'].','."'".$aux1."'".','."'".$caso."'".','.$i.','."'".''.$_POST['curp'].''."'".');" data-toggle="modal" href="#InfoAlert">
			<img src="../assets/images/Empleos/'.rand(1,9).'.png" height="70px" width="70px">
		   <h5 align=center><b>'.$nombresArchivos[$i].'</b></h5>
		   <h5 align=center><b> Archivo gestionado. </b></h5>
		     </a>
		     
		     </div>
		     <div id="InfoAlert" class="modal fade" role="dialog"></div>
		     ';
							}
						}
						if($nombreDocu[$i]!=$aux1){
							$caso = "no";
                        		echo  '<div class="col-sm-3 cambioN thumbnail"> <a onclick="return InfoSolicitudes('.$row['id_Usuario'].','."'".$nombreDocu[$i]."'".','."'".$caso."'".','.$i.','."'".''.$_POST['curp'].''."'".');" data-toggle="modal" href="#InfoAlert">
			<img src="../assets/images/Empleos/'.rand(1,9).'.png" height="70px" width="70px">
		   <h5 align=center><b>'.$nombresArchivos[$i].'</b> </h5>
		   <h5 align=center><b> Archivo no gestionado </b> </h5>
		     </a>
		     
		     </div>
		     <div id="InfoAlert" class="modal fade" role="dialog"></div>
		     ';
						}
						}
					}
			}
	 	
	}else{
		echo '<h2 align=center > 
		<i class="glyphicon glyphicon-eye-close"></i> <b>La docementacion esta completa. '.$_POST['busqueda'].'</b> <h2>';
	}	
	function nombreCadena($largo){
		$chico = "";
		$total = strlen($largo);
		for($i=0; $i<=$total; $i=$i+1){
			if($largo[$i]=="."){
				$chico = substr($largo, 0, $i);
				break;
			}else{
				$chico = "Queso";
			}
		}
		return $chico;
	}
?>
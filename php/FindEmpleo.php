<?php 
	include 'Conexion.php';
	//Los documentos son 8 y son:
	session_start();
	$nombreArchivoC = "";
	$compara = $_POST['curp']."_";
	if(isset($_POST['tipo']) && $_POST['tipo']=="Alumno"){
		$nombreDocu = array("".$compara."BG","".$compara."CP","".$compara."CU","".$compara."IMF","".$compara."IMD","".$compara."IPF","".$compara."IPD","".$compara."CD","".$compara."CM","".$compara."AN");
		$nombresArchivos = array("Reporte de evalucion del grado anterior","Certificado de primaria.","CURP del alumno.","INE de la mamá(Frontal).","INE de la mamá(Detrás)","INE del papá(Frontal).","INE del papá(Detrás)","Comprobante de domicilio.","Certificado médico.","Acta de nacimiento.");
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
	}elseif(isset($_POST['tipo']) && $_POST['tipo']=="Maestro"){
		$nombreDocu = array("".$compara."FUP","".$compara."CI","".$compara."CD","".$compara."CURP","".$compara."INEF","".$compara."INED","".$compara."CEL","".$compara."CEM","".$compara."CPLF","".$compara."CPLA","".$compara."CPMF","".$compara."CPMA","".$compara."OB","".$compara."AN","".$compara."TL","".$compara."TM","".$compara."SAT","".$compara."CL","".$compara."AP","".$compara."SA");
		$nombreArchivos = array("Formato único de personal.","Comprobante de ingresos.","Comprobante de domicilio.","CURP","INE(Frontal)","INE(Detrás)","Certificado estudios licenciatura","Certificado de estudios maestria","Cédula profesional de licenciatura(Frontal)","Cédula profesional de licenciatura(Detrás)","Cédula profesional de maestria(Frontal)","Cédula profesional de maestria(Detrás)","Oficio de basificación.","Acta de nacimiento","Título licenciatura","Título maestria","Alta al SAT(RFC)","Cartilla militar(SMN)","No antecedentes penales.","No sanción administrativa");
		$aux = array("no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no");
		$documentos = 20;
		$caso = "no";
		$cont = 0;
		$aux1 = "";
		$sql=mysqli_query($con,"select u.id_Usuario, u.Nom, m.id_Maestro, m.curpMaestro, u.Documento FROM usuarios AS u INNER JOIN maestros AS m ON (m.id_Usuario=u.id_Usuario)WHERE u.id_Usuario='$_POST[busqueda]' && u.id_Usuario=m.id_Usuario");

		if (mysqli_num_rows($sql)>0){
			while ($row=mysqli_fetch_array($sql)){
				if($documentos!=$row['Documento']){
					$directorio = opendir("documentos/maestro/$row[curpMaestro]"); //ruta actual
						while($archivo = readdir($directorio)){
							if (!is_dir($archivo)) {
								$nombreArchivoC = nombreCadena($archivo);
								$aux[$cont] = $nombreArchivoC;
								$cont = $cont + 1;
							}
						}
						for($i=0; $i<$documentos; $i++){ 
							for($j=0; $j<$documentos; $j++){
								if($nombreDocu[$i]==$aux[$j]){
									$aux1=$aux[$j];
									$caso = "si";
									echo  '<div class="col-sm-3 cambio thumbnail"> <a onclick="return InfoSolicitudes('.$row['id_Usuario'].','."'".$aux1."'".','."'".$caso."'".','.$i.','."'".''.$_POST['curp'].''."'".');" data-toggle="modal" href="#InfoAlert">
				<img src="../assets/images/Empleos/'.rand(1,9).'.png" height="70px" width="70px">
			   <h5 align=center><b>'.$nombreArchivos[$i].'</b></h5>
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
			   <h5 align=center><b>'.$nombreArchivos[$i].'</b> </h5>
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
	}elseif(isset($_POST['tipo']) && $_POST['tipo']=="Director"){
		$nombreDocu = array("".$compara."FUP","".$compara."CI","".$compara."CD","".$compara."CURP","".$compara."INEF","".$compara."INED","".$compara."CEL","".$compara."CEM","".$compara."CPLF","".$compara."CPLA","".$compara."CPMF","".$compara."CPMA","".$compara."OB","".$compara."AN","".$compara."TL","".$compara."TM","".$compara."SAT","".$compara."CL","".$compara."AP","".$compara."SA");
		$nombreArchivos = array("Formato único de personal.","Comprobante de ingresos.","Comprobante de domicilio.","CURP","INE(Frontal)","INE(Detrás)","Certificado estudios licenciatura","Certificado de estudios maestria","Cédula profesional de licenciatura(Frontal)","Cédula profesional de licenciatura(Detrás)","Cédula profesional de maestria(Frontal)","Cédula profesional de maestria(Detrás)","Oficio de basificación.","Acta de nacimiento","Título licenciatura","Título maestria","Alta al SAT(RFC)","Cartilla militar(SMN)","No antecedentes penales.","No sanción administrativa");
		$aux = array("no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no");
		$documentos = 20;
		$caso = "no";
		$cont = 0;
		$aux1 = "";
		$sql=mysqli_query($con,"select u.id_Usuario, u.Nom, d.id_Director, d.curpDirector, u.Documento FROM usuarios AS u INNER JOIN director AS d ON (d.id_Usuario=u.id_Usuario)WHERE u.id_Usuario='$_POST[busqueda]' && u.id_Usuario=d.id_Usuario");

		if (mysqli_num_rows($sql)>0){
			while ($row=mysqli_fetch_array($sql)){
				if($documentos!=$row['Documento']){
					$directorio = opendir("documentos/director/$row[curpDirector]"); //ruta actual
						while($archivo = readdir($directorio)){
							if (!is_dir($archivo)) {
								$nombreArchivoC = nombreCadena($archivo);
								$aux[$cont] = $nombreArchivoC;
								$cont = $cont + 1;
							}
						}
						for($i=0; $i<$documentos; $i++){ 
							for($j=0; $j<$documentos; $j++){
								if($nombreDocu[$i]==$aux[$j]){
									$aux1=$aux[$j];
									$caso = "si";
									echo  '<div class="col-sm-3 cambio thumbnail"> <a onclick="return InfoSolicitudes('.$row['id_Usuario'].','."'".$aux1."'".','."'".$caso."'".','.$i.','."'".''.$_POST['curp'].''."'".');" data-toggle="modal" href="#InfoAlert">
				<img src="../assets/images/Empleos/'.rand(1,9).'.png" height="70px" width="70px">
			   <h5 align=center><b>'.$nombreArchivos[$i].'</b></h5>
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
			   <h5 align=center><b>'.$nombreArchivos[$i].'</b> </h5>
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
	}elseif(isset($_POST['tipo']) && $_POST['tipo']=="Supervisor"){
		$nombreDocu = array("".$compara."FUP","".$compara."CI","".$compara."CD","".$compara."CURP","".$compara."INEF","".$compara."INED","".$compara."CEL","".$compara."CEM","".$compara."CPLF","".$compara."CPLA","".$compara."CPMF","".$compara."CPMA","".$compara."OB","".$compara."AN","".$compara."TL","".$compara."TM","".$compara."SAT","".$compara."CL","".$compara."AP","".$compara."SA");
		$nombreArchivos = array("Formato único de personal.","Comprobante de ingresos.","Comprobante de domicilio.","CURP","INE(Frontal)","INE(Detrás)","Certificado estudios licenciatura","Certificado de estudios maestria","Cédula profesional de licenciatura(Frontal)","Cédula profesional de licenciatura(Detrás)","Cédula profesional de maestria(Frontal)","Cédula profesional de maestria(Detrás)","Oficio de basificación.","Acta de nacimiento","Título licenciatura","Título maestria","Alta al SAT(RFC)","Cartilla militar(SMN)","No antecedentes penales.","No sanción administrativa");
		$aux = array("no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no");
		$documentos = 20;
		$caso = "no";
		$cont = 0;
		$aux1 = "";
		$sql=mysqli_query($con,"select u.id_Usuario, u.Nom, s.id_Supervisor, s.curpSupervisor, u.Documento FROM usuarios AS u INNER JOIN supervisor AS s ON (s.id_Usuario=u.id_Usuario)WHERE u.id_Usuario='$_POST[busqueda]' && u.id_Usuario=s.id_Usuario");

		if (mysqli_num_rows($sql)>0){
			while ($row=mysqli_fetch_array($sql)){
				if($documentos!=$row['Documento']){
					$directorio = opendir("documentos/supervisor/$row[curpSupervisor]"); //ruta actual
						while($archivo = readdir($directorio)){
							if (!is_dir($archivo)) {
								$nombreArchivoC = nombreCadena($archivo);
								$aux[$cont] = $nombreArchivoC;
								$cont = $cont + 1;
							}
						}
						for($i=0; $i<$documentos; $i++){ 
							for($j=0; $j<$documentos; $j++){
								if($nombreDocu[$i]==$aux[$j]){
									$aux1=$aux[$j];
									$caso = "si";
									echo  '<div class="col-sm-3 cambio thumbnail"> <a onclick="return InfoSolicitudes('.$row['id_Usuario'].','."'".$aux1."'".','."'".$caso."'".','.$i.','."'".''.$row['curpSupervisor'].''."'".');" data-toggle="modal" href="#InfoAlert">
				<img src="../assets/images/Empleos/'.rand(1,9).'.png" height="70px" width="70px">
			   <h5 align=center><b>'.$nombreArchivos[$i].'</b></h5>
			   <h5 align=center><b> Archivo gestionado. </b></h5>
			     </a>
			     
			     </div>
			     <div id="InfoAlert" class="modal fade" role="dialog"></div>
			     ';
								}
							}
							if($nombreDocu[$i]!=$aux1){
								$caso = "no";
	                        		echo  '<div class="col-sm-3 cambioN thumbnail"> <a onclick="return InfoSolicitudes('.$row['id_Usuario'].','."'".$nombreDocu[$i]."'".','."'".$caso."'".','.$i.','."'".''.$row['curpSupervisor'].''."'".');" data-toggle="modal" href="#InfoAlert">
				<img src="../assets/images/Empleos/'.rand(1,9).'.png" height="70px" width="70px">
			   <h5 align=center><b>'.$nombreArchivos[$i].'</b> </h5>
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
	}elseif(isset($_POST['tipo']) && $_POST['tipo']=="PersonalA"){
		$nombreDocu = array("".$compara."FUP","".$compara."CI","".$compara."CD","".$compara."CURP","".$compara."INEF","".$compara."INED","".$compara."CEL","".$compara."CEM","".$compara."CPLF","".$compara."CPLA","".$compara."CPMF","".$compara."CPMA","".$compara."OB","".$compara."AN","".$compara."TL","".$compara."TM","".$compara."SAT","".$compara."CL","".$compara."AP","".$compara."SA");
		$nombreArchivos = array("Formato único de personal.","Comprobante de ingresos.","Comprobante de domicilio.","CURP","INE(Frontal)","INE(Detrás)","Certificado estudios licenciatura","Certificado de estudios maestria","Cédula profesional de licenciatura(Frontal)","Cédula profesional de licenciatura(Detrás)","Cédula profesional de maestria(Frontal)","Cédula profesional de maestria(Detrás)","Oficio de basificación.","Acta de nacimiento","Título licenciatura","Título maestria","Alta al SAT(RFC)","Cartilla militar(SMN)","No antecedentes penales.","No sanción administrativa");
		$aux = array("no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no");
		$documentos = 20;
		$caso = "no";
		$cont = 0;
		$aux1 = "";
		$sql=mysqli_query($con,"select u.id_Usuario, u.Nom, pe.id_Personal, pe.curpAdmi, u.Documento FROM usuarios AS u INNER JOIN personaladmi AS pe ON (pe.id_Usuario=u.id_Usuario)WHERE u.id_Usuario='$_POST[busqueda]' && u.id_Usuario=pe.id_Usuario");

		if (mysqli_num_rows($sql)>0){
			while ($row=mysqli_fetch_array($sql)){
				if($documentos!=$row['Documento']){
					$directorio = opendir("documentos/personal/$row[curpAdmi]"); //ruta actual
						while($archivo = readdir($directorio)){
							if (!is_dir($archivo)) {
								$nombreArchivoC = nombreCadena($archivo);
								$aux[$cont] = $nombreArchivoC;
								$cont = $cont + 1;
							}
						}
						for($i=0; $i<$documentos; $i++){ 
							for($j=0; $j<$documentos; $j++){
								if($nombreDocu[$i]==$aux[$j]){
									$aux1=$aux[$j];
									$caso = "si";
									echo  '<div class="col-sm-3 cambio thumbnail"> <a onclick="return InfoSolicitudes('.$row['id_Usuario'].','."'".$aux1."'".','."'".$caso."'".','.$i.','."'".''.$row['curpAdmi'].''."'".');" data-toggle="modal" href="#InfoAlert">
				<img src="../assets/images/Empleos/'.rand(1,9).'.png" height="70px" width="70px">
			   <h5 align=center><b>'.$nombreArchivos[$i].'</b></h5>
			   <h5 align=center><b> Archivo gestionado. </b></h5>
			     </a>
			     
			     </div>
			     <div id="InfoAlert" class="modal fade" role="dialog"></div>
			     ';
								}
							}
							if($nombreDocu[$i]!=$aux1){
								$caso = "no";
	                        		echo  '<div class="col-sm-3 cambioN thumbnail"> <a onclick="return InfoSolicitudes('.$row['id_Usuario'].','."'".$nombreDocu[$i]."'".','."'".$caso."'".','.$i.','."'".''.$row['curpAdmi'].''."'".');" data-toggle="modal" href="#InfoAlert">
				<img src="../assets/images/Empleos/'.rand(1,9).'.png" height="70px" width="70px">
			   <h5 align=center><b>'.$nombreArchivos[$i].'</b> </h5>
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
	}
	//Aqui esta un pequeña funcion, devuelve archivos sin . ext	
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
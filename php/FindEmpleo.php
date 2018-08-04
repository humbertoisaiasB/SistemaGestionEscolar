<?php 
	include 'Conexion.php';
	//Los documentos son 8 y son:
	$nombreArchivoC = "";
	$compara = $_POST['curp']."_";
	$nombreDocu = array("".$compara."BG","".$compara."CP","".$compara."CU","".$compara."IM","".$compara."IP","".$compara."CD","".$compara."CM","".$compara."AN");
	$nombresArchivos = array("Boleta de calificaciones de 6 grado.","Certificado de primaria.","CURP del alumno.","Ife de la madre.","Ife del padre.","Comprobante de domicilio.","Certificado Medico.","Acta de nacimiento.");
	$documentos = 4;
	$caso = "no";
	$cont = 0;
	$sql=mysqli_query($con,"select u.id_Usuario, u.Nom, a.id_Alumno, a.curpAlumno, u.Documento FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.id_Usuario='$_POST[busqueda]' && u.id_Usuario=a.id_Usuario");

	if (mysqli_num_rows($sql)>0){
		while ($row=mysqli_fetch_array($sql)){
			if($documentos!=$row['Documento']){
				$directorio = opendir("documentos/alumno/$row[curpAlumno]"); //ruta actual
                while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
                {
                    if (!is_dir($archivo))//verificamos si es o no un directorio
                    { 
                    	$nombreArchivoC = nombreCadena($archivo);
                    	$caso = "si";
                        if($nombreDocu[$cont]==$nombreArchivoC){
                        	$nombreArchivoC = $nombreArchivoC;
                        	echo  '<div class="col-sm-3 thumbnail"> <a onclick="return InfoSolicitudes('.$row['id_Usuario'].','."'".$nombreArchivoC."'".','."'".$caso."'".','.$cont.','."'".''.$_POST['curp'].''."'".');" data-toggle="modal" href="#InfoAlert">
			<img src="../assets/images/Empleos/'.rand(1,9).'.png" height="70px" width="70px">
		   <h5 align=center><b>'.$nombresArchivos[$cont].'</b> </h5>
		   <h5 align=center><b>'.$nombreArchivoC.'</b> </h5>
		   <h5 align=center><b> Archivo gestionado. </b> </h5>
		     </a>
		     
		     </div>
		     <div id="InfoAlert" class="modal fade" role="dialog"></div>
		     ';
		     $cont=$cont+1;
                        }
                        else{
                        	$caso = "no";
                        	echo  '<div class="col-sm-3 thumbnail"> <a onclick="return InfoSolicitudes('.$row['id_Usuario'].','."'".$nombreArchivoC."'".','."'".$caso."'".','.$cont.','."'".''.$_POST['curp'].''."'".');" data-toggle="modal" href="#InfoAlert">
			<img src="../assets/images/Empleos/'.rand(1,9).'.png" height="70px" width="70px">
		   <h5 align=center><b>'.$nombresArchivos[$cont].'</b> </h5>
		   <h5 align=center><b>'.$nombreArchivoC.'</b> </h5>
		   <h5 align=center><b> Archivo con un nombre distinto, por favor sube de nuevo tu archivo. </b> </h5>
		     </a>
		     
		     </div>
		     <div id="InfoAlert" class="modal fade" role="dialog"></div>
		     ';
		     $cont=$cont+1;
                        }
                    }
                }
                if($cont<=$documentos){
                	$cont = $cont+1;
                	while ($cont<=$documentos) {
                		$nombreArchivoC = $nombresArchivos[$cont];
                		$caso = "no";
                        echo  '<div class="col-sm-3 thumbnail"> <a onclick="return InfoSolicitudes('.$row['id_Usuario'].','."'".$nombreArchivoC."'".','."'".$caso."'".','.$cont.','."'".''.$_POST['curp'].''."'".');" data-toggle="modal" href="#InfoAlert">
			<img src="../assets/images/Empleos/'.rand(1,9).'.png" height="70px" width="70px">
		   <h5 align=center><b>'.$nombresArchivos[$cont].'</b> </h5>
		   <h5 align=center><b>'.$nombreArchivoC.'</b> </h5>
		   <h5 align=center><b>Archivo faltante, por favor sube el archivo. </b> </h5>
		     </a>
		     
		     </div>
		     <div id="InfoAlert" class="modal fade" role="dialog"></div>
		     ';
                        $cont=$cont+1;
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
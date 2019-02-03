<?php 
	include 'Conexion.php';
  session_start();
  //Aqui esta para el alumno.
  $nombresArchivos1 = array("Reporte de evalucion del grado anterior.","Certificado de primaria.","CURP del alumno.","INE de la mamá(Frontal).","INE de la mamá(Detrás)","INE del papá(Frontal).","INE del papá(Detrás)","Comprobante de domicilio.","Certificado médico.","Acta de nacimiento.","Solicitud de preinscripción");
  $nombreArchivos = array("Formato único de personal.","Comprobante de ingresos.","Comprobante de domicilio.","CURP","INE(Frontal)","INE(Detrás)","Certificado estudios licenciatura","Certificado de estudios maestria","Cédula profesional de licenciatura(Frontal)","Cédula profesional de licenciatura(Detrás)","Cédula profesional de maestria(Frontal)","Cédula profesional de maestria(Detras)","Oficio de basificación.","Acta de nacimiento","Título licenciatura","Título maestria","Alta al SAT(RFC)","Cartilla militar(SMN)","No antecedentes penales.","No sanción administrativa","Nombramiento por ascenso");
  $Descripcion = array("Corresponde a las calificaciones obtenidas al concluir el ciclo escolar.","Esto corresponde al certificado de primaria que se te entrego al comcluir tu escuela primaria","La clave unica de poblacion que se te fue asignada al nacer","Ife de tu madre en caso de no tener omitir...");
	$sql=mysqli_query($con,"SELECT u.Nom, u.Ap, u.Am, u.id_Usuario,u.Tipo, u.Documento FROM usuarios as u WHERE u.id_Usuario=".$_POST['id_Usuario']);
	$row=mysqli_fetch_array($sql);
  $variable = "'".$_POST['nombreN']."'";
  $variable1 = "";
  $NombreDo = ($row['Tipo']=="Alumno") ? $nombresArchivos1[$_POST['es']] : $nombreArchivos[$_POST['es']];
  $Descripcionf = ($row['Tipo']=="Alumno") ? $Descripcion[$_POST['es']] : "";
  $tipoF = ($row['Tipo']=="PersonalA") ? "personal":$row['Tipo'];
	if($_POST['caso']=='si'){
    $_SESSION['nombreD'] = $_POST['nombreN'];
		echo '<div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  >&times;</button>
                <h4 class="modal-title">Subir archivo de '.$row['Nom'].' '.$row['Ap'].' '.$row['Am'].'.</h4> 
              </div>
              <div class="modal-body" align="center">
                  <h3><b>'.$NombreDo.'</b></h3>
                  <p>'.$Descripcionf.'</p>
                  <img  src="../assets/images/Like.png" class="img-rounded" width=200px height=200px >
              </div>
              <div class="modal-footer" align="center">
                <button align="center" type="button" class="btn btn-danger" onclick="return enviar('."'".'../php/documentos/'.strtolower($tipoF).'/'.$_POST['curp'].'/'.$_POST['nombreN'].'.pdf'."'".','."'".'#modal'."'".');" data-toggle="modal" href="#InfoAlert1" >Enviar PDF a</button>
              	<button align="center" type="button" class="btn btn-info" onclick="window.open('."'".'../php/documentos/'.strtolower($tipoF).'/'.$_POST['curp'].'/'.$_POST['nombreN'].'.pdf'."'".')">Ver PDF</button>
                <button align="center" type="button" onclick="return subirF('."'".''.$NombreDo.''."'".','."'".''."subeA".''."'".','."'".''.$_POST['curp'].''."'".'); subirT('.$variable.','."'".''.$row['Tipo'].''."'".','."'".''.$_POST['curp'].''."'".');" data-toggle="modal" href="#InfoAlert1" class="btn btn-success">Actualizacion de archivo</button>
              </div>
            </div>
          </div>';
	}elseif($_POST['caso']=='no'){
    //$_SESSION['nombreD'] = $VARIABLE_HOST;
    $_SESSION['nombreD'] = $_POST['nombreN'];
    echo '<div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  >&times;</button>
                <h4 class="modal-title">Subir archivo de '.$row['Nom'].' '.$row['Ap'].' '.$row['Am'].'.</h4> 
              </div>
              <div class="modal-body" align="center">
                  <h3><b>'.$NombreDo.'</b></h3>
                  <p>'.$Descripcionf.'</p>
                  <img  src="../assets/images/Like.png" class="img-rounded" width=200px height=200px >
              </div>
              <div class="modal-footer" align="center">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="../php/interSube.php"></iframe>
                </div>
              </div>
            </div>
          </div>';
	}  
  //Aqui esta para el maestro

  //Aqui director
?>
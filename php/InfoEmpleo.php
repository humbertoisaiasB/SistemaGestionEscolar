<?php 
	include 'Conexion.php';
  $nombresArchivos1 = array("Boleta de calificaciones de 6 grado.","Certificado de primaria.","CURP del alumno.","Ife de la madre.","Ife del padre.","Comprobante de domicilio.","Certificado Medico.","Acta de nacimiento.");
  $Descripcion = array("La boleta corresponde a tu ultimas calificaciones entregadas a tus padres cuando tu estabas en la escula primaria","Esto corresponde al certificado de primaria que se te entrego al comcluir tu escuela primaria","La clave unica de poblacion que se te fue asignada al nacer","Ife de tu madre en caso de no tener omitir...");
  //Aqui esta para el alumno.
  $NombreDo = $nombresArchivos1[$_POST['es']];
	$sql=mysqli_query($con,"SELECT u.Nom, u.Ap, u.Am, u.id_Usuario,u.Tipo, u.Documento FROM usuarios as u WHERE u.id_Usuario=".$_POST['id_Usuario']);
	$row=mysqli_fetch_array($sql);
  $variable = "'".$_POST['nombreN']."'";
  $variable1 = "'"."uno"."'";
	if($_POST['caso']=='si'){
		echo '<div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"  >&times;</button>
        <h4 class="modal-title">Subir archivo de '.$row['Nom'].' '.$row['Ap'].' '.$row['Am'].'.</h4> 
      </div>
      <div class="modal-body" align="center">
      		<h3><b>'.$NombreDo.'</b></h3>
          <p>'.$_SERVER['PHP_SELF'].'</p>
          <p>'.$Descripcion[$_POST['es']].'</p>
          <p>'.$variable.'</p>
          <img  src="../assets/images/Like.png" class="img-rounded" width=200px height=200px >
      </div>
      <div class="modal-footer" align="center">
      	<button align="center" type="button" class="btn btn-info" onclick="window.open('."'".'../php/documentos/alumno/'.$_POST['curp'].'/'.$_POST['nombreN'].'.pdf'."'".')">Ver PDF</button>
        <button align="center" type="button" onclick="return subirF('.$variable.','."'".''."subeA".''."'".','."'".''.$_POST['curp'].''."'".'); subirT('.$variable.','."'".''.$row['Tipo'].''."'".','."'".''.$_POST['curp'].''."'".');" data-toggle="modal" href="#InfoAlert1" class="btn btn-success">Actualizacion de archivo</button>
      </div>
    </div>
  </div>';
	}elseif($_POST['caso']=='no'){
		echo '<div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"  >&times;</button>
        <h4 class="modal-title">'.$row['Ap'].' </h4> 
      </div>
      <div class="modal-body" align=center>
      		<h3><b>Estoy Interesado</b> </h3>
          	<img  src="../assets/images/Like.png" class="img-rounded" width=200px height=200px >

      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-info" >Ver PDF</button>
        <button type="button" class="btn btn-success" data-toggle="modal"  >Agendar</button>
        <button type="button" class="btn btn-danger" >Rechazar</button>
      </div>
    </div>

  </div>';
	}  

?>
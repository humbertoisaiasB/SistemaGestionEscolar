<?php

  include ("Conexion.php");
  session_start();
  $asd = mysqli_query($con,"select * from usuarios u where u.id_usuario=$_POST[info]");
  $row = mysqli_fetch_array($asd);
  if(isset($_POST['info'])){
  	if($row['Tipo'] == "Alumno"){
      $asd1 = mysqli_query($con,"select * from alumnos where id_usuario=$_POST[info]");
      $row1 = mysqli_fetch_array($asd1);
      $directorio = opendir("documentos/alumno/$row1[curpAlumno]"); //rut
            while($archivo = readdir($directorio)){
              if (!is_dir($archivo)) {
                unlink("documentos/alumno/$row1[curpAlumno]/".$archivo);
              }else {
                unlink($archivo);
              }
            }
            rmdir("documentos/alumno/$row1[curpAlumno]");
  		$sql=mysqli_query($con,"delete from alumnos where id_Usuario=".$_POST['info']);
  		$sql2=mysqli_query($con,"delete from usuarios where id_Usuario=".$_POST['info']);
  	}
  	elseif ($row['Tipo'] ==  "Maestro") {
      $asd1 = mysqli_query($con,"select * from maestros where id_usuario=$_POST[info]");
      $row1 = mysqli_fetch_array($asd1);
      $directorio = opendir("documentos/maestro/$row1[curpMaestro]"); //rut
            while($archivo = readdir($directorio)){
              if (!is_dir($archivo)) {
                unlink("documentos/maestro/$row1[curpMaestro]/".$archivo);
              }else {
                unlink($archivo);
              }
            }
            rmdir("documentos/maestro/$row1[curpMaestro]");
  		$sql=mysqli_query($con,"delete from Maestro where id_Usuario=".$_POST['info']);
  		$sql2=mysqli_query($con,"delete from usuarios where id_Usuario=".$_POST['info']);
  	}
    elseif ($row['Tipo'] ==  "PersonalA") {
  		$sql=mysqli_query($con,"delete from PersonalA where id_Usuario=".$_POST['info']);
  		$sql2=mysqli_query($con,"delete from usuarios where id_Usuario=".$_POST['info']);
  	}
    elseif ($row['Tipo'] ==  "Director") {
      $asd1 = mysqli_query($con,"select * from director where id_usuario=$_POST[info]");
      $row1 = mysqli_fetch_array($asd1);
      $directorio = opendir("documentos/director/$row1[curpDirector]"); //rut
            while($archivo = readdir($directorio)){
              if (!is_dir($archivo)) {
                unlink("documentos/director/$row1[curpDirector]/".$archivo);
              }else {
                unlink($archivo);
              }
            }
            rmdir("documentos/director/$row1[curpDirector]");
      $sql=mysqli_query($con,"delete from director where id_Usuario=".$_POST['info']);
      $sql2=mysqli_query($con,"delete from usuarios where id_Usuario=".$_POST['info']);
    }
  }
  //esta cosa se agregara en la busqueda de una mejor gestion
  else{
    if(mysqli_query($con,"update maestros SET todo='$_POST[todo]' WHERE id_Usuario='$_SESSION[id]'")){
            echo '<script type="text/javascript">
         alert ("Actualizado Correctamente");
      window.location.assign("../maestro/Actualizarinformacion.php");
      </script>';
          exit;
          }else{
            printf("Error: %s\n", mysqli_error($con));
          }
  }

 ?>
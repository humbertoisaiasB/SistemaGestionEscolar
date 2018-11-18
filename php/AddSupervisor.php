<?php
	include ("Conexion.php");
  session_start();
  if (isset($_POST['btn_Supervisor'])){
    if(!mysqli_query($con,"insert into usuarios (Nom, Ap, Am, Trabajo, Celular, Correo, Contrasena, Codigo_Postal,Pais, Estado, Ciudad, Colonia , Calle, Tipo,sexo,documento,claveEscuela)
    VALUES ('$_POST[txt_NomSupervisor]','$_POST[txt_ApSupervisor]','$_POST[txt_AmSupervisor]',$_POST[txt_TelcasaSupervisor],$_POST[txt_TelcelularSupervisor],'$_POST[txt_CorreoSupervisor]','$_POST[txt_PswSupervisor]',$_POST[txt_CPCanSupervisor],'$_POST[Sl_PaisSupervisor]','$_POST[Sl_EstadoSupervisor]', '$_POST[Sl_CiudadPersonalA]','$_POST[Sl_ColoniaSupervisor]' ,'$_POST[txt_CalleSupervisor]','Supervisor','M',0,'$_POST[prueba13ESupervisor]')")){
      printf("Error: %s\n", mysqli_error($con));
      
  		}
    $curpA = strtoupper($_POST['txt_CurpSupervisor']);
    $Last_id=mysqli_insert_id($con);
		if(!mysqli_query($con,"insert into supervisor(id_Usuario,curpSupervisor)
		VALUES ('$Last_id','$curpA')")){
        echo '<script type="text/javascript">
        alert ("Ha Ocurrido un error   jjjjj");
    
      </script>';
      }
      $carpeta = 'documentos/supervisor/'.$curpA;
      if (!file_exists($carpeta)) {
          if(mkdir($carpeta, 0777, true)){
            echo '<script type="text/javascript">
             alert ("Creado Correctamente");
          </script>';
          
          }else{
            echo '<script type="text/javascript">
             alert ("Algo salio mal");
          </script>';
          }
    }
     echo '<script type="text/javascript">
                alert ("Registrado Correctamente");
                window.location.assign("'.$_SERVER["HTTP_REFERER"].'");
                </script>';
                exit;
	}
?>
<?php
	include ("Conexion.php");
  session_start();
  if (isset($_POST['btn_Supervisor'])){
    if(!mysqli_query($con,"insert into usuarios (Nom, Ap, Am, Trabajo, Celular, Correo, Contrasena, Codigo_Postal,Pais, Estado, Ciudad, Colonia , Calle, Tipo,sexo,documento,claveEscuela)
    VALUES ('$_POST[txt_NomAdmi]','$_POST[txt_ApAdmi]','$_POST[txt_AmAdmi]',$_POST[txt_TelcasaAdmi],$_POST[txt_TelcelularAdmi],'$_POST[txt_CorreoAdmi]','$_POST[txt_PswCanAdmi]',$_POST[txt_CPCanAdmi],'$_POST[Sl_PaisPersonalA]', '$_POST[Sl_EstadoPersonalA]', '$_POST[Sl_CiudadPersonalA]' ,'$_POST[Sl_ColoniaPersonalA]' ,'$_POST[txt_CalleCanAdmi]','PersonalA','M',0,'$_POST[prueba13EAdmi]')")){
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
<?php
	include ("Conexion.php");
  session_start();
  if (isset($_POST['btn_addEmpleador'])){
    if(!mysqli_query($con,"insert into usuarios (Nom, Ap, Am, Trabajo, Celular, Correo, Contrasena, Codigo_Postal,Pais, Estado, Ciudad, Colonia , Calle, Tipo)
    VALUES ('$_POST[txt_NomAdmi]','$_POST[txt_ApAdmi]','$_POST[txt_AmAdmi]','$_POST[txt_TeltrabajoAdmi]','$_POST[txt_TelcelularAdmi]','$_POST[txt_CorreoAdmi]','$_POST[txt_PswAdmi]','$_POST[txt_CPAdmi]','$_POST[Sl_PaisAdmi]', '$_POST[Sl_EstadoAdmi]', '$_POST[Sl_CiudadAdmi]' ,'$_POST[Sl_ColoniaAdmi]' ,'$_POST[txt_CalleAdmi]','PersonalA')")){
      echo '<script type="text/javascript">
         alert ("Ha Ocurrido un error");
      window.location.assign("../registro.php");
      </script>';
      exit;
  		}

    $Last_id=mysqli_insert_id($con);
    //$result=mysqli_query($con,"select id_Empresa from empresa where id_Usuario=".$_SESSION['id']);
    $row = mysqli_fetch_array($result);
		if(!mysqli_query($con,"insert into personaladmi(id_Usuario,funcion, Sexo,Departamento)
		VALUES ('$Last_id','$_POST[txt_Funcion]','$_POST[txt_Departamento]'),'$_POST[Sl_Sexo]'")){
      echo '<script type="text/javascript">
         alert ("Ha Ocurrido un error");
      window.location.assign("../Empresa/GestionarEmpleadores.php");
      </script>';
      exit;
		}
    if (isset($_FILES['File_img']) ){
        if($_FILES['File_img']['error']>0){
            mysqli_query($con,"call ELIMINAREMPLEADOR(".$Last_id.")");
            echo '<script type="text/javascript">
           alert ("Ha Ocurrido un error al cargar la imagen\nNo registrado");
           window.location.assign("'.$_SERVER["HTTP_REFERER"].'");
          </script>';
        exit;
        }else{
            $permitidos=array("image/jpg","image/png","image/jpeg");
            $limite_kb=2000;
            if(in_array($_FILES["File_img"]["type"], $permitidos) && $_FILES["File_img"]["size"]<= $limite_kb*1024 ){
              $ruta='../assets/Profiles/';
              $archivo=$ruta.$Last_id.'.png';

              $resultado=@move_uploaded_file($_FILES["File_img"]["tmp_name"], $archivo);
              if($resultado){
                echo '<script type="text/javascript">
                alert ("Registrado Correctamente");
                window.location.assign("'.$_SERVER["HTTP_REFERER"].'");
                </script>';
                
                exit;
              }else{
                    mysqli_query($con,"call ELIMINAREMPLEADOR(".$Last_id.")");
                    echo '<script type="text/javascript">
                    alert ("La imagen no ha sido guardada\nNo Registrado");
                    window.location.assign("'.$_SERVER["HTTP_REFERER"].'");
                    </script>';
                    
                    exit;
              }
            }else{
                mysqli_query($con,"call ELIMINAREMPLEADOR(".$Last_id.")");
               echo '<script type="text/javascript">
                  alert ("Imagen no permitida\nNo Registrado");
                  window.location.assign("'.$_SERVER["HTTP_REFERER"].'");
                  </script>';
                  exit;
            }

        }
    }
     echo '<script type="text/javascript">
                alert ("Registrado Correctamente");
                window.location.assign("'.$_SERVER["HTTP_REFERER"].'");
                </script>';
                exit;
	}
?>

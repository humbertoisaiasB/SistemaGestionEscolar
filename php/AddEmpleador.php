<?php
	include ("Conexion.php");
  session_start();
  if (isset($_POST['btn_addEmpleador'])){
    if(!mysqli_query($con,"insert into usuarios (Nom, Ap, Am, Trabajo, Celular, Correo, Contrasena, Codigo_Postal,Pais, Estado, Ciudad, Colonia , Calle, Tipo)
    VALUES ('$_POST[txt_Nom]','$_POST[txt_Ap]','$_POST[txt_Am]','$_POST[txt_Teltrabajo]','$_POST[txt_Telcelular]','$_POST[txt_Correo]','$_POST[txt_Psw]','$_POST[txt_CP]','$_POST[Sl_Pais]', '$_POST[Sl_Estado]', '$_POST[Sl_Ciudad]' ,'$_POST[Sl_Colonia]' ,'$_POST[txt_Calle]','Empleador')")){
      echo '<script type="text/javascript">
         alert ("Ha Ocurrido un error");
      window.location.assign("../Empresa/GestionarEmpleadores.php");
      </script>';
      exit;
  		}

    $Last_id=mysqli_insert_id($con);
    $result=mysqli_query($con,"select id_Empresa from empresa where id_Usuario=".$_SESSION['id']);
    $row = mysqli_fetch_array($result);
		if(!mysqli_query($con,"insert into empleador(id_Usuario,id_Empresa, Sexo,Departamento)
		VALUES ('$Last_id','$row[id_Empresa]','$_POST[Sl_Sexo]','$_POST[txt_Departamento]')")){
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

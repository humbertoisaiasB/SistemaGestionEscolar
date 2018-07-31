<?php
  include ("Conexion.php");
  session_start();
  if (isset($_POST['btn_EmpresaInformacion'])){
    if(mysqli_query($con,"update usuarios SET Nom='$_POST[txt_Nom]',Correo='$_POST[txt_Correo]', Trabajo='$_POST[txt_Tel]' WHERE id_Usuario='$_SESSION[id]'")){
      if(mysqli_query($con,"update empresa SET RFC='$_POST[txt_RFC]', Giro='$_POST[txt_Giro]', Orientacion='$_POST[txt_Orien]' WHERE id_Usuario='$_SESSION[id]'")){
        $_SESSION['User']=$_POST['txt_Nom'];
        echo '<script type="text/javascript">
    		     alert ("Actualizado Correctamente");
    			window.location.assign("../Empresa/ActualizarInformacion.php");
    			</script>'; 
          exit;
    }else{
      printf("Error: %s\n", mysqli_error($con));
    }
  }else{
    printf("Error: %s\n", mysqli_error($con));
  }
}
if (isset($_POST['btn_EmpresaDireccion'])){
  if(mysqli_query($con,"update usuarios SET Codigo_Postal='$_POST[txt_CP]', Pais='$_POST[Sl_Pais]', Estado='$_POST[Sl_Estado]', Ciudad='$_POST[Sl_Ciudad]',Colonia='$_POST[Sl_Colonia]', Calle='$_POST[txt_Calle]' WHERE id_Usuario='$_SESSION[id]'")){
    echo '<script type="text/javascript">
         alert ("Actualizado Correctamente");
      window.location.assign("../Empresa/ActualizarInformacion.php");
      </script>';
      exit;
  }else{
    printf("Error: %s\n", mysqli_error($con));
  }
}
if (isset($_POST['btn_EmpresaPw'])){
  if(mysqli_query($con,"update usuarios SET Contrasena='$_POST[txt_Psw]' WHERE id_Usuario='$_SESSION[id]'")){
    echo '<script type="text/javascript">
         alert ("Actualizado Correctamente");
      window.location.assign("../Empresa/ActualizarInformacion.php");
      </script>';
      exit;
  }else{
    printf("Error: %s\n", mysqli_error($con));
  }
}
 ?>

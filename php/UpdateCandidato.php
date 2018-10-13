<?php
  include ("Conexion.php");
  session_start();
  if (isset($_POST['btn_CandidatoInfo'])){
    if(mysqli_query($con,"update usuarios SET Nom='$_POST[txt_Nom]', Ap='$_POST[txt_Ap]', Am='$_POST[txt_Am]', Correo='$_POST[txt_Correo]', Celular='$_POST[txt_Telcelular]', Casa='$_POST[txt_Telcasa]' WHERE id_Usuario='$_SESSION[id]'")){
      if(mysqli_query($con,"update candidato SET Nivel_estudio='$_POST[Sl_Estudio]', Curp='$_POST[txt_Curp]' WHERE id_Usuario='$_SESSION[id]'")){
        $_SESSION['User']=$_POST['txt_Nom'];
        echo '<script type="text/javascript">
    		     alert ("Actualizado Correctamente");
    			window.location.assign("../Candidato/Actualizarinformacion.php");
    			</script>';
          exit;
    }else{
      printf("Error: %s\n", mysqli_error($con));
    }
  }else{
    printf("Error: %s\n", mysqli_error($con));
  }
}
if (isset($_POST['btn_CandidatoDireccion'])){
  if(mysqli_query($con,"update usuarios SET Codigo_Postal='$_POST[txt_CP]', Pais='$_POST[Sl_Pais]', Estado='$_POST[Sl_Estado]', Ciudad='$_POST[Sl_Ciudad]',Colonia='$_POST[Sl_Colonia]', Calle='$_POST[txt_Calle]' WHERE id_Usuario='$_SESSION[id]'")){
    echo '<script type="text/javascript">
         alert ("Actualizado Correctamente");
      window.location.assign("../Candidato/Actualizarinformacion.php");
      </script>';
      exit;
  }else{
    printf("Error: %s\n", mysqli_error($con));
  }
}
if (isset($_POST['btn_CandidatoPw'])){
  if(mysqli_query($con,"update usuarios SET Contrasena='$_POST[txt_Psw]' WHERE id_Usuario='$_SESSION[id]'")){
    echo '<script type="text/javascript">
         alert ("Actualizado Correctamente");
      window.location.assign("../alumno/Actualizarinformacion.php");
      </script>';
      exit;
  }else{
    printf("Error: %s\n", mysqli_error($con));
  }
}
 ?>

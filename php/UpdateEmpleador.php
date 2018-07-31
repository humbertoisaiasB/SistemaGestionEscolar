<?php
  include ("Conexion.php");
  session_start();
  if (isset($_POST['btn_updateEmpleador'])){
    if(mysqli_query($con,"update usuarios SET Nom='$_POST[txt_Nom1]',Ap='$_POST[txt_Ap1]',Am='$_POST[txt_Am1]',Correo='$_POST[txt_Correo1]', Trabajo='$_POST[txt_Teltrabajo1]',Celular='$_POST[txt_Telcelular1]',Codigo_Postal='$_POST[txt_CP1]',Pais='$_POST[Sl_Pais]',Estado='$_POST[Sl_Estado]',Ciudad='$_POST[Sl_Ciudad]',Colonia='$_POST[Sl_Colonia]' ,Calle='$_POST[txt_Calle1]',Contrasena='$_POST[txt_Psw1]' WHERE id_Usuario='$_SESSION[EmpleadorID]'")){
      if(mysqli_query($con,"update empleador SET Departamento='$_POST[txt_Departamento1]' WHERE id_Usuario='$_SESSION[EmpleadorID]'")){
        echo '<script type="text/javascript">
    		     alert ("Actualizado Correctamente");
    			window.location.assign("../Empresa/GestionarEmpleadores.php");
    			</script>';
          exit;
    }else{
      printf("Error: %s\n", mysqli_error($con));
    }
  }else{
    printf("Error: %s\n", mysqli_error($con));
  }
}
 ?>

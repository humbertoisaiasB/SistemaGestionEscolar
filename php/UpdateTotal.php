<?php
  include ("Conexion.php");
  session_start();
  $query1 = mysqli_query($con,"select Tipo from usuarios u where u.id_Usuario=".$_SESSION['id']);
  $val = mysqli_fetch_array($query1);
  $aux = "";
  if($val['Tipo']=="Alumno"){
      if (isset($_POST['btn_AlumnoInfo'])){
        $query2 = mysqli_query($con,"select curpAlumno from alumnos where id_Usuario=".$_SESSION['id']);
        $val2 = mysqli_fetch_array($query2);
        if(mysqli_query($con,"update usuarios SET Nom='$_POST[txt_NomAlumno]', Ap='$_POST[txt_ApAlumno]', Am='$_POST[txt_AmAlumno]', Correo='$_POST[txt_CorreoAlumno]', Celular=$_POST[txt_TelcelularAlumno], Casa='$_POST[txt_TelcasaAlumno]' WHERE id_Usuario=$_SESSION[id]")){
          if(mysqli_query($con,"update alumnos SET curpAlumno='$_POST[txt_Curp]' WHERE id_Usuario=$_SESSION[id]")){
            $aux = strtoupper($_POST['txt_Curp']);
            rename ("/documentos/alumno/$val2[curpAlumno]", "$aux");
            $_SESSION['User']=$_POST['txt_NomAlumno'];
            echo '<script type="text/javascript">
              alert ("Actualizado Correctamente1");
              window.location.assign("../alumno/Actualizarinformacion.php");
            </script>';
            exit;
          }else{
            printf("Error: %s\n", mysqli_error($con));
          }
        }else{
          printf("Error: %s\n", mysqli_error($con));
        }
      }elseif (isset($_POST['btn_AlumnoDireccion'])){
        if(mysqli_query($con,"update usuarios SET Codigo_Postal='$_POST[txt_CPAlumno]', Pais='$_POST[Sl_PaisALumno]', Estado='$_POST[Sl_EstadoAlumno]', Ciudad='$_POST[Sl_CiudadAlumno]',Colonia='$_POST[Sl_ColoniaAlumno]', Calle='$_POST[txt_CalleAlumno]' WHERE id_Usuario='$_SESSION[id]'")){
          echo '<script type="text/javascript">
         alert ("Actualizado Correctamente");
          window.location.assign("../alumno/Actualizarinformacion.php");
          </script>';
          exit;
        }else{
          printf("Error: %s\n", mysqli_error($con));
        }
      }elseif (isset($_POST['btn_AlumnoPw'])){
        if(mysqli_query($con,"update usuarios SET Contrasena='$_POST[txt_PswAlumno]' WHERE id_Usuario='$_SESSION[id]'")){
            echo '<script type="text/javascript">
         alert ("Actualizado Correctamente");
      window.location.assign("../alumno/Actualizarinformacion.php");
      </script>';
          exit;
          }else{
            printf("Error: %s\n", mysqli_error($con));
          }
        }
  }elseif($val['Tipo']=="PersonalA"){
      if (isset($_POST['btn_AdmiInfo'])){
        if(mysqli_query($con,"update usuarios SET Nom='$_POST[txt_NomAdmi]', Ap='$_POST[txt_ApAdmi]', Am='$_POST[txt_AmAdmi]', Correo='$_POST[txt_CorreoAdmi]', Celular=$_POST[txt_TelcelularAdmi], Casa='$_POST[txt_TelcasaAdmi]' WHERE id_Usuario=$_SESSION[id]")){
          if(mysqli_query($con,"update personaladmi SET curpAdmi='$_POST[txt_CurpAdmi]' WHERE id_Usuario=$_SESSION[id]")){
            $_SESSION['User']=$_POST['txt_NomAdmi'];
            echo '<script type="text/javascript">
              alert ("Actualizado Correctamente1");
              window.location.assign("../alumno/Actualizarinformacion.php");
            </script>';
            exit;
          }else{
            printf("Error: %s\n", mysqli_error($con));
          }
        }else{
          printf("Error: %s\n", mysqli_error($con));
        }
      }elseif (isset($_POST['btn_AdmiDireccion'])){
        if(mysqli_query($con,"update usuarios SET Codigo_Postal='$_POST[txt_CPAdmi]', Pais='$_POST[Sl_PaisAdmi]', Estado='$_POST[Sl_EstadoAdmi]', Ciudad='$_POST[Sl_CiudadAdmi]',Colonia='$_POST[Sl_ColoniaAdmi]', Calle='$_POST[txt_CalleAdmi]' WHERE id_Usuario='$_SESSION[id]'")){
          echo '<script type="text/javascript">
         alert ("Actualizado Correctamente");
          window.location.assign("../personalA/Actualizarinformacion.php");
          </script>';
          exit;
        }else{
          printf("Error: %s\n", mysqli_error($con));
        }
      }elseif (isset($_POST['btn_AdmiPw'])){
        if(mysqli_query($con,"update usuarios SET Contrasena='$_POST[txt_PswAdmi]' WHERE id_Usuario='$_SESSION[id]'")){
            echo '<script type="text/javascript">
         alert ("Actualizado Correctamente");
      window.location.assign("../personalA/Actualizarinformacion.php");
      </script>';
          exit;
          }else{
            printf("Error: %s\n", mysqli_error($con));
          }
        }
  }elseif($val['Tipo']=="Maestro"){
      if (isset($_POST['btn_MaestroInfo'])){
        if(mysqli_query($con,"update usuarios SET Nom='$_POST[txt_NomMaestro]', Ap='$_POST[txt_ApMaestro]', Am='$_POST[txt_AmMaestro]', Correo='$_POST[txt_CorreoMaestro]', Celular=$_POST[txt_TelcelularAlumno], Casa='$_POST[txt_TelcasaMaestro]' WHERE id_Usuario=$_SESSION[id]")){
          if(mysqli_query($con,"update maestros SET curpMaestro='$_POST[txt_CurpMaestro]' WHERE id_Usuario=$_SESSION[id]")){
            $_SESSION['User']=$_POST['txt_NomMaestro'];
            echo '<script type="text/javascript">
              alert ("Actualizado Correctamente1");
              window.location.assign("../maestro/Actualizarinformacion.php");
            </script>';
            exit;
          }else{
            printf("Error: %s\n", mysqli_error($con));
          }
        }else{
          printf("Error: %s\n", mysqli_error($con));
        }
      }elseif (isset($_POST['btn_MaestroDireccion'])){
        if(mysqli_query($con,"update usuarios SET Codigo_Postal='$_POST[txt_CPMaestro]', Pais='$_POST[Sl_PaisMaestro]', Estado='$_POST[Sl_EstadoMaestro]', Ciudad='$_POST[Sl_CiudadMaestro]',Colonia='$_POST[Sl_ColoniaMaestro]', Calle='$_POST[txt_CalleMaestro]' WHERE id_Usuario='$_SESSION[id]'")){
          echo '<script type="text/javascript">
         alert ("Actualizado Correctamente");
          window.location.assign("../maestro/Actualizarinformacion.php");
          </script>';
          exit;
        }else{
          printf("Error: %s\n", mysqli_error($con));
        }
      }elseif (isset($_POST['btn_MaestroPw'])){
        if(mysqli_query($con,"update usuarios SET Contrasena='$_POST[txt_PswMaestro]' WHERE id_Usuario='$_SESSION[id]'")){
            echo '<script type="text/javascript">
         alert ("Actualizado Correctamente");
      window.location.assign("../maestro/Actualizarinformacion.php");
      </script>';
          exit;
          }else{
            printf("Error: %s\n", mysqli_error($con));
          }
        }
  }elseif($val['Tipo']=="Supervisor"){
      if (isset($_POST['btn_SupervisorInfo'])){
        if(mysqli_query($con,"update usuarios SET Nom='$_POST[txt_NomSupervisor]', Ap='$_POST[txt_ApSupervisor]', Am='$_POST[txt_AmSupervisor]', Correo='$_POST[txt_CorreoSupervisor]', Celular=$_POST[txt_TelcelularSupervisor], Casa='$_POST[txt_TelcasaSupervisor]' WHERE id_Usuario=$_SESSION[id]")){
          if(mysqli_query($con,"update supervisor SET curpAlumno='$_POST[txt_CurpSupervisor]' WHERE id_Usuario=$_SESSION[id]")){
            $_SESSION['User']=$_POST['txt_NomSupervisor'];
            echo '<script type="text/javascript">
              alert ("Actualizado Correctamente1");
              window.location.assign("../supervisor/Actualizarinformacion.php");
            </script>';
            exit;
          }else{
            printf("Error: %s\n", mysqli_error($con));
          }
        }else{
          printf("Error: %s\n", mysqli_error($con));
        }
      }elseif (isset($_POST['btn_SupervisorDireccion'])){
        if(mysqli_query($con,"update usuarios SET Codigo_Postal='$_POST[txt_CPSupervisor]', Pais='$_POST[Sl_PaisSupervisor]', Estado='$_POST[Sl_EstadoSupervisor]', Ciudad='$_POST[Sl_CiudadSupervisor]',Colonia='$_POST[Sl_ColoniaSupervisor]', Calle='$_POST[txt_CalleSupervisor]' WHERE id_Usuario='$_SESSION[id]'")){
          echo '<script type="text/javascript">
         alert ("Actualizado Correctamente");
          window.location.assign("../supervisor/Actualizarinformacion.php");
          </script>';
          exit;
        }else{
          printf("Error: %s\n", mysqli_error($con));
        }
      }elseif (isset($_POST['btn_SupervisorPw'])){
        if(mysqli_query($con,"update usuarios SET Contrasena='$_POST[txt_PswSupervisor]' WHERE id_Usuario='$_SESSION[id]'")){
            echo '<script type="text/javascript">
         alert ("Actualizado Correctamente");
      window.location.assign("../supervisor/Actualizarinformacion.php");
      </script>';
          exit;
          }else{
            printf("Error: %s\n", mysqli_error($con));
          }
        }
  }elseif($val['Tipo']=="Director"){
      if (isset($_POST['btn_DirectorInfo'])){
        if(mysqli_query($con,"update usuarios SET Nom='$_POST[txt_NomDirector]', Ap='$_POST[txt_ApDirector]', Am='$_POST[txt_AmDirector]', Correo='$_POST[txt_CorreoDirector]', Celular=$_POST[txt_TelcelularDirector], Casa='$_POST[txt_TelcasaDirector]' WHERE id_Usuario=$_SESSION[id]")){
          if(mysqli_query($con,"update director SET curpAlumno='$_POST[txt_CurpDirector]' WHERE id_Usuario=$_SESSION[id]")){
            $_SESSION['User']=$_POST['txt_NomDirector'];
            echo '<script type="text/javascript">
              alert ("Actualizado Correctamente1");
              window.location.assign("../director/Actualizarinformacion.php");
            </script>';
            exit;
          }else{
            printf("Error: %s\n", mysqli_error($con));
          }
        }else{
          printf("Error: %s\n", mysqli_error($con));
        }
      }elseif (isset($_POST['btn_DirectorDireccion'])){
        if(mysqli_query($con,"update usuarios SET Codigo_Postal='$_POST[txt_CPDirector]', Pais='$_POST[Sl_PaisDirector]', Estado='$_POST[Sl_EstadoDirector]', Ciudad='$_POST[Sl_CiudadDirector]',Colonia='$_POST[Sl_ColoniaDirector]', Calle='$_POST[txt_CalleDirector]' WHERE id_Usuario='$_SESSION[id]'")){
          echo '<script type="text/javascript">
         alert ("Actualizado Correctamente");
          window.location.assign("../director/Actualizarinformacion.php");
          </script>';
          exit;
        }else{
          printf("Error: %s\n", mysqli_error($con));
        }
      }elseif (isset($_POST['btn_DirectorPw'])){
        if(mysqli_query($con,"update usuarios SET Contrasena='$_POST[txt_PswDirector]' WHERE id_Usuario='$_SESSION[id]'")){
            echo '<script type="text/javascript">
         alert ("Actualizado Correctamente");
      window.location.assign("../director/Actualizarinformacion.php");
      </script>';
          exit;
          }else{
            printf("Error: %s\n", mysqli_error($con));
          }
        }
  }
  
 ?>

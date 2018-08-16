<?php
include ("Conexion.php");
session_start();
if (isset($_POST['btn_Candidato'])){
  if(!mysqli_query($con,"insert into usuarios (Nom, Ap, Am, Casa, Celular, Correo, Contrasena, Codigo_Postal,Pais, Estado, Ciudad, Colonia,Calle, Tipo)
  VALUES ('$_POST[txt_NomMaestro]','$_POST[txt_ApMaestro]','$_POST[txt_AmMaestro]','$_POST[txt_TelcasaMaestro]','$_POST[txt_TelcelularMaestro]','$_POST[txt_CorreoMaestro]','$_POST[txt_PswCanMaestro]','$_POST[txt_CPCanMaestro]','Mexico', 'Jalisco', '' , '','','Maestro')")){
    echo '<script type="text/javascript">
       alert ("Ha Ocurrido un error0 '.$_POST['txt_NomMaestro'].'");
    window.location.assign("../Registro.php");
    </script>';
    exit;
  }
  
  function calcutateAge($dob){
        $dob = date("Y-m-d",strtotime($dob));
        $dobObject = new DateTime($dob);
        $nowObject = new DateTime();
        $diff = $dobObject->diff($nowObject);
        return $diff->y;
  }
  //$Edad = calcutateAge("$_POST[Sl_Anio]-$_POST[Sl_Mes]-$_POST[Sl_Dia]");

  $Last_id=mysqli_insert_id($con);
  //$result=mysqli_query($con,"select id_Usuario from empresa where id_Usuario=".$_SESSION['id']);
  //$row = mysqli_fetch_array($result);
  if(!mysqli_query($con,"INSERT INTO maestros (id_Usuario, id_director, rfc, claveEscuela, funcion, clavePresupuestal,curp) VALUES ('$Last_id', '', '', '', '".$_POST['nombreEs']."', '', '".$_POST['txt_ClavePresupuestal']."', '".strtoupper($_POST['txt_CurpMaestro'])."')")){
    echo '<script type="text/javascript">
       alert ("Ha Ocurrido un error");
    window.location.assign("../Registro.php");
    </script>';
    exit;
  }
  $carpeta = 'documentos/maestro/'.strtoupper($_POST['txt_Curp']);
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
    window.location.assign("../index.php");
    </script>';
}
 ?>
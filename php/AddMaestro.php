<?php
include ("Conexion.php");
session_start();
$idaux = "";
$auxTodo = "";
if (isset($_POST['btn_Candidato'])){
  if(!mysqli_query($con,"insert into usuarios (Nom, Ap, Am, Casa, Celular, Correo, Contrasena, Codigo_Postal,Pais, Estado, Ciudad, Colonia,Calle, Tipo,sexo,documento,claveEscuela)
  VALUES ('".strtoupper($_POST['txt_NomMaestro'])."','".strtoupper($_POST['txt_ApMaestro'])."','".strtoupper($_POST['txt_AmMaestro'])."','$_POST[txt_TelcasaMaestro]','$_POST[txt_TelcelularMaestro]','$_POST[txt_CorreoMaestro]','$_POST[txt_PswCanMaestro]','$_POST[txt_CPCanMaestro]','$_POST[Sl_PaisMaestro]', '$_POST[Sl_EstadoMaestro]', '$_POST[Sl_CiudadMaestro]','$_POST[Sl_ColoniaMaestro]','','Maestro','M',0,'$_POST[prueba13EM]')")){
    echo '<script type="text/javascript">
       alert ("Ha Ocurrido un error0 '.$_POST['txt_NomMaestro'].'");
    window.location.assign("../Registro.php");
    </script>';
    exit;
  }
  //$Edad = calcutateAge("$_POST[Sl_Anio]-$_POST[Sl_Mes]-$_POST[Sl_Dia]");
  for($i=0; $i<=10; $i++){
    $idaux = "id_".$i."Maestro";
    if(isset($_POST[$idaux])){
      $auxTodo = $auxTodo."".$_POST[$idaux]."*";
      echo $auxTodo;
    }else{
      echo "queso".$_POST['$idaux'];
    }
  }
  echo "queso : ".$_POST['id_0'];
  $Last_id=mysqli_insert_id($con);
  //$result=mysqli_query($con,"select id_Usuario from empresa where id_Usuario=".$_SESSION['id']);
  //$row = mysqli_fetch_array($result);
  if(!mysqli_query($con,"INSERT INTO maestros (id_Usuario, id_director, rfc, claveEscuela, funcion, clavePresupuestal,curpMaestro,Grado,Grupo,todo) VALUES ('$Last_id', '', '','$_POST[prueba13EM]','', '".$_POST['txt_ClavePresupuestal']."', '".strtoupper($_POST['txt_CurpMaestro'])."','1','B','$auxTodo')")){
    echo '<script type="text/javascript">
       alert ("Ha Ocurrido un error");

    </script>';
    exit;
  }
  //    window.location.assign("../Registro.php");
  $carpeta = 'documentos/maestro/'.strtoupper($_POST['txt_CurpMaestro']);
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
    exit;
}
//window.location.assign("../index.php");
 ?>

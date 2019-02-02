<?php
include ("Conexion.php");
session_start();
$idaux = "";
$auxTodo = "";
if (isset($_POST['btn_SubDirector'])){
  if(!mysqli_query($con,"insert into usuarios (Nom, Ap, Am, Casa, Celular, Correo, Contrasena, Codigo_Postal,Pais, Estado, Ciudad, Colonia,Calle, Tipo,sexo,documento,claveEscuela)
  VALUES ('".strtoupper($_POST['txt_NomSubDirector'])."','".strtoupper($_POST['txt_ApSubDirector'])."','".strtoupper($_POST['txt_AmSubDirector'])."','$_POST[txt_TelcasaSubDirector]','$_POST[txt_TelcelularSubDirector]','$_POST[txt_CorreoSubDirector]','$_POST[txt_PswCanSubDirector]','$_POST[txt_CPCanSubDirector]','$_POST[Sl_PaisSubDirector]', '$_POST[Sl_EstadoSubDirector]', '$_POST[Sl_CiudadSubDirector]','$_POST[Sl_ColoniaSubDirector]','','SubDirector','M',0,'$_POST[prueba13ESubDirector]')")){
    echo '<script type="text/javascript">
       alert ("Ha Ocurrido un error0 '.$_POST['txt_NomSubDirector'].'");
    window.location.assign("../Registro.php");
    </script>';
    exit;
  }
  //$Edad = calcutateAge("$_POST[Sl_Anio]-$_POST[Sl_Mes]-$_POST[Sl_Dia]");
  for($i=0; $i<=10; $i++){
    $idaux = "id_".$i."SubDirector";
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
  if(!mysqli_query($con,"INSERT INTO subDirector (id_Usuario,curpSubDirector,todo) VALUES ('$Last_id', '".strtoupper($_POST['txt_CurpSubDirector'])."','$auxTodo')")){
    echo '<script type="text/javascript">
       alert ("Ha Ocurrido un error");

    </script>';
    exit;
  }
  //    window.location.assign("../Registro.php");
  $carpeta = 'documentos/subDirector/'.strtoupper($_POST['txt_CurpSubDirector']);
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
       
    </script>';
    exit;
}
//window.location.assign("../index.php");
 ?>

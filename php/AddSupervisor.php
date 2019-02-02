<?php
	include ("Conexion.php");
  session_start();
  $idaux = "";
  $auxTodo = "";
  //Contiene los datos dado el formato: 
  //$NombreArreglo = array(modalidad,clave,grado,grupo)
  $contenedor = array("","","","","");
  if (isset($_POST['btn_Supervisor'])){
    //Arreglos realizados
        for($i=0; $i<1; $i++){
          $idaux = "id_".$i."Supervisor";
          if(isset($_POST[$idaux])){
            $auxTodo = $auxTodo."".$_POST[$idaux]."*";
              echo $auxTodo;
          }else{
              echo "queso".$_POST['$idaux'];
          }
        }
      //Arreglos realizados
      //Metodo que hara la magia
        $totalCaracteres = strlen($auxTodo);
        $AuxPalabras = "";
        $contC = 0;
        for($i=0; $i<$totalCaracteres; $i++){
          if($auxTodo[$i] == "|"){
            $contenedor[$contC] = $AuxPalabras;
            $contC++;
            $AuxPalabras = "";
          }else{
            $AuxPalabras = $AuxPalabras."".$auxTodo[$i];
          }
        }
      //Fin del metodo
    if(!mysqli_query($con,"insert into usuarios (Nom, Ap, Am, Trabajo, Celular, Correo, Contrasena, Codigo_Postal,Pais, Estado, Ciudad, Colonia , Calle, Tipo,sexo,documento,claveEscuela)
    VALUES ('$_POST[txt_NomSupervisor]','$_POST[txt_ApSupervisor]','$_POST[txt_AmSupervisor]',$_POST[txt_TelcasaSupervisor],$_POST[txt_TelcelularSupervisor],'$_POST[txt_CorreoSupervisor]','$_POST[txt_PswCanSupervisor]',$_POST[txt_CPCanSupervisor],'$_POST[Sl_PaisSupervisor]','$_POST[Sl_EstadoSupervisor]', '$_POST[Sl_CiudadSupervisor]','$_POST[Sl_ColoniaSupervisor]' ,'$_POST[txt_CalleCanSupervisor]','Supervisor','M',0,'$contenedor[1]')")){
      printf("Error: %s\n", mysqli_error($con));
      
  		}
    $curpA = strtoupper($_POST['txt_CurpSupervisor']);
    $Last_id=mysqli_insert_id($con);
		if(!mysqli_query($con,"insert into supervisor(id_Usuario,curpSupervisor,todo)
		VALUES ('$Last_id','$curpA','$auxTodo')")){
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
                window.location.assign("../index.php");
                </script>';
                exit;
	}
?>
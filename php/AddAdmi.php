<?php
	include ("Conexion.php");
  $idaux = "";
  $auxTodo = "";
  //Contiene los datos dado el formato: 
  //$NombreArreglo = array(modalidad,clave,grado,grupo)
  $contenedor = array("","","","","");
  if (isset($_POST['btn_personalA'])){
    //Arreglos realizados
        for($i=0; $i<1; $i++){
          $idaux = "id_".$i."PersonalA";
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
    VALUES ('$_POST[txt_NomAdmi]','$_POST[txt_ApAdmi]','$_POST[txt_AmAdmi]',$_POST[txt_TelcasaAdmi],$_POST[txt_TelcelularAdmi],'$_POST[txt_CorreoAdmi]','$_POST[txt_PswCanAdmi]',$_POST[txt_CPCanAdmi],'$_POST[Sl_PaisPersonalA]', '$_POST[Sl_EstadoPersonalA]', '$_POST[Sl_CiudadPersonalA]' ,'$_POST[Sl_ColoniaPersonalA]' ,'$_POST[txt_CalleCanAdmi]','PersonalA','M',0,'$contenedor[1]')")){
      printf("Error: %s\n", mysqli_error($con));
      
  		}
    $curpA = strtoupper($_POST['txt_CurpAdmi']);
    $Last_id=mysqli_insert_id($con);
		if(!mysqli_query($con,"insert into personaladmi(id_Usuario, funcion, departamento, Sexo, curpAdmi, todo)
		VALUES ('$Last_id','$_POST[funcionAdmi]','','M','$curpA','$auxTodo')")){
        echo '<script type="text/javascript">
        alert ("Ha Ocurrido un error   jjjjj");
    
      </script>';
      }
      $carpeta = 'documentos/personal/'.$curpA;
      if (!file_exists($carpeta)) {
          if(mkdir($carpeta, 0777, true)){
            echo '<script type="text/javascript">
             alert ("Creado Correctamente");
          </script>';
          
          }else{
            echo '<script type="text/javascript">
             alert ("Algo salio "");
          </script>';
          }
    }
     echo '<script type="text/javascript">
                alert ("Registrado Correctamente");
                window.location.assign("'.$_SERVER["HTTP_REFERER"].'");
                </script>';
                exit;
	}
?>

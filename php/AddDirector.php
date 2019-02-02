<?php
	include ("Conexion.php");
	$idaux = "";
  	$auxTodo = "";
  	//Contiene los datos dado el formato: 
  	//$NombreArreglo = array(modalidad,clave,grado,grupo)
  	$contenedor = array("","","","","");
	if (isset($_POST['btn_Director'])){
		//Arreglos realizados
      	for($i=0; $i<5; $i++){
        	$idaux = "id_".$i."Director";
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
		if(!mysqli_query($con,'insert into usuarios (Nom, Ap, Am, Celular, Casa, Correo, Contrasena, Codigo_Postal,Pais, Estado, Ciudad, Colonia, Calle, Tipo, sexo,documento,claveEscuela)
		VALUES ("'.strtoupper($_POST['txt_NomDirector']).'","'.strtoupper($_POST['txt_ApDirector']).'","'.strtoupper($_POST['txt_AmDirector']).'","'.$_POST['txt_TelcelularDirector'].'","'.$_POST['txt_TelcasaDirector'].'","'.$_POST['txt_CorreoDirector'].'","'.$_POST['txt_PswCanDirector'].'",'.$_POST['txt_CPCanDirector'].',"'.$_POST['Sl_PaisDirector'].'","'.$_POST['Sl_EstadoDirector'].'","'.$_POST['Sl_CiudadDirector'].'","'.$_POST['Sl_ColoniaDirector'].'","'.$_POST['txt_CalleCanDirector'].'","'."Director".'","'."M".'",0,'."'".''.$contenedor[1].''."'".')')){
			printf("Error: %s\n", mysqli_error($con));
		}
		//Aqui hago una consulta para vefificar el grado y el grupo. select turno, grado, grupo, id_escuela FROM grupos WHERE id_escuela=1  
	    $sql = mysqli_query($con,"select id_Supervisor,nombreEscuela from zona where clave='$_POST[prueba13D]'" );
	    $row = mysqli_fetch_array($sql);
	    $escuelaid = "";
	    $Id_Supervisor= "$_POST[id_Supervisor]";
	   	$numeroU = $row['id_Usuario'];
	    //if($row['claveEsc']==$_POST[txt_ClaveEscolar]){
	    	//$sql1 = mysqli_query($con,"select turno, grado, grupo, id_escuela, id_Grupo FROM grupos WHERE id_escuela=".$row['id_escuela']." ");
	    	//$row = mysqli_fetch_array($sql1);
	    	$escuelaid = 1;
	    	$grupoid = 1;
	    	$curpA = strtoupper($_POST['txt_CurpDirector']);
	    	$Last_id=mysqli_insert_id($con);
			if(!mysqli_query($con,"insert into director(id_Usuario,id_Supervisor,curpDirector,todo) VALUES ('$Last_id', '$Id_Supervisor','$curpA','$auxTodo')")){
				printf("Error: %s\n", mysqli_error($con));
			}
			$carpeta = 'documentos/director/'.$curpA;
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

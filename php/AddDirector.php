<?php
	include ("Conexion.php");
	if (isset($_POST['btn_Director'])){
		if(!mysqli_query($con,'insert into usuarios (Nom, Ap, Am, Celular, Casa, Correo, Contrasena, Codigo_Postal,Pais, Estado, Ciudad, Colonia, Calle, Tipo, sexo,documento,claveEscuela)
		VALUES ("'.strtoupper($_POST['txt_NomDirector']).'","'.strtoupper($_POST['txt_ApDirector']).'","'.strtoupper($_POST['txt_AmDirector']).'","'.$_POST['txt_TelcelularDirector'].'","'.$_POST['txt_TelcasaDirector'].'","'.$_POST['txt_CorreoDirector'].'","'.$_POST['txt_PswCanDirector'].'",'.$_POST['txt_CPCanDirector'].',"'.$_POST['Sl_PaisDirector'].'","'.$_POST['Sl_EstadoDirector'].'", "'.$_POST['Sl_CiudadDirector'].'","'.$_POST['Sl_ColoniaDirector'].'","'.$_POST['txt_CalleCanDirector'].'","'."Director".'","'."M".'",0,'."'".''.$_POST['prueba13'].''."'".')')){
			printf("Error: %s\n", mysqli_error($con));
		}
		//Aqui hago una consulta para vefificar el grado y el grupo. select turno, grado, grupo, id_escuela FROM grupos WHERE id_escuela=1  
	    $sql = mysqli_query($con,"select id_Usuario from usuarios where Tipo='Alumno' and Correo='$_POST[txt_Correo]'" );
	    $row = mysqli_fetch_array($sql);
	    $grado = $_POST['S_Grado'];
	    $grupo = $_POST['S_Grupo'];
	    $escuelaid = "";
	    $grupoid = "";
	   	$numeroU = $row['id_Usuario'];
	    //if($row['claveEsc']==$_POST[txt_ClaveEscolar]){
	    	//$sql1 = mysqli_query($con,"select turno, grado, grupo, id_escuela, id_Grupo FROM grupos WHERE id_escuela=".$row['id_escuela']." ");
	    	//$row = mysqli_fetch_array($sql1);
	    	$escuelaid = 1;
	    	$grupoid = 1;
	    	$curpA = strtoupper($_POST['txt_Curp']);
	    	$Last_id=mysqli_insert_id($con);
			if(!mysqli_query($con,"insert into alumnos(id_Usuario, id_Escuela, id_Grupo, curpAlumno, nomPapa, apPapa, amPapa, curpPapa, telPapa, nomMama, apMama, amMama, curpMama, telMama) VALUES ('$numeroU', '$escuelaid','$grupoid','$curpA','$_POST[txt_nomPapa]', '$_POST[txt_apPapa]', '$_POST[txt_amPapa]', '$_POST[txt_curpPapa]', '$_POST[txt_telPapa]', '$_POST[txt_nomMama]', '$_POST[txt_apMama]', '$_POST[txt_amMama]', '$_POST[txt_curpMama]', '$_POST[txt_telMama]','$_POST[S_Grado]','$_POST[S_Grupo]')")){
				printf("Error: %s\n", mysqli_error($con));
			}
			$carpeta = 'documentos/alumno/'.$curpA;
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
/*
			echo '<script type="text/javascript">
			     alert ("Registrado Correctamente");
				window.location.assign("../index.php");
				</script>';
				exit;*/
	}
?>
	
		
?>

<?php
	//Aqui es el registro de alumnos
	include ("Conexion.php");
	if (isset($_POST['btn_Empresa'])){
		if(!mysqli_query($con,"insert into usuarios (Nom, Ap, Am, Celular, Casa, Correo, Contrasena, Codigo_Postal,Pais, Estado, Ciudad, Colonia, Calle, Tipo, sexo)
		VALUES ('$_POST[txt_Nom]','$_POST[txt_Ap]','$_POST[txt_Am]','$_POST[txt_Telcelular]','$_POST[txt_Telcasa]','$_POST[txt_Correo]','$_POST[txt_Psw]','$_POST[txt_CP]','$_POST[Sl_Pais]', '$_POST[Sl_Estado]', '$_POST[Sl_Ciudad]' ,'$_POST[Sl_Colonia]' ,'$_POST[txt_Calle]','Alumno','$_POST[Sl_Sexo]')")){
			printf("Error: %s\n", mysqli_error($con));
		}
		//Aquihago una consulta para vefificar el grado y el grupo. select turno, grado, grupo, id_escuela FROM grupos WHERE id_escuela=1  
	    $sql = mysqli_query($con,"select id_Usuario from usuarios where Tipo='Alumno' and Correo='$_POST[txt_Correo]'" );
	    $row = mysqli_fetch_array($sql);
	    $grado = $_POST['txt_Grado'];
	    $grupo = $_POST['txt_Grupo'];
	    $escuelaid = "";
	    $grupoid = "";
	   	$numeroU = $row['id_Usuario'];
	    //if($row['claveEsc']==$_POST[txt_ClaveEscolar]){
	    	//$sql1 = mysqli_query($con,"select turno, grado, grupo, id_escuela, id_Grupo FROM grupos WHERE id_escuela=".$row['id_escuela']." ");
	    	//$row = mysqli_fetch_array($sql1);
	    	$escuelaid = 1;
	    	$grupoid = 1;
	    	
	    	$Last_id=mysqli_insert_id($con);
			if(!mysqli_query($con,"insert into alumnos(id_Usuario, id_Escuela, id_Grupo, curpAlumno, nomPapa, apPapa, amPapa, curpPapa, telPapa, nomMama, apMama, amMama, curpMama, telMama) VALUES ('$numeroU', '$escuelaid','$grupoid','$_POST[txt_Curp]','$_POST[txt_nomPapa]', '$_POST[txt_apPapa]', '$_POST[txt_amPapa]', '$_POST[txt_curpPapa]', '$_POST[txt_telPapa]', '$_POST[txt_nomMama]', '$_POST[txt_apMama]', '$_POST[txt_amMama]', '$_POST[txt_curpMama]', '$_POST[txt_telMama]')")){
				printf("Error: %s\n", mysqli_error($con));
			}
			$carpeta = 'documentos/alumno/'.$_POST['txt_Curp'];
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

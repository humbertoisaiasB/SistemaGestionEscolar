<?php 
	include("Conexion.php");
	session_start(); //Se inicia una sesion
	$user = $_POST['txt_User']; // Se almacena los valores que introdujo el usuario
	$pass = $_POST['txt_Password']; 
	if(empty($_POST['txt_User']) || empty($_POST['txt_Password'])) { // En caso de que los campos esten vacios
        echo '<div class="alert alert-info">
 			 <strong>Revisa los campos!</strong>  Usuario y/o Contraseña vacios.
			</div>';
			exit;
     } 
	
	if(isset($_POST['txt_Password']) && isset($_POST['txt_User']))
	{
		$sql="select id_Usuario,Nom, Correo, Contrasena,Tipo from usuarios where Correo='$user' and Contrasena='$pass'";
		$result=mysqli_query($con,$sql);
		if($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$_SESSION['id']=$row['id_Usuario'];
			$_SESSION['User']=$row['Nom'];
			//Aqui esta para el alumno
			if($row['Tipo']=="Alumno"){
				$sql2=mysqli_query($con,"select id_Alumno from alumnos where id_Usuario=".$_SESSION['id']);
				$row2=mysqli_fetch_array($sql2);
				$_SESSION['id_Alumno']=$row2["id_Alumno"];
				echo '<script type="text/javascript">
				window.location.assign("alumno/Main.php"); 
				</script>';
				exit;
				//Aqui para el maestro
			}else if($row['Tipo']=="Maestro"){
				$sql2=mysqli_query($con,"select id_Maestro from maestros where id_Usuario=".$_SESSION['id']);
				$row2=mysqli_fetch_array($sql2);
				$_SESSION['id_Maestro']=$row2["id_Maestro"];
				echo '<script type="text/javascript">
				window.location.assign("maestro/Main.php"); 
				</script>';
				exit;
				//Aqui para el personalAdministrativo
			}else if($row['Tipo']=="PersonalA"){
				$sql2=mysqli_query($con,"select id_Personal from personaladmi where id_Usuario=".$_SESSION['id']);
				$row2=mysqli_fetch_array($sql2);
				$_SESSION['id_Personal']=$row2["id_Personal"];
				echo '<script type="text/javascript">
				window.location.assign("personalA/Main.php"); 
				</script>';
				exit;
				//Aqui para el director
			}elseif ($row['Tipo']=="Director") {
				echo '<script type="text/javascript">
				window.location.assign("director/Main.php"); 
				</script>';
				exit;
				//Aqui para el Administrador
			}else if($row['Tipo']=="Administrador"){
				echo '<script type="text/javascript">
				window.location.assign("admin/Main.php"); 
				</script>';
				exit;
			}
		}else 
		{
			mysqli_close($con);
			echo '<div class="alert alert-danger">
 			 <strong>Incorrecto!</strong> Usuario y/o Contraseña incorrectos.
			</div>';
			exit;
		}

	//mysqli_close($con);
	
	}

?>
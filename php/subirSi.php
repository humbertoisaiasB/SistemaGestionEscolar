<?php
	include "Conexion.php";
	session_start();
	$sql = mysqli_query($con, "select Tipo from usuarios where id_usuario=".$_SESSION['id']."");
	$row1 = mysqli_fetch_array($sql);
	if($row1['Tipo']=='Alumno'){
		$asd = mysqli_query($con,"select a.curpAlumno,u.Nom,u.Ap,u.Am,u.tipo from usuarios as u inner join alumnos as a on(a.id_usuario=u.id_usuario) where u.id_usuario=".$_SESSION['id']."");
		$row = mysqli_fetch_array($asd);
		$nombre_temporal = $_FILES['archivo']['tmp_name'];
		$nombre = $_FILES['archivo']['name'];
		$nombreF = $_SESSION['nombreD'].".pdf";
		echo '<script type="text/javascript">
         alert ("Ya llegamos aqui we '.$nombreF.'");
      </script>';
		move_uploaded_file($nombre_temporal,'documentos/alumno/'.$row['curpAlumno'].'/'.$nombreF); 
		echo "es : ".$_POST['tipo'];
	}
	
?>
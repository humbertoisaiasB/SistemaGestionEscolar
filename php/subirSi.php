<?php
	include "Conexion.php";
	session_start();
	$asd = mysqli_query($con,"select a.curpAlumno,u.Nom,u.Ap,u.Am,u.tipo from usuarios as u inner join alumnos as a on(a.id_usuario=u.id_usuario) where u.id_usuario=".$_SESSION['id']."");
	$row = mysqli_fetch_array($asd);
	$nombre_temporal = $_FILES['archivo']['tmp_name'];
	$nombre = $_FILES['archivo']['name'];
	move_uploaded_file($nombre_temporal,'documentos/'.$row['tipo'].'/'.$row['curpAlumno'].'/'.$nombre); 
	echo "es : ".$_POST['tipo'];
?>
<?php 
	if(isset($_POST['accion']) && $_POST['accion']=="subirArchivoYa"){
		/*
		$var1 = "'".'txt_Documento'."'";
		$var2 = 'alumno';
		echo $_POST['curp'];
		echo $_POST['archivo'];
		$var3 = $_POST['curp'];
		$var4 = $_POST['archivo'].'hola';
		subir($var1,$var2,$var3,$var4);
		echo '<script type="text/javascript">
	          alert("Buen Trabajo! *'.$var4.' *'.$_SERVER['PHP_SELF'].'", "archivo bien!", "success");
	      </script>';
	      */	
	}
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Subir Archivos</title>
	</head>
	<body>
		<input type="file" name="subir">
		<input type="submit" name="enviar">
	</body>
	</html>
<?php
//Tengo una funcion que se encarga de la subida y control de los documentos
	function subir($source,$tipo,$curp,$nombre2){
			$Destino = 'documentos/'.$tipo.'/'.$curp.'/';
			$Nombre = '';
			$Nombre = $_FILES[$source]['name'];
		//El nombre del archivo SE DARA POR LA CURP_
			$NombreNuevo = $nombre2;
			$tmp = $_FILES[$source]['tmp_name'];
			echo '<script type="text/javascript">
	          alert("Buen Trabajo! *1'.$Destino.' *2'.$source.' *3'.$Nombre.' *4'.$tmp.'", "dentro de la funcion!", "success");
	      </script>';
			$tipo = explode('.',$Nombre);
			$tipo = end($tipo);
			$NombreNuevo = $NombreNuevo;
			move_uploaded_file($tmp, $Destino.$NombreNuevo.'.'.$tipo);	
	}
?>

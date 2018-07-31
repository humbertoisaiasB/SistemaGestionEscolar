<?php
	session_start();
	if($_FILES["btn_Pic"]["error"]>0){
		echo '<script type="text/javascript">
         alert ("Ha Ocurrido un error al cargar la imagen");
      	</script>';
      	header("Location: ".$_SERVER["HTTP_REFERER"]);
      	exit;
	}else{
		$permitidos=array("image/jpg","image/png","image/jpeg");
		$limite_kb=2000;
		if(in_array($_FILES["btn_Pic"]["type"], $permitidos) && $_FILES["btn_Pic"]["size"]<= $limite_kb*1024 ){
			$ruta='../assets/Profiles/';
		//	$archivo=$ruta.$_SESSION['id'].'.'.substr($_FILES["btn_Pic"]["type"],6);
			$archivo=$ruta.$_SESSION['id'].'.png';

			$resultado=@move_uploaded_file($_FILES["btn_Pic"]["tmp_name"], $archivo);
			if($resultado){
				header("Location: ".$_SERVER["HTTP_REFERER"]);
			}else{
				echo '<script type="text/javascript">
         		alert ("Archivo no guardado");
      			</script>';
      			header("Location: ".$_SERVER["HTTP_REFERER"]);
      			exit;
			}
		}else{
			echo '<script type="text/javascript">
         	alert ("Archivo no permitido");
      		</script>';
      		header("Location: ".$_SERVER["HTTP_REFERER"]);
      		exit;
		}

	}

?>

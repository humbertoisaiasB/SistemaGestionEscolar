<?php 
	include "Conexion.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Subir archivos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="../assets/bootstrap/js/jquery-3.1.1.js" ></script>
    <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
		<div class="col">
			<form action="" id="form_subir">
				<div class="">
					<label for="">Archivo a subir: con</label>
					<input type="file" name="archivo" required>
				</div>
				<div class="barra">
					<div class="barra_azul" id="barra_estado">
						<span></span>
					</div>
				</div>
				<div class="acciones">
					<input type="submit" class="btn" value="Enviar">

					<input type="button" name="cancelar" id="cancelar" value="Cancelar" >
				</div>
			</form>
		</div>
</body>
</html>
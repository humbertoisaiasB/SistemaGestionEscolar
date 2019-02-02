<?php 
	include "Conexion.php";
	session_start();
	$variabble = $_SESSION['nombreD'];
	$variabble = nombreCadena($variabble);
	function nombreCadena($largo){
		$chico = "";
		$total = strlen($largo);
		for($i=0; $i<=$total; $i=$i+1){
			if($largo[$i]=="_"){
				$chico = substr($largo, 0, $i);
				break;
			}else{
				$chico = "Queso";
			}
		}
		return $chico;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Subir archivos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="../assets/bootstrap/js/jquery-3.1.1.js" ></script>
    <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<main>
		<section class="row">
			<div class="col" align="center">
			<form action="" id="form_subir">
				<div class="">
					<label for="">Archivo a enviar de: <?php echo $variabble; ?></label>
					<input class="form-control-file" type="file" name="archivo" required>
				</div>
				<div class="progress">
				  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" id="barra_estado">
				    <span class="sr-only"></span>
				  </div>
				</div>
				<div class="acciones">
					<input type="submit" class="btn btn-success" value="Enviar">

					<input class="btn btn-danger" type="button" name="cancelar" id="cancelar" value="Cancelar" >
				</div>
			</form>
		</div>
		</section>
	</main>
</body>
	<script type="text/javascript">
		document.addEventListener("DOMContentLoaded", () =>{
			let form = document.getElementById('form_subir');
			form.addEventListener("submit", function(event) {
				event.preventDefault();
				subir_archivos(this);
			}); 
		});
		function subir_archivos(form){
			let barra_estado = form.children[1].children[0],span = barra_estado.children[0], boton_cancelar = form.children[2].children[1];
				barra_estado.classList.remove('barra_verde','barra_roja');
				//Realizamos una peticion.
				let peticion = new XMLHttpRequest();
				//progreso
				peticion.upload.addEventListener("progress",(event)=>{let porcentaje = Math.round((event.loaded/event.total)*100);
					console.log(porcentaje);
					barra_estado.style.width = porcentaje+'%';
					span.innerHTML = porcentaje+'%';
				});
				//finalizado
				peticion.addEventListener("load",() => {
					barra_estado.classList.add('barra_verde');
					span.innerHTML = "Proceso completado";
				});
				//enviar datos.
				peticion.open('POST','subirSi.php');
				nuevaData = new FormData(form);
				peticion.send(nuevaData);

				//cancelar
				boton_cancelar.addEventListener("click",() =>{
					peticion.abort();
					barra_estado.classList.remove('barra_verde');
					barra_estado.classList.add('barra_roja');
					span.innerHTML = "Proceso cancelado!!";

				});
		}
	</script>
</html>
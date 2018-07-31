<!DOCTYPE html>
<html lang="es">
<head>
	<title>Subir archivos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
</head>
<body>
	<div class="row">
		<div class="col">
			<form action="" id="form_subir">
				<div class="">
					<label for="">Archivo a subir:</label>
					<input type="file" name="archivo" required="">
				</div>
				<div class="barra">
					<div class="barra azul" id="barra_estado">
						<span></span>
					</div>
				</div>
				<div class="acciones">
					<input type="submit" class="btn" value="Enviar">

					<input type="button" name="cancelar" id="cancelar" value="Cancelar" >
				</div>
			</form>
		</div>
	</div>
</body>
	<script type="text/javascript">
		document.addEventListener("DOMContentLoader", () =>{
			let form = document.getElementById('form_subir');
			form.addEventListener("submit", (event) => {
				event.preventDefault();
				subir_archivos(this);
			})
		});
		function subir_archivos(form){
			let barra_estado = form.children[1].children[0],span = barra_estado.children[0], boton_cancelar = form.children[2].children[0];
				barra_estado.classList.remove('barra_verde','barra_roja');
				//Realizamos una peticion.
				let peticion = new XMLHttpRequest();
				//progreso
				peticion.upload.addEventListener("progress",(event)=>{let porcentaje = Math.round((event.loader/event.total)*100);
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
				peticion.send(new FormData(form));

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
<?php 
  /*n_start();
	if(empty($_SESSION['User']) && empty($_SESSION['id'])){ header("Location: ../index.php");}
	$ruta='../assets/Profiles/';
      $archivo=$ruta.$_SESSION['id'].'.png';*/
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/Home.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="../assets/css/Mycss.css">
    <script type="text/javascript" src="../assets/bootstrap/js/jquery-3.1.1.js" ></script>
    <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../assets/JS/MyJS.js"></script>

	<title>Alumno</title>
</head>
<body class="site">

	<main class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <h1 align="center">Subida y gestion de papaeles.</h1>
          <div class="alert alert-dismissable alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p align="Center">Usted podra subir y gestionar los archivos que sean necesarios para la correcta estancia de los alumnos.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="col-md-8  well">
              <h3 align="center">Formulario.</h3>
              <form class="form-horizontal" action="../php/SubirPdf.php" method="POST" enctype="multipart/form-data">
                <!--Aqui se muero esto un rato-->
                <div id="div_Documento1">
                  <label>Documento 1: </label><input id="txt_Documento1" onfocus="validacion4all(/[a-zA-Z0-9-.]/,'Documento1',this.value);" type="file" class="form-control"  name="txt_Documento1"><span id="span_Documento1" ></span>
                </div>
                <div id="div_Documento2">
                  <label>Documento 2: </label><input id="txt_Documento2" onfocus="validacion4all(/[a-zA-Z0-9-.]/,'Documento2',this.value);" type="file" class="form-control"  name="txt_Documento2"><span id="span_Documento2" ></span>
                </div>
                <div id="div_Documento3">
                  <label>Documento 3: </label><input id="txt_Documento3" onfocus="validacion4all(/[a-zA-Z0-9-.]/,'Documento3',this.value);" type="file" class="form-control"  name="txt_Documento3"><span id="span_Documento3" ></span>
                </div>
                <div id="div_Documento4">
                  <label>Documento 4: </label><input id="txt_Documento4" onfocus="validacion4all(/[a-zA-Z0-9-.]/,'Documento4',this.value);" type="file" class="form-control"  name="txt_Documento4"><span id="span_Documento4" ></span>
                </div>
                  <div align="center" class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="btn_Submitpdf" class="btn btn-success">Subir todos los archivos </button>
                    </div>
                  </div>
                </form>
          </div>
					<div class="col-md-3 col-sm-offset-1 well">
						<?php
						if(file_exists($archivo)){
							echo '<img class="img-rounded"  src="'.$archivo.'" height="256px" width="256px" >';
						}else {
							 echo '<img class="img-rounded" src="../assets/Profiles/default.png" height="256px" width="256px" >';
						} ?>
					 <form method="post" enctype="multipart/form-data" action="../php/Picture.php">
						<h4>Subir/Cambiar foto...</h4>
						<label class="btn btn-primary btn-file btn-md">
							 Seleccionar imagen<input type="file" style="display: none;" name="btn_Pic" id="btn_Pic" accept="image/*" >
						</label>
								<input type="submit" class="btn btn-danger btn-md" value="Guardar Imagen........">
						</form>
						<iframe name="caca" style="display:none;"></iframe>
					</div>
        </div>
      </div>
    </div>

  </main>



	<script type="text/javascript">

	function asd(){
		window.location.assign("../Candidato/Main.php");
	}

	</script>

</body>
</html>
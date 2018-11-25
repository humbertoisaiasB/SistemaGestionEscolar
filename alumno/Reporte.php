<?php 
      include '../php/Conexion.php';
      session_start();
      if(empty($_SESSION['User']) && empty($_SESSION['id'])){ header("Location: ../index.php");}
      $query1 = mysqli_query($con,"select * from usuarios u inner join alumnos a on(u.id_Usuario=a.id_Usuario) inner join zona z on(u.claveEscuela=z.clave) where a.id_Usuario=u.id_Usuario and u.id_Usuario=".$_SESSION['id']);
      $val = mysqli_fetch_array($query1);
      $ruta='../assets/Profiles/';
      $archivo=$ruta.$_SESSION['id'].'.png';
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

	<title>Informes</title>
</head>
<body class="site">
	<header>
    <nav class="navbar navbar-default" >
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" style="color:white !important;"  href="Main.php">Gestion Escolar</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php
				if(isset($_GET['Xd']) && $_GET['Xd']==1){
						echo '  <ul class="nav navbar-nav navbar-right" >
			          <li><a class="col" style="color:white !important;"  href="Main.php">Inicio</a></li>
			          <li><a class="col" style="color:white !important;" data-toggle="modal" href="#Notif">Notificaciones</a></li>
			          <li class="dropdown">
			          <a href="#" class="col dropdown-toggle" style="color:white !important;"  data-toggle="dropdown">';
								if(file_exists($archivo)){
							 echo '<img src="'.$archivo.'"  height="30px" width="30px" class="special-img img-circle">';
							}else{
								echo '<img src="'.$ruta.'default.png"  height="30px" width="30px" class="special-img img-circle">';
							} echo ' '.$_SESSION['User'];
						echo '<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	              <li><a   href="Actualizarinformacion.php"><i class="fa fa-cog"></i> Mi cuenta</a></li>';
						echo '<li><a target="_blank" href="../assets/Pdf/'.$_SESSION['id'].'.pdf"><i class="glyphicon glyphicon-sunglasses"></i> Ver PDF</a></li>';
						echo ' <li><a href="Reporte.php?Xd=1"><i class="glyphicon glyphicon-refresh"></i> Generar PDF</a></li>
						<li class="divider"></li>
						<li><a  href="../index.php"><i class="fa fa-sign-out"></i>Sign-out</a></li>
				</ul>
				</li>
			</ul>';
				}else{
				} ?>

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  </header>

	<style media="screen">
	.jumbotron {
	padding: 0.3em 0.6em;
	h1 {
			font-size: 2em;
	}
	p {
			font-size: 0.9em;
			.btn {
					padding: 0.5em;
			}
	}
}
	</style>

	<main class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-sm-12">

					<div class="jumbotron">
						<h1 align="center">Generación de informacion alumno(Prueba)</h1>
				  </div>

					<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p align="Center">  <strong>¡Atención!</strong> Si vas agregar una foto, agregala primero despues llenas el formulario.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="col-md-8 col-sm-8 well">
              <h3 align="center">Formulario.</h3>
              <form class="form-horizontal" action="GenerarPDF.php" method="POST" target="tpdf" onsubmit="asd();">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Informacion adicional:</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="Perfil" placeholder="En este campo, agregas información sobre tu perfil personal." rows="5" cols="40" required></textarea>
                    </div>
                  </div>
                  <div align="center" class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" name="btn_Submitpdf"  class="btn btn-success" value="Generar PDF">
                    </div>
                  </div>
                </form>
          </div>
					<div class="col-md-3 col-sm-3 col-sm-offset-1 well">
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
						<iframe name="tpdf" style="display:none;"></iframe>
					</div>
        </div>
      </div>
    </div>

  </main>


  <footer>
    <i class="fa fa-facebook-official f2c-hover-opacity"></i>
      <i class="fa fa-instagram f2c-hover-opacity"></i>
      <i class="fa fa-twitter f2c-hover-opacity"></i>
    <p>Powered by <strong>Dym Corp</p></strong>
  </footer>

	<script type="text/javascript">
	function asd(){

		<?php if(isset($_GET['Xd']) && $_GET['Xd']==1){ ?>
			setTimeout(function(){window.location.assign("../alumno/Main.php");
			alert("PDF Generado Correctamente"); },2000);


		<?php }else{ ?>
			setTimeout(function(){window.location.assign("../alumno/Main.php");
			alert("Registro y PDF Generado Correctamente"); },2000);

		<?php } ?>
	}
	</script>

</body>
</html>

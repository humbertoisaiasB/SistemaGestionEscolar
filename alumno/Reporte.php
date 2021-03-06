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
            <div class="col-md-8 col-sm-8 registro1 well">
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
        </div>
      </div>
    </div>

  </main>


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

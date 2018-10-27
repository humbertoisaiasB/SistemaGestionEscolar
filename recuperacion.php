<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Recuperacion de cuenta.</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/assets1/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/assets1/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <script type="text/javascript" src="assets/JS/MyJS.js"></script>
        
    <!-- Custom styles for this template -->
    <link href="assets/assets1/css/style.css" rel="stylesheet">
    <link href="assets/assets1/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="#">
		        <h2 class="form-login-heading">Ingrese los datos correspondientes.</h2>
		        <div class="login-wrap">
		            <input type="text" id="correo" class="form-control" placeholder="Correo">
		            <br>
		            <input type="text" id="curp" class="form-control" placeholder="Curp">
		            <button id="enviaE" onclick="return recuperaE();" class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Enviar</button>
		            <br>
		            <div class="registration">
		                ¿Aun no estas registrado?<br/>
		                <a class="" href="Registro.php">
		                    Crear un usuario
		                </a>
		            </div>
		
		        </div>
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/assets1/js/jquery.js"></script>
    <script src="assets/assets1/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/assets1/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("images/pic01.jpg", {speed: 500});
    </script>


  </body>
</html>
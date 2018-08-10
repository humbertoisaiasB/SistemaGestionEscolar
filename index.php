<?php session_start();
      session_unset();  
      session_destroy();
       ?>
<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Sistema gestion escolar</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/Home.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
      <script type="text/javascript" src="assets/bootstrap/js/jquery-3.1.1.js" ></script>
      <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="assets/JS/MyJS.js"></script>

	</head>
	<body class="landing is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					<h1><a href="index.php">Sistema gestion escolar</a></h1>
					<nav id="mySidebar" class="col-sm-4">
						<ul>
							<li><a href="index.php">Inicio</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Layouts</a>
								<ul>
									<li><a href="generic.html">Generic</a></li>
									<li><a href="contact.html">Contact</a></li>
									<li><a href="elements.html">Elements</a></li>
								</ul>
							</li>
							<li><a href="#" data-toggle="modal" data-target="#Mod" class="button primary" onclick="f2c_open();" >Iniciar Sesion</a></li>
							<li><a href="Registro.php" class="button">Registrarse</a></li>
						</ul>
						
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<h2>Sistema gestion escolar</h2>
					<p>Ingresa con tu cuenta correspondiente, oh registrate.</p>
					<ul class="actions special">
						<li><a href="#" data-toggle="modal" data-target="#Mod" class="button primary">Iniciar Sesion</a></li>
						<li><a href="Registro.php" class="button">Registrarse</a></li>
					</ul>
				</section>

			<!-- Main -->
				<section id="main" class="container">

					<section class="box special">
						<header class="major">
							<h2>Introduciendo la tecnologia responsive
							<br />
							Para que todos tus dispositivos sean compatibles.</h2>
						</header>
						<span class="image featured"><img src="images/pic01.jpg" alt="" /></span>
					</section>
<!--
					<section class="box special features">
						<div class="features-row">
							<section>
								<span class="icon major fa-bolt accent2"></span>
								<h3>Magna etiam</h3>
								<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
							</section>
							<section>
								<span class="icon major fa-area-chart accent3"></span>
								<h3>Ipsum dolor</h3>
								<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
							</section>
						</div>
						<div class="features-row">
							<section>
								<span class="icon major fa-cloud accent4"></span>
								<h3>Sed feugiat</h3>
								<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
							</section>
							<section>
								<span class="icon major fa-lock accent5"></span>
								<h3>Enim phasellus</h3>
								<p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
							</section>
						</div>
					</section>
-->

				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<p>Powered by <strong>Dym Corp.</p></strong>
					</ul>
				</footer>
				<div id="Mod" class="modal fade" role="dialog">
					  <div class="modal-dialog modal-md">
					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Iniciar sesión</h4>
					      </div>
					      <div class="modal-body">
					    <font size="4"></font>

					         <form  action="#">
					                    
					                        <div class="input-group">
					                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					                            <input class="form-control" placeholder="E-mail" name="txt_User"  type="text" id="txt_User">
					                        </div>
					                        </br>
					                        <div class="input-group">
					                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					                            <input class="form-control" placeholder="Password" name="txt_Password" type="password" id="txt_Password">
					                        </div>
					                        </br>
					                        <input class="btn btn-lg btn-success btn-block" type="submit"  value="Iniciar sesión" id="btn_Login" onclick="return login();">
					                        <br>
					                        <div id="Login" ></div>
					                        <p class="">¿No tienes cuenta? <a href="Registro.php">Registrate</a></p>
					                        <p class="">Se te olvidó la contraseña? <a href="">Recuperar</a></p>
					                    
					                    </form>
					       </div>
					    </div>
					  </div>
					</div>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script>
    var mySidebar = document.getElementById("mySidebar");
    function f2c_open() {
        if (mySidebar.style.display === 'block') {
            mySidebar.style.display = 'none';
        } else {
            mySidebar.style.display = 'block';
        }
    }
    function f2c_close() {
        mySidebar.style.display = "none";
    }
  </script>
	</body>
</html>
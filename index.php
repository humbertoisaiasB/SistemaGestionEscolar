<?php session_start();
      session_unset();  
      session_destroy();
       ?>
<!DOCTYPE html>
<html>
<head >
     <title>Gestion</title>
     <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/Home.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
      <script type="text/javascript" src="assets/bootstrap/js/jquery-3.1.1.js" ></script>
      <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="assets/JS/MyJS.js"></script>
     
</head>
<body>


<!-- Header with full-height image -->
<header class="bgimg-1 f2c-display-container f2c-grayscale-min" id="home">
  
</header>

<!-- Navbar (sit on top) -->
<div class="f2c-top">
  <div class="f2c-bar f2c-white f2c-card" id="myNavbar">
    <a href="index.php" class="f2c-bar-item f2c-button f2c-wide txt-col txt-siz"><b>Gestion</b></a>
    <!-- Right-sided navbar links -->
    <div class="f2c-right f2c-hide-small">
      <a href="index.php" class="f2c-bar-item f2c-button txt-col"><i class="fa fa-th"></i> Inicio</a>
      <a href="#about" class="f2c-bar-item f2c-button txt-col">Acerca de nosotros</a>
      <a class="f2c-bar-item f2c-button txt-col" data-toggle="modal" data-target="#Mod"><i class="fa fa-user"></i> Iniciar sesión</a>
      <a href="Registro.php" class="f2c-bar-item btn btn-success btn-md" style="margin-right:15px;margin-top:10px;"role="button">Registrarme</a>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->
    <a href="javascript:void(0)" class="f2c-bar-item f2c-button f2c-right f2c-hide-large f2c-hide-medium" onclick="f2c_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>
<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="f2c-sidebar f2c-bar-block f2c-black f2c-card f2c-animate-left f2c-hide-medium f2c-hide-large navbar-right" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="f2c_close()" class="f2c-button f2c-large f2c-padding-16 pull-right cls">Cerrar ×</a>
  <p class="f2c-bar-item"></p>
  <a href="#home" onclick="f2c_close()" class="f2c-bar-item f2c-button">Inicio</a>
  <a href="#about" onclick="f2c_close()" class="f2c-bar-item f2c-button">Acerca de nosotros</a>
  <a href="#" data-toggle="modal" data-target="#Mod" onclick="f2c_close()" class="f2c-bar-item f2c-button">Iniciar sesión</a>
</nav>


<!-- About Section -->
<div class="f2c-container" style="padding:128px 16px" id="about">
  <h1 class="f2c-center">Acerca de nosotros</h1>
  <p class="f2c-center f2c-large">Empresa nueva en el mercado</p>
  <div class="f2c-row-padding f2c-center" style="margin-top:64px">
    <div class="f2c-quarter">
      <i class="fa fa-desktop f2c-margin-bottom f2c-jumbo f2c-center"></i>
      <p class="f2c-large">Responsive</p>
      <p>Brindar el mejor servicio en el diseño web Responsive.</p>
    </div>
    <div class="f2c-quarter">
      <i class="fa fa-heart f2c-margin-bottom f2c-jumbo"></i>
      <p class="f2c-large">Pasión</p>
      <p>Nuestra pasión es brindar a nuestros clientes una navegación efectiva.</p>
    </div>
    <div class="f2c-quarter">
      <i class="fa fa-diamond f2c-margin-bottom f2c-jumbo"></i>
      <p class="f2c-large">Diseño</p>
      <p>Crear los mejores diseños!</p>
    </div>
    <div class="f2c-quarter">
      <i class="fa fa-cog f2c-margin-bottom f2c-jumbo"></i>
      <p class="f2c-large">Soporte</p>
      <p>Brindar soporte al usuario en caso de algún error.</p>
    </div>
  </div>
</div>


<!--Modal-->

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
<!-- Footer -->
<footer class="f2c-center f2c-black f2c-padding-64">
  <a href="#home" class="f2c-button f2c-light-grey"><i class="fa fa-arrow-up f2c-margin-right"></i>To the top</a>
  <div class="f2c-xlarge f2c-section">
    <i class="fa fa-facebook-official f2c-hover-opacity"></i>
    <i class="fa fa-instagram f2c-hover-opacity"></i>
    <i class="fa fa-snapchat f2c-hover-opacity"></i>
    <i class="fa fa-pinterest-p f2c-hover-opacity"></i>
    <i class="fa fa-twitter f2c-hover-opacity"></i>
    <i class="fa fa-linkedin f2c-hover-opacity"></i>
  </div>
  <p>Powered by <strong>Dym Corp</p>
</footer>

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

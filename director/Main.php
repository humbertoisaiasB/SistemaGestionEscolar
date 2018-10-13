<?php
  include "../php/Conexion.php";
  session_start(); 
  if(empty($_SESSION['User']) && empty($_SESSION['id'])){ 
  header("Location: ../index.php");}
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
    <link href="../assets/assets1/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/assets1/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/assets1//js/gritter/css/jquery.gritter.css" />
        
    <!-- Custom styles for this template -->
    <link href="../assets/assets1/css/style.css" rel="stylesheet">
    <link href="../assets/assets1/css/style-responsive.css" rel="stylesheet">
  <title>Director</title>
</head>
<body class="site">
  <!--queso-->
   <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="Main.php" class="logo"><b>Gestión</b></a>
            <!--logo -->
            <!--Aquiiioiii-->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right" >
                <li><a class="col" style="color:white !important;"  href="Main.php">Inicio</a></li>
                <li class="dropdown">
                <a href="#" class="btn btn-sm btn-primary" style="color:white !important;">
                 <?php if(file_exists($archivo)){
                 echo '<img src="'.$archivo.'"  height="30px" width="30px" class="special-img img-circle">'; 
                }else{
                  echo '<img src="'.$ruta.'default.png"  height="30px" width="30px" class="special-img img-circle">'; 
                } echo ' '.$_SESSION['User']; ?></a> 
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="profile.html">
                  <?php if(file_exists($archivo)){
                   echo '<img src="'.$archivo.'" width="60" class="img-circle">'; 
                  }else{
                    echo '<img src="'.$ruta.'default.png" width="60" class="img-circle">'; 
                  }
                  ?></a></p>
                  <h5 class="centered">
                    <?php
                       echo $_SESSION['User'];
                    ?>
                  </h5>
                  <h6 style="color: white;" class="centered">
                    <?php
                       echo "Tipo de Usuario: Director";
                    ?>
                  </h6>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Sesion.</span>
                      </a>
                      <ul class="sub">
                          <a  href="Actualizarinformacion.php" ><i class="fa fa-sign-out"></i>Editar datos personales.</a>
                          <a  href="../index.php" ><i class="fa fa-sign-out"></i>Cerrar sesion.</a>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Gestionar Alumno.</span>
                      </a>
                      <ul class="sub">
                          <a  href="#alumnos" data-toggle="tab">General</a>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Gestionar Maestro.</span>
                      </a>
                      <ul class="sub">
                          <a href="#maestros" data-toggle="tab">General</a>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Gestionar Personal de apoyo.</span>
                      </a>
                      <ul class="sub">
                          <a href="#perso" data-toggle="tab">General</a>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Gestionar Documentos Personales.</span>
                      </a>
                      <ul class="sub">
                          <a href="#buscar" data-toggle="tab">Subir</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
  <!--queso-->

  <main class="content">
    <section id="main-content">
      <section class="wrapper">
      <div class="container-fluid">
      <div class="row ">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="tab-content">
              <div class="tab-pane fade in active" id="alumnos" >
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="GestionarAlumnos.php"></iframe>
                </div>
              </div>

              <div class="tab-pane fade" id="maestros" >
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="GestionarMaestros.php"></iframe>
                </div>
              </div>

              <div class="tab-pane fade" id="perso" >
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="GestionarMaterias.php"></iframe>
                </div>
              </div>

              <div class="tab-pane fade" id="buscar" >
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="Buscar.php"></iframe>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    </section>
    </section>
  </main> 
  <div id="Mod" class="modal fade" role="dialog"></div>
  <footer>
    <i class="fa fa-facebook-official f2c-hover-opacity"></i>
      <i class="fa fa-instagram f2c-hover-opacity"></i>
      <i class="fa fa-twitter f2c-hover-opacity"></i>
    <p>Powered by <strong>Dym Corp</p></strong>
  </footer>
</body>
  <script src="../assets/assets1/js/jquery.js"></script>
    <script src="../assets/assets1/js/jjquery-1.8.3.min.js"></script>
    <script src="../assets/assets1/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/assets1/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/assets1/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/assets1/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="../assets/assets1/js/common-scripts.js"></script>

    <!--script for this page-->
    <script type="text/javascript" src="../assets/assets1/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../assets/assets1/js/gritter-conf.js"></script>
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
</html>

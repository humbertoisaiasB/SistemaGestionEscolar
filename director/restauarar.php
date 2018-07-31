<?php include '../php/Conexion.php';
      session_start();
      if(empty($_SESSION['User']) && empty($_SESSION['id'])){ header("Location: ../index.php");}
      $query1 = mysqli_query($con,"select * from usuarios where id_Usuario=".$_SESSION['id']);
      $val = mysqli_fetch_array($query1);
      $ruta='../assets/Profiles/';
      $archivo=$ruta.$_SESSION['id'].'.png';
      ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/Home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <script type="text/javascript" src="../assets/bootstrap/js/jquery-3.1.1.js" ></script>
    <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/css/Mycss.css">
    <title>Restaurar y respaldar</title>
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
        <a class="navbar-brand" style="color:white !important;"  href="Main.php">Find2Chamba</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
        <ul class="nav navbar-nav navbar-right ">
          <li><a class="col" style="color:white !important;"  href="Main.php">Inicio</a></li>
          <li class="dropdown">
          <a href="#" class="col dropdown-toggle" style="color:white !important;"  data-toggle="dropdown">
           <?php if(file_exists($archivo)){
           echo '<img src="'.$archivo.'"  height="30px" width="30px" class="special-img img-circle">'; 
          }else{
            echo '<img src="'.$ruta.'default.png"  height="30px" width="30px" class="special-img img-circle">'; 
          } echo ' '.$_SESSION['User']; ?><b class="caret"></b></a>
          <ul class="dropdown-menu">
              <li><a   href="#"><i class="fa fa-cog"></i> Mi cuenta</a></li>
              <li class="divider"></li>
              <li><a  href="../index.php"><i class="fa fa-sign-out"></i>Sign-out</a></li>
          </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  </header>
  <main class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 col-sm-3">
          <div class="row">
            <div class="col-md-12">
              <a href="#save" class="thumbnail" data-toggle="tab">
                <img src="../assets/images/guarda.png" alt="..." height="100px" width="100px">
                <h3 align="center">Realizar una copia de seguridad</h3>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <a href="#up" class="thumbnail" data-toggle="tab">
                <img src="../assets/images/restaurar1.png" alt="..." height="100px" width="100px">
                <h3 align="center">Restaurar una copia de seguridad</h3>
              </a>
            </div>
          </div>
        </div>

        <div class="col-md-9 col-sm-9">
          <div class="tab-content">
              <div class="tab-pane fade in active" id="tabla" >
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="tabla.php?"></iframe>
                </div>
              </div>

              <div class="tab-pane fade" id="up" >
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="up.php"></iframe>
                </div>
              </div>

              <div class="tab-pane fade" id="save" >
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="save.php"></iframe>
                </div>
              </div>
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
    function MostrarModalRestaurar(param){
      var datos='info='+param;
        $.ajax({
          type:'post',
          url:'../php/modalConsultarestaura.php',
          data:datos,
          success:function(resp){
            $('#Mod').html(resp);
          }
        });
        return false;
    }
  </script>
  </body>

</html>


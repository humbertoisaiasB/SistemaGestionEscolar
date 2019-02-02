<?php include '../php/Conexion.php';
      session_start();
      $datosR = array(
        array("", "", "", ""),
        array("", "", "", ""),
        array("", "", "", ""),
        array("", "", "", "")
      );
      if(empty($_SESSION['User']) && empty($_SESSION['id'])){ header("Location: ../index.php");}
      $query1 = mysqli_query($con,"select * from usuarios u inner join maestros m on(u.id_Usuario=m.id_Usuario) where m.id_Usuario=u.id_Usuario and u.id_Usuario=".$_SESSION['id']);
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
    <link href="../assets/assets1/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/assets1/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/assets1/js/gritter/css/jquery.gritter.css" />
        
    <!-- Custom styles for this template -->
    <link href="../assets/assets1/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="../assets/JS/sweetalert.js"></script>
    <link href="../assets/assets1/css/style-responsive.css" rel="stylesheet">
    <title>Actualizar información del usuario</title>

     <style media="screen">
     .vcenter {
       display: inline-block;
       vertical-align: middle;
       float: none;
     }
   		span{
   			margin-top:8px;
   		}

     </style>
  </head>
  <body class="site">
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
                       echo "Tipo de Usuario: Maestro";
                    ?>
                  </h6>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Sesión.</span>
                      </a>
                      <ul class="sub">
                          <li>
                            <a  href="../index.php" ><i class="fa fa-sign-out"></i>Cerrar sesión.</a>
                          </li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Editar información General.</span>
                      </a>
                      <ul class="sub">
                          <a  href="#info" data-toggle="tab">Información en General.</a>
                          <a  href="#direccion" data-toggle="tab">Dirección</a>
                          <a  href="#password" data-toggle="tab">Contraseña</a>
                          <a  href="#Datos" data-toggle="tab">Datos Escolares</a>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Volver a menú principal.</span>
                      </a>
                      <ul class="sub">
                          <a target="_top" href="Main.php#alumnos">Ir</a>
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
<div class="row">
<div class="col-md-12">
  <div class="row">
    <div class="col-md-10">
      <div class="tab-content">

        <div class="tab-pane fade in active" id="info">
          <form action="../php/UpdateTotal.php" method="POST" role="form">
          <div class="col-md-8 col-md-offset-1 registro1 well">
            <h3 align="center">Información del usuario</h3>
            <div id="div_NomMaestro">
              <label>Nombre:</label><input id="txt_NomMaestro" onkeypress="return validarXD(alphaxd,this.value.length,20);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'NomMaestro',this.value);NomValid(this);"  type="text" class="form-control" name="txt_NomMaestro" value="<?php echo $val['Nom']; ?>"><span id="span_NomMaestro" ></span>
            </div>
            <div id="div_ApMaestro">
              <label>Apellido paterno:</label><input id="txt_ApMaestro" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'ApMaestro',this.value);NomValid(this);" type="text" class="form-control"  name="txt_ApMaestro" value="<?php echo $val['Ap']; ?>"><span id="span_ApMaestro" ></span>
            </div>
            <div id="div_AmMaestro">
              <label>Apellido materno:</label><input id="txt_Am" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'Am',this.value);NomValid(this);" type="text" class="form-control" name="txt_Am" value="<?php echo $val['Am']; ?>"><span id="span_Am" ></span>
            </div>
            <div id="div_TelcasaMaestro" >
              <label>Teléfono casa: </label><input input id="txt_TelcasaMaestro" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^[0-9]{8,10}$/,'TelcasaMaestro',this.value);" type="text" class="form-control" name="txt_TelcasaMaestro" value="<?php echo $val['Casa']; ?>"><span id="span_TelcasaMaestro" ></span>
            </div>
            <div id="div_TelcelularMaestro">
              <label>Teléfono celular:</label><input input id="txt_TelcelularMaestro"  onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/,'TelcelularMaestro',this.value);" type="text" class="form-control" name="txt_TelcelularMaestro" value="<?php echo $val['Celular']; ?>"><span id="span_TelcelularMaestro" ></span>
            </div>
            <div id="div_CorreoMaestro">
              <label>Correo:</label><input id="txt_CorreoMaestro" onkeypress="return validarXD(helo,this.value.length,30);" onkeyup="validacion4all(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/,'CorreoMaestro',this.value);" type="email" class="form-control" name="txt_CorreoMaestro" value="<?php echo $val['Correo']; ?>" required><span id="span_CorreoMaestro" ></span>
            </div>
            <div id="div_CurpMaestro">
                              <label>CURP del Maestro:</label><input id="txt_CurpMaestro" onkeyup="validacion4all(/[A-Za-z]{4}[0-9]{6}[Hh,Mm][A-Za-z]{5}[A-Z0-9]{2}/,'CurpMaestro',this.value); return validaCurpE(this.value,'Maestro','#div_CurpRepetidaM');" onkeypress="return validateCurp(this.value.length);" style="text-transform: uppercase" type="text" class="form-control" name="txt_CurpMaestro" value="<?php echo $val['curpMaestro']; ?>"><span id="span_CurpMaestro" ></span>
                            </div>
                            <div id="div_CurpRepetidaM"></div>
            <br>
            <p align="center"><input type="submit" class="btn btn-success" value="Actualizar" name="btn_MaestroInfo"></p>
          </div>
          </form>
          <div class="col-md-2">
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

          </div>
        </div>
        <div class="tab-pane fade" id="direccion">
        <form action="../php/UpdateTotal.php" method="POST">
          <div class="col-md-8 col-md-offset-1 registro1 well">
            <h3 align="center">Dirección</h3>
            <div id="div_CPMaestro">
              <label>Código Postal:</label><input id="txt_CPMaestro" onkeypress="return validarXD(numeric,this.value.length,5);" onkeyup="validacion4all(/^\d{4,5}$/,'CPCanMaestro',this.value); return codigoEmp('../php/PostalEmp.php','txt_CPMaestro','#codigop');"  type="text" class="form-control" name="txt_CPMaestro" value="<?php echo $val['Codigo_Postal']; ?>"><span id="span_CPMaestro" ></span>
            </div>
            <div id="codigopMaestro">
                <label for="Sl_PaisMaestro">País:</label>
                <select class="form-control" name="Sl_PaisMaestro" >
                <option>México</option>  </select>
                <label for="Sl_EstadoMaestro">Estado:</label>
                <select class="form-control" name="Sl_EstadoMaestro" >
                <option> <?php echo utf8_encode($val['Estado']); ?></option>
                </select>
                <label for="Sl_CiudadMaestro">Ciudad:</label>
                <select class="form-control" name="Sl_CiudadMaestro" >
                <option><?php echo $val['Ciudad']; ?></option>
                </select>
                <label for="Sl_ColoniaMaestro">Colonia/Fraccionamiento:</label>
                <select class="form-control" name="Sl_ColoniaMaestro">
                <option><?php echo $val['Colonia']; ?></option>
                </select>
            </div>
              <div id="div_CalleMaestro">
                <label>Calle:</label><input id="txt_CalleMaestro" onkeyup="validacion4all(/[0-9a-zA-Z]{5,}/,'CalleMaestro',this.value);NomValid(this);NomValid(this);" type="text" class="form-control" name="txt_CalleMaestro" value="<?php echo $val['Calle']; ?>" required><span id="span_CalleMaestro" ></span>
              </div>
            <br>
            <p align="center"><input type="submit" class="btn btn-success" value="Actualizar" name="btn_Maestroireccion"></p>
          </div>
          </form>
        </div>
        <div class="tab-pane fade" id="password">
           <form action="../php/UpdateTotal.php" method="POST" role="form">
            <div class="col-md-8 col-md-offset-1 registro1 well">
              <h3 align="center">Contraseña</h3>
              <div id="div_PswMaestro">
                <label>Contraseña:</label><input id="txt_PswMaestro" type="password" class="form-control" name="txt_PswMaestro"><span id="span_PswMaestro" ></span>
              </div>
              <div id="div_Psw2Maestro">
                <label>Repite Contraseña:</label><input id="txt_Psw2Maestro" onkeyup="checkPwCan(this.value);" onblur="checkPwCan(this.value);" type="password" class="form-control" name="txt_Psw2Maestro"><br><span id="span_Psw2Maestro" ></span>
              </div>
              <p align="center"><input type="submit" class="btn btn-success" value="Actualizar" name="btn_MaestroPw"></p>
            </div>
            </form>
        </div>
        <div class="tab-pane fade" id="Datos">
          <?php
              if(isset($val['todo'])){
                $numero = strlen($val['todo']);
                $variable = $val['todo'];
                $variable1 = "";
                $auxPalabras = "";
                $cont = 0;
                $cont1 = 0;
                for($i=0; $i < $numero; $i++){
                  if($variable[$i] == "*"){
                    $contenidoDetodo[$cont]=$auxPalabras;
                    $cont++;
                    $auxPalabras = "";
                  }else{
                      $auxPalabras = $auxPalabras."".$variable[$i];
                    } 
                }
                $auxPalabras = "";
                for($i=0; $i < $cont; $i++){ 
                  $variable1 = $contenidoDetodo[$i];
                  for($j=0; $j<strlen($contenidoDetodo[$i]); $j++){ 
                    if($variable1[$j] == "|"){
                      $datosR[$i][$cont1] = $auxPalabras;
                      $cont1++;
                      $auxPalabras = "";
                    }else{
                      $auxPalabras = $auxPalabras."".$variable1[$j];
                    } 
                  }
                  $cont1 =0;
                  $variable1 = "";
                }
                //Aqui ya con datos el arreglo datosR
                //esto mostrara a todos sus alumnos
                //Recordando que modalidad|clave|grado|grupo
                for($i=0; $i<$cont; $i++){ 
                  $clave = $datosR[$i][1];
                  $grado = $datosR[$i][2];
                  $grupo = $datosR[$i][3];
                  echo "usted esta aqui en el intituto con la clave: ".$clave." y impartiendo en el grado: ".$grado."° y el grupo: ".$grupo."\n";
                  echo '<button class="btn btn-primary" onclick="return mensajeBorra('.'"'.$clave.'"'.','.'"'.$val['todo'].'"'.');"></button>';
                }
              }else{
                echo "Orale no entra al primerooo";
              }
            ?>
           <div align="center" class="panel panel-primary">
              <div class="panel-heading">Usted actualmente está registrado en: <?php echo $val['nombreEscuela'] ?></div>
           <div class="panel-body">

                  <label style="margin: 5px;">Clave de la escuela residente: </label><span style="margin:10px;font-size: 15px;" class="label label-info"><?php echo $val['clave'];?></span>
                  <label style="margin: 5px;">Escuela: </label><span style="margin:10px;font-size: 15px;" class="label label-info"><?php echo $val['nombreEscuela'];?></span>
                  <label style="margin: 5px;">Zona: </label><span style="margin:10px;font-size: 15px;" class="label label-info"><?php echo $val['ZonaEscolar'];?></span>
                  <div style="display:block;margin:10px;">
                    <div id="div_CambioZona"style="display: inline-block;margin: 20px;">
                      <form action="../php/UpdateTotal.php" method="POST" role="form">
                        <div class="col-md-8 col-md-offset-1 well">
                          <h3 align="center">Seleciona si desea cambiar datos.</h3>
                          <label for="cambioZona">Zona Escolar:</label>
                        <select class="form-control" onchange="return selecion('queso','Maestro','#escuelas');" name="cambioZona" id="cambioZona">
                          <option value="nada">Seleciona</option>
                                  <?php  
                                    for ($i=1; $i<=56; $i++) { 
                                      echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                  ?>
                        </select>
                    </div>
                  </div>
                  <div id="claveM" style="display: inline-flex; margin-bottom: 3px; margin: 5px;">
    <label style="margin: 5px;" id="clavecitaCM"></label><span style="margin:10px;font-size: 15px;" id="prueba13M" name="prueba13M" class="label label-info"></span><input type="hidden" id="prueba13EM" name="prueba13EM" value="">
                            </div>
                  <div id="escuelas">
              
                  </div>
                          <p align="center"><input type="submit" class="btn btn-success" value="Actualizar" name="btn_AlumnoDatos"></p>
                        </div>
                      </form>
                </div>
            </div>
        </div>
      </div>
    </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
 </section>
 </section>
    </main>
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

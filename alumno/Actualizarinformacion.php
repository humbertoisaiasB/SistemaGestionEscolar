<?php include '../php/Conexion.php';
      session_start();
      if(empty($_SESSION['User']) && empty($_SESSION['id'])){ header("Location: ../index.php");}
      $query1 = mysqli_query($con,"select * from alumnos a ,usuarios u where a.id_Usuario=u.id_Usuario and u.id_Usuario=".$_SESSION['id']);
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
  		 	<link rel="stylesheet" href="../assets/css/Mycss.css">
        <script type="text/javascript" src="../assets/bootstrap/js/jquery-3.1.1.js" ></script>
        <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/JS/CandidatoVal.js"></script>
        <script type="text/javascript" src="../assets/JS/MyJS.js"></script>

    <title>Actualizar informacion del alumno</title>

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
        <a class="navbar-brand" style="color:white !important;"  href="Main.php">Gestion</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">

        </ul>
        <ul class="nav navbar-nav navbar-right ">
          <li><a class="col" style="color:white !important;"  href="Main.php">Inicio</a></li>
          <li class="dropdown">
          <a href="#" class="col dropdown-toggle" style="color:white !important;"  data-toggle="dropdown">
          <?php if(file_exists($archivo)){
           echo '<img src="'.$archivo.'"  height="30px" width="30px" class="special-img img-circle">';
          }else{
            echo '<img src="'.$ruta.'default.png"  height="30px" width="30px" class="special-img img-circle">';
          }
           echo '  '.$_SESSION['User']; ?> <b class="caret"></b></a>
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
<div class="col-md-12">
  <div class="row">
    <div class="col-md-2">
        <div class="list-group">
         <a  class="list-group-item active">Actualizar</a>
        <div class="list-group-item">
        <i class="fa fa-info"></i><a href="#info" data-toggle="tab"> Información general</a>
        </div>
        <div class="list-group-item">
        <i class="fa fa-compass"></i><a href="#direccion" data-toggle="tab"> Dirección</a>
        </div>
        <div class="list-group-item">
          <i class="fa fa-unlock"></i><a href="#password" data-toggle="tab"> Contraseña</a>
        </div>
      </div>
    </div>
    <div class="col-md-10">
      <div class="tab-content">

        <div class="tab-pane fade in active" id="info">
          <form action="../php/UpdateCandidato.php" method="POST" role="form">
          <div class="col-md-8 col-md-offset-1 well">
            <h3 align="center">Informacion del alumno</h3>
            <div id="div_NomCandidato">
              <label>Nombre:</label><input id="txt_NomCandidato" onkeypress="return validarXD(alphaxd,this.value.length,20);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'NomCandidato',this.value);NomValid(this);"  type="text" class="form-control" name="txt_Nom" value="<?php echo $val['Nom']; ?>"><span id="span_NomCandidato" ></span>
            </div>
            <div id="div_Ap">
              <label>Apellido paterno:</label><input id="txt_Ap" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'Ap',this.value);NomValid(this);" type="text" class="form-control"  name="txt_Ap" value="<?php echo $val['Ap']; ?>"><span id="span_Ap" ></span>
            </div>
            <div id="div_Am">
              <label>Apellido materno:</label><input id="txt_Am" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'Am',this.value);NomValid(this);" type="text" class="form-control" name="txt_Am" value="<?php echo $val['Am']; ?>"><span id="span_Am" ></span>
            </div>
            <div id="div_Telcasa" >
              <label>Teléfono casa: </label><input input id="txt_Telcasa" onkeypress="return validarXD(numeric,this.value.length,8);" onkeyup="validacion4all(/^[0-9]{6,8}$/,'Telcasa',this.value);" type="text" class="form-control" name="txt_Telcasa" value="<?php echo $val['Casa']; ?>"><span id="span_Telcasa" ></span>
            </div>
            <div id="div_Telcelular">
              <label>Teléfono celular:</label><input input id="txt_Telcelular"  onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/,'Telcelular',this.value);" type="text" class="form-control" name="txt_Telcelular" value="<?php echo $val['Celular']; ?>"><span id="span_Telcelular" ></span>
            </div>
            <div id="div_CorreoCandidato">
              <label>Correo:</label><input id="txt_Correo" onkeypress="return validarXD(helo,this.value.length,30);" onkeyup="validacion4all(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/,'CorreoCandidato',this.value);" type="email" class="form-control" name="txt_Correo" value="<?php echo $val['Correo']; ?>" required><span id="span_CorreoCandidato" ></span>
            </div>
            <div id="div_Curp">
                <label>Curp:</label><input id="txt_Curp" onkeyup="validacion4all(/[A-Za-z]{4}[0-9]{6}[Hh,Mm][A-Za-z]{5}[0-9]{2}/,'Curp',this.value);" onkeypress="return validateCurp(this.value.length);" style="text-transform: uppercase" type="text" class="form-control" name="txt_Curp" value="<?php echo $val['Curp']; ?>" required><span id="span_Curp" ></span>
              </div>
            <label for="Sl_Estudio">Nivel de estudio:</label>
              <select class="form-control" name="Sl_Estudio">
              <?php if ($val['Nivel_estudio']=="Secundaria"){
                  echo '
                  <option>Secundaria</option>
                  <option>Bachillerato</option>
                  <option>Licenciatura</option>
                  <option>Postgrado</option>
                  ';
                }else if($val['Nivel_estudio']=="Bachillerato"){
                  echo '
                  <option>Bachillerato</option>
                  <option>Secundaria</option>
                  <option>Licenciatura</option>
                  <option>Postgrado</option>
                  ';
                }else if($val['Nivel_estudio']=="Licenciatura"){
                  echo '
                  <option>Licenciatura</option>
                  <option>Secundaria</option>
                  <option>Bachillerato</option>
                  <option>Postgrado</option>
                  ';
                }else{
                  echo '
                  <option>Postgrado</option>
                  <option>Secundaria</option>
                  <option>Bachillerato</option>
                  <option>Licenciatura</option>';
                }
                 ?>

              </select>
            <br>
            <p align="center"><input type="submit" class="btn btn-success" value="Actualizar" name="btn_CandidatoInfo"></p>
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
        <form action="../php/UpdateCandidato.php" method="POST">
          <div class="col-md-8 col-md-offset-1 well">
            <h3 align="center">Dirección</h3>
            <div id="div_CPCan">
              <label>Código Postal:</label><input id="txt_CP" onkeypress="return validarXD(numeric,this.value.length,5);" onkeyup="validacion4all(/^\d{4,5}$/,'CPCan',this.value); return codigoEmp('../php/PostalEmp.php','txt_CP','#codigop');"  type="text" class="form-control" name="txt_CP" value="<?php echo $val['Codigo_Postal']; ?>"><span id="span_CPCan" ></span>
            </div>
            <div id="codigop">
                <label for="Sl_Pais">País:</label>
                <select class="form-control" name="Sl_Pais" >
                <option>México</option>  </select>
                <label for="Sl_Estado">Estado:</label>
                <select class="form-control" name="Sl_Estado" >
                <option> <?php echo utf8_encode($val['Estado']); ?></option>
                </select>
                <label for="Sl_Ciudad">Ciudad:</label>
                <select class="form-control" name="Sl_Ciudad" >
                <option><?php echo $val['Ciudad']; ?></option>
                </select>
                <label for="Sl_Colonia">Colonia/Fraccionamiento:</label>
                <select class="form-control" name="Sl_Colonia">
                <option><?php echo $val['Colonia']; ?></option>
                </select>
            </div>
              <div id="div_CalleCan">
                <label>Calle:</label><input id="txt_CalleCan" onkeyup="validacion4all(/[0-9a-zA-Z]{5,}/,'CalleCan',this.value);NomValid(this);NomValid(this);" type="text" class="form-control" name="txt_Calle" value="<?php echo $val['Calle']; ?>" required><span id="span_CalleCan" ></span>
              </div>
            <br>
            <p align="center"><input type="submit" class="btn btn-success" value="Actualizar" name="btn_CandidatoDireccion"></p>
          </div>
          </form>
        </div>
          <div class="tab-pane fade" id="password">
           <form action="../php/UpdateCandidato.php" method="POST" role="form">
            <div class="col-md-8 col-md-offset-1 well">
              <h3 align="center">Contraseña</h3>
              <div id="div_PswCan">
                <label>Contraseña:</label><input id="txt_PswCan" type="password" class="form-control" name="txt_Psw"><span id="span_Psw" ></span>
              </div>
              <div id="div_Psw2Can">
                <label>Repite Contraseña:</label><input id="txt_Psw2Can" onkeyup="checkPwCan(this.value);" onblur="checkPwCan(this.value);" type="password" class="form-control" name="txt_Psw2"><br><span id="span_Psw2Can" ></span>
              </div>
              <p align="center"><input type="submit" class="btn btn-success" value="Actualizar" name="btn_CandidatoPw"></p>
            </div>
            </form>
          </div>
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

  </body>
</html>
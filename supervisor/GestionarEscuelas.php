<?php
  include "../php/Conexion.php";
  session_start(); 
  if(empty($_SESSION['User']) && empty($_SESSION['id'])){ 
  header("Location: ../index.php");}
  $ruta='../assets/Profiles/';
      $archivo=$ruta.$_SESSION['id'].'.png';
      $query1 = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Documento, u.claveEscuela, z.ZonaEscolar FROM usuarios AS u INNER JOIN zona AS z ON (z.clave=u.claveEscuela)WHERE u.id_Usuario=".$_SESSION['id']."");
      $val = mysqli_fetch_array($query1);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/Home.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="../assets/css/Mycss.css">
  <script type="text/javascript" src="../assets/bootstrap/js/jquery-3.1.1.js" ></script>
  <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../assets/JS/EmpleadorVal.js"></script>
  <script type="text/javascript" src="../assets/JS/EmpleadorUpdate.js"></script>
  <script type="text/javascript" src="../assets/JS/MyJS.js"></script>
  <script type="text/javascript" src="../assets/JS/sweetalert.js"></script>

</head>
<?php
  $variable = "'".$val['claveEscuela']."'";
  $zona = $val['ZonaEscolar'];
?>
<body class="site" onload="return escuelas(<?php echo $variable;?>,<?php echo $zona;?>,'#dataT','Escuelas','');">
  <main class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <ul class="nav nav-tabs">
              <li role="presentation" class="active" onclick="return escuelas(<?php echo $variable;?>,<?php echo $zona;?>,'#dataT','Escuelas','');"> <a href="#Consultar" data-toggle="tab"><img src="../assets/images/Consultar.png"  height="30px" width="30px" >  Consultar</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
              <div class="tab-content"> 
                <br>
                <div class="tab-pane fade in active" id="Consultar">
                      <div class="col-sm-12 registro1 well">
                        <h1>Consultar escuelas</h1>
                          <div class="input-group">
                            <input type="text" id="myBuscador" onkeyup="return escuelas(<?php echo $variable;?>,<?php echo $zona;?>,'#dataT','Escuelas',this.value);" class="form-control"  placeholder="Buscar por el nombre">
                            <div class="input-group-btn">
                              <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle"
                                        data-toggle="dropdown">
                                        Filtros<span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',1,'todos',<?php echo $variable;?>);">Escuelas.</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',1,'A',<?php echo $variable;?>);">Directores</a></li>
                                </ul>
                              </div>
                            </div>
                        </div><br><br>
                        <div id="dataT">
                          
                        </div>
                       
                      </div>
                </div>
              
              </div>
            </div> 
        </div>    
      </div>
  </main>
  <div id="Mod" class="modal fade" role="dialog"></div>
</body>

</html>



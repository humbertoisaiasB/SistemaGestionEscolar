<?php
  include '../php/Conexion.php';
      session_start();
      if(empty($_SESSION['User']) && empty($_SESSION['id'])){ header("Location: ../index.php");}
      $query1 = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.claveEscuela, a.id_Alumno, a.curpAlumno, u.Documento FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.id_Usuario=".$_SESSION['id']." && u.id_Usuario=a.id_Usuario");
      $val = mysqli_fetch_array($query1);
      $ruta='../assets/Profiles/';
      $archivo=$ruta.$_SESSION['id'].'.png';
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
  <script type="text/javascript" src="../assets/JS/MyJS.js"></script>
  <script type="text/javascript" src="../assets/JS/sweetalert.js"></script>

</head>
<?php
  $variable = "'".$val['claveEscuela']."'";
  $variable = $val['id_Usuario'];
  $curp = "'".$val['curpAlumno']."'";
  $nombre = $val['Nom'].' '.$val['Ap'].' '.$val['Am'] ;
  $DocumentosR = $val['Documento'];
  $DocumentosR = 4-$DocumentosR;
?>
<body class="site" onload="return actualizarTabla('Español',<?php echo $curp;?>,'#tablaEspañol');">
  <main class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-7">
            <ul class="nav nav-tabs">
              <li role="presentation" class="active" onclick="return actualizarTabla('Español',<?php echo $curp;?>,'#tablaEspañol');"> <a href="#Español" data-toggle="tab"><img src="../assets/images/materias/español.png"  height="30px" width="30px" >  Español</a></li>
              <li role="presentation" onclick="return actualizarTabla('Matematicas',<?php echo $curp;?>,'#tablaMatematicas');"> <a href="#Matematicas" data-toggle="tab"><img src="../assets/images/materias/matematicas.png"  height="30px" width="30px" >  Matemáticas</a></li>
              <li role="presentation" onclick="return actualizarTabla('Ciencias',<?php echo $curp;?>,'#tablaCiencias');"> <a href="#Ciencias" data-toggle="tab"><img src="../assets/images/materias/ciencias.png"  height="30px" width="30px" >  Ciencias</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
              <div class="tab-content"> 
                <br>
                <div class="tab-pane fade in active" id="Español">
                      <div class="col-sm-12 registro1 well">
                        <div class="panel panel-info">
                          <!-- Default panel contents -->
                          <div class="panel-heading">Español: </div>
                          <div class="panel-body">
                            <div class="page-header">
                              <h1>¡Bienvenido! <small>¡Sube toda las evidencias!</small></h1>
                            </div>

                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>¡Atención!</strong> Subir las evidencias que te indique el maestro.
                            </div>
                            <a ></a>
                            <div class="input-group">
                              <input type="text" id="nombreEvidencia" class="form-control" placeholder="Presiona el botón para agregar más evidencias!" disabled>
                              <span class="input-group-btn">
                                <!-- aqui esta sube evidencias return subirEvidencias(<?php echo $variable;?>,'Español'); -->
                                <button class="btn btn-default" type="button" onclick="return menuAgregarEvidencias('#menuAgregarEspañol',<?php echo $variable;?>,'Español');"> ¡Agregar más!</button>
                              </span>
                            </div><!-- /input-group -->
                            <!-- Aqui ponemos los -->
                            <div id="menuAgregarEspañol">
                              
                            </div>
                          </div>  
                          <div class="panel-footer">
                            <div class="panel panel-success">
                              <div class="panel-heading">
                                 <h4>¡Total de evidencias! <small>.Visualización de todas las evidencias subidas hasta el momento.</small></h4>
                              </div>
                              <div class="panel-body">
                                <div class="page-header">
                                  <div class="input-group">
                                    <h5>Listado de evidencias.<small>Se muestran todas las evidencias subidas hasta el momento.</small><button class="btn btn-info" onclick="return actualizarTabla('Español',<?php echo $curp;?>,'#tablaEspañol')"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar tabla</button></h5>
                                    
                                  </div>
                                  <div id="tablaEspañol">
                                  
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>                     
                      </div>
                    </div>
              </div>
                <div class="tab-pane fade" id="Matematicas">
                      <div class="col-sm-12 registro1 well">
                        <div class="panel panel-info">
                          <!-- Default panel contents -->
                          <div class="panel-heading">Matemáticas: </div>
                          <div class="panel-body">
                            <div class="page-header">
                              <h1>¡Bienvenido! <small>¡Sube todas las evidencias!</small></h1>
                            </div>

                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>¡Atención!</strong> Subir las evidencias que te indique el maestro.
                            </div>
                            <a ></a>
                            <div class="input-group">
                              <input type="text" id="nombreEvidencia" class="form-control" placeholder="Presiona el botón para agregar más evidencias!" disabled>
                              <span class="input-group-btn">
                                <!-- aqui esta sube evidencias return subirEvidencias(<?php echo $variable;?>,'Español'); -->
                                <button class="btn btn-default" type="button" onclick="return menuAgregarEvidencias('#menuAgregarMatematicas',<?php echo $variable;?>,'Matematicas');"> ¡Agregar más!</button>
                              </span>
                            </div><!-- /input-group -->
                            <!-- Aqui ponemos los -->
                            <div id="menuAgregarMatematicas">
                              
                            </div>
                          </div>  
                          <div class="panel-footer">
                            <div class="panel panel-success">
                              <div class="panel-heading">
                                 <h4>¡Total de evidencias! <small>.Visualización de todas las evidencias subidas hasta el momento.</small></h4>
                              </div>
                              <div class="panel-body">
                                <div class="page-header">
                                  <div class="input-group">
                                    <h5>Listado de evidencias.<small>Se muestran todas las evidencias subidas hasta el momento.</small><button class="btn btn-info" onclick="return actualizarTabla('Matematicas',<?php echo $curp;?>,'#tablaMatematicas')"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar tabla</button></h5>
                                    
                                  </div>
                                  <div id="tablaMatematicas">
                                  
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>                     
                      </div>
                      </div>
                </div>
                <div class="tab-pane fade" id="Ciencias">
                  <div class="col-sm-12 registro1 well">
                    <div class="panel panel-info">
                          <!-- Default panel contents -->
                          <div class="panel-heading">Ciencias: </div>
                          <div class="panel-body">
                            <div class="page-header">
                              <h1>¡Bienvenido! <small>¡Sube todas las evidencias!</small></h1>
                            </div>

                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>¡Atención!</strong> Subir las evidencias que te indique el maestro.
                            </div>
                            <a ></a>
                            <div class="input-group">
                              <input type="text" id="nombreEvidencia" class="form-control" placeholder="Presiona el botón para agregar más evidencias!" disabled>
                              <span class="input-group-btn">
                                <!-- aqui esta sube evidencias return subirEvidencias(<?php echo $variable;?>,'Español'); -->
                                <button class="btn btn-default" type="button" onclick="return menuAgregarEvidencias('#menuAgregarCiencias',<?php echo $variable;?>,'Ciencias');"> ¡Agregar más!</button>
                              </span>
                            </div><!-- /input-group -->
                            <!-- Aqui ponemos los -->
                            <div id="menuAgregarCiencias">
                              
                            </div>
                          </div>  
                          <div class="panel-footer">
                            <div class="panel panel-success">
                              <div class="panel-heading">
                                 <h4>¡Total de evidencias! <small>.Visualización de todas las evidencias subidas hasta el momento.</small></h4>
                              </div>
                              <div class="panel-body">
                                <div class="page-header">
                                  <div class="input-group">
                                    <h5>Listado de evidencias.<small>Se muestran todas las evidencias subidas hasta el momento.</small><button class="btn btn-info" onclick="return actualizarTabla('Ciencias',<?php echo $curp;?>,'#tablaCiencias')"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar tabla</button></h5>
                                    
                                  </div>
                                  <div id="tablaCiencias">
                                  
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>                     
                      </div>
                  </div>
                </div>
                      <div id="ConsA"></div>
                </div>
              </div> 
            </div>    
        </div>
      </div><!-- Container-Fluid -->  
  </main>
  <div id="Mod" class="modal fade" role="dialog"></div>
</body>

</html>



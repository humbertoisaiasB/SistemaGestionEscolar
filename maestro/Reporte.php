<?php 
      include '../php/Conexion.php';
      session_start();
      if(empty($_SESSION['User']) && empty($_SESSION['id'])){ header("Location: ../index.php");}
      $query1 = mysqli_query($con,"select * from usuarios u inner join maestros m on(u.id_Usuario=m.id_Usuario) where m.id_Usuario=u.id_Usuario and u.id_Usuario=".$_SESSION['id']);
      $val = mysqli_fetch_array($query1);
      $ruta='../assets/Profiles/';
      $archivo=$ruta.$_SESSION['id'].'.png';
      $todo = "'".$val['todo']."'";
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
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <ul class="nav nav-tabs">
              <li role="presentation" class="active" onclick="return alumnosV('','Alumno','Consulta',<?php echo $Grado;?>,<?php echo $Grupo;?>,<?php echo $variable;?>,'#ConsA2');"> <a href="#Alumno" data-toggle="tab"><img src="../assets/images/Consultar.png"  height="30px" width="30px" >  Alumnos</a></li>
              <li role="presentation" onclick="return alumnosVA('','Alumno','Consulta',<?php echo $Grado;?>,<?php echo $Grupo;?>,<?php echo $variable;?>,'#ConsA3',<?php echo $contenedora;?>,'2');"><a href="#Mismo" data-toggle="tab"><img src="../assets/images/Eliminar.png"  height="30px" width="30px" > Mio</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="tab-content"> 
                <br>
                <div class="tab-pane fade in active" id="Alumno">
                      <div class="col-lg-12 col-md-12 col-sm-12 registro1 well">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Informe sobre alumnos.</h3>
                            </div>
                            <div class="panel-body"> 
                              <div class="media">
                                <div class="media-body">
                                  <h4 class="media-heading">Listado de alumnos</h4>
                                </div>
                                <div class="media-left">
                                  <div align="center" class="form-group">
                                    <button class="btn btn-default" type="button" onclick="reporte('listado','Alumno',<?php echo $todo;?>,'<?php echo "Maestro";?>','#modalAlumnoListado');" data-toggle="modal" data-target="#modalAlumnoListado">Elaborar</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                  <h4 class="media-heading">Expediente de los alumnos</h4>
                                </div>
                                <div class="media-left">
                                  <div align="center" class="form-group">
                                    <button class="btn btn-default" type="button" onclick="reporte('expediente','Alumno',<?php echo $todo;?>,'<?php echo "Maestro";?>','#modalAlumnoListado');" data-toggle="modal" data-target="#modalAlumnoListado">Elaborar</button>
                                  </div>
                                </div>
                              </div>
                              <div class="media">
                                <div class="media-body">
                                  <h4 class="media-heading">Estadística inicial</h4>
                                </div>
                                <div class="media-left">
                                   <div align="center" class="form-group">
                                    <button class="btn btn-default" type="button" onclick="reporte('total','Alumno',<?php echo $todo;?>,'<?php echo "Maestro";?>','#modalAlumnoListado');" data-toggle="modal" data-target="#modalAlumnoListado">Elaborar</button>
                                  </div>
                                </div>
                              </div>
                          </div>
                        <div id="ConsA3">
                        </div> 
                      </div>
                </div>
                <div class="tab-pane fade" id="Mismo">
                      <div class="col-lg-12 col-md-12 col-sm-12 registro1 well">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Informe sobre usted.</h3>
                            </div>
                            <div class="panel-body"> 
                              <div class="media">
                                <div class="media-body">
                                  <h4 class="media-heading">Ficha de identificacion</h4>
                                </div>
                                <div class="media-left">
                                  <div align="center" class="form-group">
                                    <button class="btn btn-default" type="button" onclick="reporte('identificacion','Alumno',<?php echo $todo;?>,'<?php echo "Maestro";?>','#modalAlumnoListado');" data-toggle="modal" data-target="#modalAlumnoListado">Elaborar</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                  <h4 class="media-heading">Listado de archivos actuales</h4>
                                </div>
                                <div class="media-left">
                                  <div align="center" class="form-group">
                                    <button class="btn btn-default" type="button" onclick="reporte('listado','Alumno',<?php echo $todo;?>,'<?php echo "Maestro";?>','#modalAlumnoListado');" data-toggle="modal" data-target="#modalAlumnoListado">Elaborar</button>
                                  </div>
                                </div>
                              </div>
                          </div>
                        <div id="ConsA3">
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
  <div id="modalAlumnoListado" class="modal fade" role="dialog"></div> 
  <div id="Mod" class="modal fade" role="dialog"></div>
  <div id="Alert" role="dialog"></div>


	<script type="text/javascript">
	
	</script>

</body>
<!--
-->
</html>

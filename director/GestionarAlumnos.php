<?php
  include "../php/Conexion.php";
  session_start(); 
  if(empty($_SESSION['User']) && empty($_SESSION['id'])){ 
  header("Location: ../index.php");}
  $ruta='../assets/Profiles/';
      $archivo=$ruta.$_SESSION['id'].'.png';
      $query1 = mysqli_query($con,"select id_Usuario,claveEscuela FROM usuarios WHERE id_Usuario=".$_SESSION['id']."");
      $val = mysqli_fetch_array($query1);
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
  <script type="text/javascript" src="../assets/JS/EmpleadorVal.js"></script>
  <script type="text/javascript" src="../assets/JS/EmpleadorUpdate.js"></script>
  <script type="text/javascript" src="../assets/JS/MyJS.js"></script>
  <script type="text/javascript" src="../assets/JS/sweetalert.js"></script>

</head>
<?php
  $variable = "'".$val['claveEscuela']."'";
?>
<body class="site" onload="return CEmpleosAdmin(<?php echo $variable;?>,'','Consultar','Administrador','Alumno','#ConsA2'); return CEmpleosAdmin(<?php echo $variable;?>,'','Eliminar','Administrador','Alumno','#ConsA');">
  <main class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-7">
            <ul class="nav nav-tabs">
              <li role="presentation" class="active" onclick="return alumnosV('','Alumno','Consulta',1,'todos',<?php echo $variable;?>);"> <a href="#Consultar" data-toggle="tab"><img src="../assets/images/Consultar.png"  height="30px" width="30px" >  Consultar</a></li>
              <li role="presentation" onclick="return CEmpleosAdmin(<?php echo $variable;?>,'','Eliminar','Administrador','Alumno','#ConsA');"><a href="#Eliminar" data-toggle="tab"><img src="../assets/images/Eliminar.png"  height="30px" width="30px" > Eliminar</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
              <div class="tab-content"> 
                <br>
                <div class="tab-pane fade in active" id="Consultar">
                      <div class="col-sm-12 busca well">
                        <h1>Consultar Alumno</h1>
                          <div class="input-group">
                            <input type="text" id="myInputA2" class="form-control"  placeholder="Buscar por el nombre">
                            <div class="input-group-btn">
                              <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle"
                                        data-toggle="dropdown">
                                        Alumnos de  1°<span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',1,'todos',<?php echo $variable;?>);">Todos.</a></li>
                                  <li class="divider"></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',1,'A',<?php echo $variable;?>);">A</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',1,'B',<?php echo $variable;?>);">B</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',1,'C',<?php echo $variable;?>);">C</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',1,'D',<?php echo $variable;?>);">D</a></li>
                                </ul>
                              </div>
                              <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle"
                                        data-toggle="dropdown">
                                        Alumnos de 2°<span class="caret"></span>
                                </button>
                               
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',2,'todos',<?php echo $variable;?>);">Todos</a></li>
                                  <li class="divider"></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',2,'A',<?php echo $variable;?>);">A</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',2,'B',<?php echo $variable;?>);">B</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',2,'C',<?php echo $variable;?>);">C</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',2,'D',<?php echo $variable;?>);">D</a></li>
                                </ul>
                              </div>
                              <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle"
                                        data-toggle="dropdown">
                                        Alumnos de 3°<span class="caret"></span>
                                </button>
                               
                                <ul class="dropdown-menu" role="menu">
                                  <a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'',<?php echo $variable;?>);">Todos.</a>
                                  <li class="divider"></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'A',<?php echo $variable;?>);">A</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'B',<?php echo $variable;?>);">B</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'C',<?php echo $variable;?>);">C</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'D',<?php echo $variable;?>);">D</a></li>
                                </ul>
                              </div>
                            </div>
                        </div><br><br>
                        <div id="ConsA2">
                          
                        </div>
                </div>
              </div>
                <div class="tab-pane fade" id="Eliminar">
                      <div class="col-sm-12 busca well">
                        <h1>Eliminar Alumno</h1>
                            <div class="input-group">
                              <input type="text" id="myInputA" class="form-control" onkeyup="return CEmpleosAdmin(<?php echo $variable;?>,this.value,'Eliminar','Administrador','Alumno','#ConsA');" placeholder="Buscar por el nombre">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" ariahaspopup="true" ariaexpanded="false">Filtros<span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                  <li>
                                    <a href="#">Solo usuarios de tipo "Empresa"</a>
                                  </li>
                                  <li>
                                    <a href="#">Solo usuarios de tipo "Empleador"</a>
                                  </li>
                                  <li>
                                    <a href="#">Solo usuarios de tipo "Candidato"</a>
                                  </li>
                                </ul>
                              </div>
                              <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                            </div>
                      </div><br><br>
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



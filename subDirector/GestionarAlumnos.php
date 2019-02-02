<?php
  include "../php/Conexion.php";
  session_start(); 
  if(empty($_SESSION['User']) && empty($_SESSION['id'])){ 
  header("Location: ../index.php");}
  $ruta='../assets/Profiles/';
      $archivo=$ruta.$_SESSION['id'].'.png';

      $query1 = mysqli_query($con,"SELECT u.id_Usuario, u.Nom, u.Ap, u.Am, u.claveEscuela, sb.id_SubDirector,sb.curpSubDirector,sb.todo,z.Modalidad FROM subDirector AS sb INNER JOIN usuarios AS u ON (sb.id_Usuario = u.id_Usuario) INNER JOIN zona AS z ON (u.claveEscuela = z.clave) WHERE sb.id_Usuario = u.id_Usuario and sb.id_Usuario=".$_SESSION['id']."");
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
  $nada = "F";
  $variable = "'".$val['claveEscuela']."'";
  $Grado = 1;
  $Grupo = "'".$nada."'";
  $contenedora = "'".$val['todo']."'";
?>
<body class="site" onload="return alumnosV('','Alumno','Consulta','todos','todos',<?php echo $variable;?>,'#ConsA2');">
  <main class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-7">
            <ul class="nav nav-tabs">
              <li role="presentation" class="active" onclick="return alumnosV('','Alumno','Consulta','todos','todos',<?php echo $variable;?>,'#ConsA2');"> <a href="#Consultar" data-toggle="tab"><img src="../assets/images/Consultar.png"  height="30px" width="30px" >  Consulta general</a></li>
              <?php  
              //Aqui empieza una condicion el corchete empieza aqui y termina mas abajo.
                if($val['Modalidad'] == "Telesecundaria"){

              ?>
              <li role="presentation" onclick="return alumnosVA('','Alumno','Consulta',<?php echo $Grado;?>,<?php echo $Grupo;?>,<?php echo $variable;?>,'#ConsA3',<?php echo $contenedora;?>,'2');"> <a href="#Consultar1" data-toggle="tab"><img src="../assets/images/Consultar.png"  height="30px" width="30px" >  Consulta del grupo</a></li>
              <?php  
                }else{
                  echo "";
                }
              ?>
            </ul>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
              <div class="tab-content"> 
                <br>
                <div class="tab-pane fade in active" id="Consultar">
                      <div class="col-sm-12 registro1 well">
                        <h1>Consultar General</h1>
                          <div class="input-group">
                            <input type="text" id="myInputA2" onkeyup="return alumnosV(this.value,'Alumno','Consulta','todos','todos',<?php echo $variable;?>,'#ConsA2');" class="form-control"  placeholder="Buscar por el nombre">
                            <div class="input-group-btn">
                              <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle"
                                        data-toggle="dropdown">
                                        Alumnos de  1°<span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',1,'todos',<?php echo $variable;?>,'#ConsA2');">Todos.</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',1,'A',<?php echo $variable;?>,'#ConsA2');">A</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',1,'B',<?php echo $variable;?>,'#ConsA2');">B</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',1,'C',<?php echo $variable;?>,'#ConsA2');">C</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',1,'D',<?php echo $variable;?>,'#ConsA2');">D</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',1,'E',<?php echo $variable;?>,'#ConsA2');">E</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',1,'F',<?php echo $variable;?>,'#ConsA2');">F</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',1,'G',<?php echo $variable;?>,'#ConsA2');">G</a></li>
                                </ul>
                              </div>
                              <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle"
                                        data-toggle="dropdown">
                                        Alumnos de 2°<span class="caret"></span>
                                </button>
                               
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',2,'todos',<?php echo $variable;?>,'#ConsA2');">Todos</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',2,'A',<?php echo $variable;?>,'#ConsA2');">A</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',2,'B',<?php echo $variable;?>,'#ConsA2');">B</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',2,'C',<?php echo $variable;?>,'#ConsA2');">C</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',2,'D',<?php echo $variable;?>,'#ConsA2');">D</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',2,'E',<?php echo $variable;?>,'#ConsA2');">E</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',2,'F',<?php echo $variable;?>,'#ConsA2');">F</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',2,'G',<?php echo $variable;?>,'#ConsA2');">G</a></li>
                                </ul>
                              </div>
                              <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle"
                                        data-toggle="dropdown">
                                        Alumnos de 3°<span class="caret"></span>
                                </button>
                               
                                <ul class="dropdown-menu" role="menu">
                                  <a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'todos',<?php echo $variable;?>,'#ConsA2');">Todos.</a>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'A',<?php echo $variable,'#ConsA2';?>);">A</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'B',<?php echo $variable,'#ConsA2';?>);">B</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'C',<?php echo $variable,'#ConsA2';?>);">C</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'D',<?php echo $variable,'#ConsA2';?>);">D</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'E',<?php echo $variable,'#ConsA2';?>);">E</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'F',<?php echo $variable,'#ConsA2';?>);">F</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'G',<?php echo $variable,'#ConsA2';?>);">G</a></li>
                                </ul>
                              </div>
                            </div>
                        </div><br><br>
                        <div id="ConsA2">
                          
                        </div>
                       
                      </div>
              </div>
                <div class="tab-pane fade" id="Consultar1">
                      <div class="col-sm-12 registro1 well">
                        <h1>Consulta del grupo</h1>
                          <div class="input-group">
                            <input type="text" id="myInputA2" onkeyup="return alumnosVA('','Alumno','Consulta',<?php echo $Grado;?>,<?php echo $Grupo;?>,<?php echo $variable;?>,'#ConsA3',<?php echo $contenedora;?>,'2');" class="form-control" aria-describedby="sizing-addon2" placeholder="Buscar por el nombre">
                            <div class="input-group-btn">
                            </div>
                              <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                        </div><br><br>
                        <div id="ConsA3">
                        </div> 
                      </div>
                </div>
                <div class="tab-pane fade" id="Agregar">
                      <div class="row">
                  <div class="col-md-2" align="center"></div>
                    <div class="col-md-11"><br>
                    <div class="registro1" align="center">
                      <div class="panel-body" align="center">
                        <div class="titulo" align="center">
                          <h3>
                            Registro Alumno
                          </h3>
                        </div>
                        <!-- Aqui tenemos que empresa desaparecera y ahora sera alumnos-->
                        <form  action="php/AddAlumno.php" method="POST">
                          <div id="div_NomAlumno">
                            <label>Nombre:</label><input id="txt_NomAlumno" onkeypress="return validarXD(alphaxd,this.value.length,20);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'NomAlumno',this.value);NomValid(this);"  type="text" class="form-control" name="txt_NomAlumno"><span id="span_NomAlumno" ></span>
                          </div>
                          <div id="div_Ap">
                            <label>Apellido paterno:</label><input id="txt_Ap" onkeypress="return validarXD(alphaxd,this.value.length,25);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,25}$/,'Ap',this.value);NomValid(this);" type="text" class="form-control"  name="txt_Ap"><span id="span_Ap" ></span>
                          </div>
                          <div id="div_Am">
                            <label>Apellido materno:</label><input id="txt_Am" onkeypress="return validarXD(alphaxd,this.value.length,25);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,25}$/,'Am',this.value);NomValid(this);" type="text" class="form-control" name="txt_Am"><span id="span_Am" ></span>
                          </div>
                          <div id="div_Curp">
                              <label>CURP del Alumno:</label><input id="txt_Curp" onkeyup="validacion4all(/[A-Za-z]{4}[0-9]{6}[Hh,Mm][A-Za-z]{5}[A-Z0-9]{2}/,'Curp',this.value); return validaCurpE(this.value,'Alumno','#div_CurpRepetida');" onkeypress="return validateCurp(this.value.length);" style="text-transform: uppercase" type="text" class="form-control" name="txt_Curp"><span id="span_Curp" ></span>
                          </div>
                          <div id="div_CurpRepetida" class="row"> 
                          </div>
                              <div id="div_Psw">
                                <label>Contraseña:</label><input id="txt_Psw" type="password" class="form-control" name="txt_Psw" required><span id="span_Psw" ></span>
                              </div>
                              <div id="div_Psw2">
                                <label>Repite Contraseña:</label><input id="txt_Psw2" onkeyup="checkPwCan(this.value);" type="password" class="form-control" name="txt_Psw2" required><br><span id="span_Psw2" ></span>
                              </div>
                              <div id="btn"></div>
                        </form>
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



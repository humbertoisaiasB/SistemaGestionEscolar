<?php
  include "../php/Conexion.php";
  session_start(); 
  if(empty($_SESSION['User']) && empty($_SESSION['id'])){ 
  header("Location: ../index.php");}
  $ruta='../assets/Profiles/';
      $archivo=$ruta.$_SESSION['id'].'.png';
      $variable = "'".$_SESSION['claveE']."'";
      $query1=mysqli_query($con,"select u.id_Usuario, u.Nom, d.id_Director, d.curpDirector, u.Documento FROM usuarios AS u INNER JOIN director AS d ON (d.id_Usuario=u.id_Usuario)WHERE u.claveEscuela=$variable && u.id_Usuario=d.id_Usuario");
      $val1 = (mysqli_fetch_array($query1)==false) ? "no":"si";

  function nombreCadena($largo){
    $chico = "";
    $total = strlen($largo);
    for($i=0; $i<=$total; $i=$i+1){
      if($largo[$i]=="."){
        $chico = substr($largo, 0, $i);
        break;
      }else{
        $chico = "Queso";
      }
    }
    return $chico;
  }
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
<body class="site">
  <main class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <ul class="nav nav-tabs">
              <li role="presentation" class="active"> <a href="#Agregar" data-toggle="tab"><img src="../assets/images/Consultar.png"  height="30px" width="30px" > Director</a></li>
              <li role="presentation" onclick="return alumnosV('','Maestro','Consulta','todos','todos',<?php echo $variable;?>,'#ConsA');"><a href="#Eliminar" data-toggle="tab"><img src="../assets/images/Eliminar.png"  height="30px" width="30px" > Maestros</a></li>
              <li role="presentation" onclick="return alumnosV('','Alumno','Consulta','todos','todos',<?php echo $variable;?>,'#ConsA2');"><a href="#Consultar" data-toggle="tab"><img src="../assets/images/Agregar.png"  height="30px" width="30px" > Alumnos</a></li>
              <li role="presentation" onclick="return alumnosV('','PersonalA','Consulta','todos','todos',<?php echo $variable;?>,'#ConsA3');"><a href="#personal" data-toggle="tab"><img src="../assets/images/Agregar.png"  height="30px" width="30px" > Personal de apoyo</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
              <div class="tab-content"> 
                <br>
                <div class="tab-pane fade" id="personal">
                      <div class="col-sm-12 registro1 well">
                        <h1>Consultar personal de apoyo</h1>
                          <div class="input-group">
                            <input type="text" id="myInputA3" onkeyup="return alumnosV(this.value,'PersonalA','Consulta','todos','todos',<?php echo $variable;?>,'#ConsA3');" class="form-control"  placeholder="Buscar por el nombre">
                            <div class="input-group-btn">
                              <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle"
                                        data-toggle="dropdown">
                                        filtro<span class="caret"></span>
                                </button>
                               
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'A',<?php echo $variable;?>,'#ConsA3');">Intendencia</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'B',<?php echo $variable;?>,'#ConsA3');">Adminitrativo</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'C',<?php echo $variable;?>,'#ConsA3');">...</a></li>
                                </ul>
                              </div>
                            </div>
                        </div><br><br>
                        <div id="ConsA3">
                          
                        </div>
                       
                      </div>
              </div>
                <div class="tab-pane fade" id="Consultar">
                      <div class="col-sm-12 registro1 well">
                        <h1>Consultar Alumno</h1>
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
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'A',<?php echo $variable;?>,'#ConsA2');">A</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'B',<?php echo $variable;?>,'#ConsA2');">B</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'C',<?php echo $variable;?>,'#ConsA2');">C</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'D',<?php echo $variable;?>,'#ConsA2');">D</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'E',<?php echo $variable;?>,'#ConsA2');">E</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'F',<?php echo $variable;?>,'#ConsA2');">F</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Alumno','Consulta',3,'G',<?php echo $variable;?>,'#ConsA2');">G</a></li>
                                </ul>
                              </div>
                            </div>
                        </div><br><br>
                        <div id="ConsA2">
                          
                        </div>
                       
                      </div>
              </div>
                <div class="tab-pane fade" id="Eliminar">
                      <div class="col-sm-12 registro1 well">
                        <h1>Consultar Maestro</h1>
                            <div class="input-group">
                              <input type="text" id="myInputA" class="form-control" onkeyup="return alumnosV(this.value,'Maestro','Consulta','todos','todos',<?php echo $variable;?>,'#ConsA');" placeholder="Buscar por el nombre">
                              <div class="input-group-btn">
                              <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle"
                                        data-toggle="dropdown">
                                        Alumnos de  1°<span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',1,'todos',<?php echo $variable;?>,'#ConsA');">Todos.</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',1,'A',<?php echo $variable;?>,'#ConsA');">A</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',1,'B',<?php echo $variable;?>,'#ConsA');">B</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',1,'C',<?php echo $variable;?>,'#ConsA');">C</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',1,'D',<?php echo $variable;?>,'#ConsA');">D</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',1,'E',<?php echo $variable;?>,'#ConsA');">E</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',1,'F',<?php echo $variable;?>,'#ConsA');">F</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',1,'G',<?php echo $variable;?>,'#ConsA');">G</a></li>
                                </ul>
                              </div>
                              <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle"
                                        data-toggle="dropdown">
                                        Alumnos de 2°<span class="caret"></span>
                                </button>
                               
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',2,'todos',<?php echo $variable;?>,'#ConsA');">Todos</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',2,'A',<?php echo $variable;?>,'#ConsA');">A</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',2,'B',<?php echo $variable;?>,'#ConsA');">B</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',2,'C',<?php echo $variable;?>,'#ConsA');">C</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',2,'D',<?php echo $variable;?>,'#ConsA');">D</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',2,'E',<?php echo $variable;?>,'#ConsA');">E</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',2,'F',<?php echo $variable;?>,'#ConsA');">F</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',2,'G',<?php echo $variable;?>,'#ConsA');">G</a></li>
                                </ul>
                              </div>
                              <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle"
                                        data-toggle="dropdown">
                                        Alumnos de 3°<span class="caret"></span>
                                </button>
                               
                                <ul class="dropdown-menu" role="menu">
                                  <a href="#" onclick="return alumnosV('','Maestro','Consulta',3,'todos',<?php echo $variable;?>,'#ConsA');">Todos.</a>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',3,'A',<?php echo $variable;?>,'#ConsA');">A</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',3,'B',<?php echo $variable;?>,'#ConsA');">B</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',3,'C',<?php echo $variable;?>,'#ConsA');">C</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',3,'D',<?php echo $variable;?>,'#ConsA');">D</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',3,'E',<?php echo $variable;?>,'#ConsA');">E</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',3,'F',<?php echo $variable;?>,'#ConsA');">F</a></li>
                                  <li><a href="#" onclick="return alumnosV('','Maestro','Consulta',3,'G',<?php echo $variable;?>,'#ConsA');">G</a></li>
                                </ul>
                              </div>
                            </div>
                              <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                            </div>
                      </div><br><br>
                      <div id="ConsA"></div>
                </div>
                <div class="tab-pane fade in active" id="Agregar">
                  <div class="col-sm-12 registro1 well">
                    <h1>Consultar al Director</h1>
                    <?php
                    if($val1=="si"){
                      $query2=mysqli_query($con,"select u.id_Usuario, u.Nom, d.id_Director, d.curpDirector, u.Documento FROM usuarios AS u INNER JOIN director AS d ON (d.id_Usuario=u.id_Usuario)WHERE u.claveEscuela=$variable && u.id_Usuario=d.id_Usuario");
                      $val = mysqli_fetch_array($query2);
                    $nombreArchivoC = "";
                    $compara = $val['curpDirector']."_";
                    //
                    $sql=mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, d.id_Director, d.curpDirector, u.Documento FROM usuarios AS u INNER JOIN director AS d ON (d.id_Usuario=u.id_Usuario)WHERE u.id_Usuario=$val[id_Usuario] && u.id_Usuario=d.id_Usuario");
                    $row1 = mysqli_fetch_array($sql);
                    echo "<p><b>Nombre: </b>".$row1['Nom']." ".$row1['Ap']." ".$row1['Am']."</p>";
                    echo "<p><b>CURP: </b>".$row1['curpDirector']."</p>";
                    $nombreArchivoC = "";
                    $compara = $row1['curpDirector']."_";
                    $nombreDocu = array("".$compara."FUP","".$compara."CI","".$compara."CD","".$compara."CURP","".$compara."INEF","".$compara."INED","".$compara."CEL","".$compara."CEM","".$compara."CPLF","".$compara."CPLA","".$compara."CPMF","".$compara."CPMA","".$compara."OB","".$compara."AN","".$compara."TL","".$compara."TM","".$compara."SAT","".$compara."CL","".$compara."AP","".$compara."SA");
                    $nombreArchivos = array("Formato único de personal.","Comprobante de ingresos.","Comprobante de domicilio.","CURP","INE(Frontal)","INE(Detrás)","Certificado estudios licenciatura","Certificado de estudios maestria","Cédula profesional de licenciatura(Frontal)","Cédula profesional de licenciatura(Detrás)","Cédula profesional de maestria(Frontal)","Cédula profesional de maestria(Detrás)","Oficio de basificación.","Acta de nacimiento","Título licenciatura","Título maestria","Alta al SAT(RFC)","Cartilla militar(SMN)","No antecedentes penales.","No sanción administrativa");
                    $aux = array("no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no");
                    $documentos = 20;
                    $aux1 = "f";
                    $aux2 = 0;
                    $cont = 0; 
                    $directorio = opendir("../php/documentos/director/".$row1['curpDirector']."/"); //ruta actual
                    while($archivo = readdir($directorio)){
                      if (!is_dir($archivo)) {
                        $nombreArchivoC = nombreCadena($archivo);
                        $aux[$cont] = $nombreArchivoC;
                        $cont = $cont + 1;
                      }
                    }
                    echo '<h3 align="center">Archivos disponibles para su visualizacion: '.$cont.'</h3>';
                    for($i=0; $i<$documentos; $i++){ 
              for($j=0; $j<$documentos; $j++){
                if($nombreDocu[$i]==$aux[$j]){
                  $aux1=$aux[$j];
                  $caso = "si";
                  echo '<div class="media cambio">
                              <div class="media-left">
                                <a href="#">
                                  <img class="media-object" src="../assets/images/curp.png" height="60px" width="60px">
                                </a>
                              </div>
                              <div align="center" class="media-body">
                                <h4 align="center" class="media-heading">'.$nombreArchivos[$i].'</h4>
                                <button align="center" type="button" class="btn btn-info" onclick="window.open('."'".'../php/documentos/director/'.$row1['curpDirector'].'/'.$nombreDocu[$i].'.pdf'."'".')">Ver '.$nombreArchivos[$i].'</button>
                              </div>
                            </div>';
                }
              }
              if($nombreDocu[$i]!=$aux1){
                $caso = "no";
                              echo  '<div class="media cambioN">
                              <div class="media-left">
                                <a href="#">
                                  <img class="media-object" src="../assets/images/curp.png" height="60px" width="60px">
                                </a>
                              </div>
                              <div align="center" class="media-body">
                                <h4 align="center" class="media-heading">No disponible: '.$nombreArchivos[$i].'</h4>
                              </div>
                         </div>';
              }
              }
             } else{
              echo "<p>Esta institucion no tiene un director registrado</p>";
            }
                    ?> 
                </div>
              </div>
              </div> 
            </div>    
        </div>
      </div><!-- Container-Fluid -->  
  </main>
  <div id="Mod" class="modal fade" role="dialog"></div>
</body>

</html>
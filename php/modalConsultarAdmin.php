<?php
session_start();
include 'Conexion.php';
  $asd = mysqli_query($con,"select Nom,Ap,Am,id_Usuario,Tipo,Pais,Estado,Ciudad,Correo from usuarios where id_Usuario='$_POST[info]'");
  $row = mysqli_fetch_array($asd);
  $sql1 = "";
  $curp = "";
  $aux = array("","","","","","","","","","");
  $directorio = "";
  $totalA = 0;
  $cont = 0;
  $queso1 = "";
  $queso2= "";
  $pestañas = "";
  if($row['Tipo'] == "PersonalA"){
    $pestañas = "display:none;";
  }else{
    $pestañas = "";
  }
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
  <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"  >&times;</button>
              <h4 align="center" class="modal-title"><?php echo "<p>".$row['Nom']." ".$row['Ap']." ".$row['Am']."</p>";?></h4> 
            </div>
            <div class="modal-body" align="center">
              <!-- Aqui agregaremos cosas -->
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-12">
                  <ul class="nav nav-tabs">

                    <li role="presentation" class="active" onclick="return actualizarTabla('Español',<?php echo $curp;?>,'#tablaEspañol');"> <a href="#InfoBasica" data-toggle="tab"><img src="../assets/images/materias/español.png"  height="30px" width="30px" >  Informacion Basica</a></li>
                    <li role="presentation" onclick="return alumnosV('','Alumno','Consulta','todos','todos',<?php echo $variable;?>,'#ConsA2');"> <a href="#Expediente" data-toggle="tab"><img src="../assets/images/materias/matematicas.png"  height="30px" width="30px" >  Expediente del usuario.</a></li>
                    <li role="presentation" style="<?php  echo $pestañas;?>" onclick="return actualizarTabla('Español',<?php echo $curp;?>,'#tablaEspañol');"> <a href="#Evidencias" data-toggle="tab"><img src="../assets/images/materias/ciencias.png"  height="30px" width="30px" > Evidencias subidas</a></li>
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="tab-content"> 
                  <br>
                  <div class="tab-pane fade" id="Evidencias">
                    <div class="col-sm-12 well">
                      <div class="panel panel-primary">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Evidencias: </div>
                          <div class="panel-body">
                            <div class="page-header">
                              <h1>¡Bienvenido! <small>¡Aqui podras consultar todas las evidencias!</small></h1>
                            </div>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>Atencion!</strong> se dara a visualizar las evidencias que hasta el momento este alumno ah subido .
                            </div>
                            <a ></a>
                            <!-- Aqui ponemos los -->
                            <div id="menuAgregar">
                              
                            </div>
                          </div>  
                          <div class="panel-footer">
                            <div class="panel panel-success">
                              <div class="panel-heading">
                                 <h4>¡Total de evidencias! <small>.Visualizacion de todas las evidencias subidas hasta el momento.</small></h4>
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
                <div class="tab-pane fade in active" id="InfoBasica">
                      <div class="col-sm-12 busca well">
                        <h1>Informacion Basica</h1>
                        <?php
                          if($row['Tipo']=="Alumno"){
                          echo "<p><b>Nombre : </b>".$row['Nom']." ".$row['Ap']." ".$row['Am']."</p>";
                          echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                          echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                          echo "<p><b>Ciudad:  </b>".$row['Ciudad']."</p>";
                          echo "<p><b>Correo: </b>".$row['Correo']."</p>";
                          echo "<p><b>Tipo: </b>".$row['Tipo']."</p>";
                          echo "<p><b>Tipo: </b>".$row['Contrasena']."</p>";
                          }elseif($row['Tipo']=="Maestro") {
                            echo "<p><b>Nombre : </b>".$row['Nom']." ".$row['Ap']." ".$row['Am']."</p>";
                            echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                            echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                            echo "<p><b>Ciudad:  </b>".$row['Ciudad']."</p>";
                            echo "<p><b>Correo: </b>".$row['Correo']."</p>";
                            echo "<p><b>Tipo: </b>".$row['Tipo']."</p>";
                            echo "<p><b>Tipo: </b>".$row['Contrasena']."</p>";
                          }elseif ($row['Tipo']=="PersonalA") {
                            echo "<p><b>Nombre : </b>".$row['Nom']." ".$row['Ap']." ".$row['Am']."</p>";
                            echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                            echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                            echo "<p><b>Ciudad:  </b>".$row['Ciudad']."</p>";
                            echo "<p><b>Correo: </b>".$row['Correo']."</p>";
                            echo "<p><b>Tipo: </b>".$row['Tipo']."</p>";
                            echo "<p><b>Tipo: </b>".$row['Contrasena']."</p>";
                          }else {
                            echo "Valio verga".$row['Tipo'];
                          }
                        ?>
                      </div>
                </div>
                <div class="tab-pane fade" id="Expediente">
                  <div class="row">
                    <?php
                  if($row['Tipo']=="Alumno"){
                    $sql = mysqli_query($con,"select curpAlumno,id_Usuario from alumnos where id_Usuario='$_POST[info]'");
                    $row1 = mysqli_fetch_array($sql);
                    $nombreArchivoC = "";
                    $compara = $row1['curpAlumno']."_";
                    $nombreDocu = array("".$compara."BG","".$compara."CP","".$compara."CU","".$compara."IMF","".$compara."IMD","".$compara."IPF","".$compara."IPD","".$compara."CD","".$compara."CM","".$compara."AN","".$compara."SP");
                    $nombreBoton = array("Reporte de evaluciacion del grado Anterior.","Certificado de primaria.","CURP del alumno.","INE de la madre(Frontal).","INE de la madre(Atras).","INE del padre(Frontal).","INE del padre(Atras).","Comprobante de domicilio.","Certificado Médico.","Acta de nacimiento.","Solicitud de preinscripción.");
                    $existente = array("","","","","","","","","","","");
                    $aux1 = "f";
                    $aux2 = 0; 
                    $documentos = 11;
                    $directorio = opendir("../php/documentos/alumno/".$row1['curpAlumno']."/"); //ruta actual
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
                                <h4 align="center" class="media-heading">'.$nombreBoton[$i].'</h4>
                                <button align="center" type="button" class="btn btn-danger" onclick="return enviar('."'".'../php/documentos/'.strtolower($row['Tipo']).'/'.$row1['curpAlumno'].'/'.$nombreDocu[$i].'.pdf'."'".','."'".'#Mod'."'".');" data-toggle="modal" href="#Mod" >Enviar PDF a</button>
                                <button align="center" type="button" class="btn btn-info" onclick="window.open('."'".'../php/documentos/alumno/'.$row1['curpAlumno'].'/'.$nombreDocu[$i].'.pdf'."'".')">Ver '.$nombreBoton[$i].'</button>
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
                                <h4 align="center" class="media-heading">No disponible: '.$nombreBoton[$i].'</h4>
                              </div>
                         </div>';
              }
              }
                    
                  }
                  //Maestro
                  elseif($row['Tipo']=="Maestro"){
                    $sql = mysqli_query($con,"select curpMaestro,id_Usuario from maestros where id_Usuario='$_POST[info]'");
                    $row1 = mysqli_fetch_array($sql);
                    $nombreArchivoC = "";
                    $compara = $row1['curpMaestro']."_";
                    $nombreDocu = array("".$compara."FUP","".$compara."CI","".$compara."CD","".$compara."CURP","".$compara."INEF","".$compara."INED","".$compara."CEL","".$compara."CEM","".$compara."CPLF","".$compara."CPLA","".$compara."CPMF","".$compara."CPMA","".$compara."OB","".$compara."AN","".$compara."TL","".$compara."TM","".$compara."SAT","".$compara."CL","".$compara."AP","".$compara."SA","".$compara."NPA");
                    $nombreArchivos = array("Formato único de personal.","Comprobante de ingresos.","Comprobante de domicilio.","CURP","INE(Frontal)","INE(Detras)","Certificado estudios licenciatura","Certificado de estudios maestria","Cédula profesional de licenciatura(Frontal)","Cédula profesional de licenciatura(Detras)","Cédula profesional de maestria(Frontal)","Cédula profesional de maestria(Detras)","Oficio de basificación.","Acta de nacimiento","Título Licenciatura","Título Maestria","Alta al SAT(RFC)","Cartilla Militar(SMN)","No Antecedentes Penales.","No Sanción Administrativa","Nombramiento por ascenso");
                    $aux = array("no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no");
                    $aux1 = "f";
                    $aux2 = 0; 
                    $documentos = 21;
                    $directorio = opendir("../php/documentos/maestro/".$row1['curpMaestro']."/"); //ruta actual
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
                                <button align="center" type="button" class="btn btn-danger" onclick="return enviar('."'".'../php/documentos/'.strtolower($row['Tipo']).'/'.$row1['curpMaestro'].'/'.$nombreDocu[$i].'.pdf'."'".','."'".'#Mod'."'".');" data-toggle="modal" href="#Mod1" >Enviar PDF a</button>
                                <button align="center" type="button" class="btn btn-info" onclick="window.open('."'".'../php/documentos/maestro/'.$row1['curpMaestro'].'/'.$nombreDocu[$i].'.pdf'."'".')">Ver '.$nombreArchivos[$i].'</button>

                                
                              </div>
                            </div>';
                            //onclick="window.open('."'".'../php/documentos/maestro/'.$row1['curpMaestro'].'/'.$nombreDocu[$i].'.pdf'."'".')"
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
                    
                  }
                  //PersonalAdministrativo
                  elseif($row['Tipo']=="PersonalA"){
                    $sql = mysqli_query($con,"select curpAdmi,id_Usuario from personaladmi where id_Usuario='$_POST[info]'");
                    $row1 = mysqli_fetch_array($sql);
                    $nombreArchivoC = "";
                    $compara = $row1['curpAdmi']."_";
                    $nombreDocu = array("".$compara."FUP","".$compara."CI","".$compara."CD","".$compara."CURP","".$compara."INEF","".$compara."INED","".$compara."CEL","".$compara."CEM","".$compara."CPLF","".$compara."CPLA","".$compara."CPMF","".$compara."CPMA","".$compara."OB","".$compara."AN","".$compara."TL","".$compara."TM","".$compara."SAT","".$compara."CL","".$compara."AP","".$compara."SA");
                    $nombreArchivos = array("Formato único de personal.","Comprobante de ingresos.","Comprobante de domicilio.","CURP","INE(Frontal)","INE(Detras)","Certificado estudios licenciatura","Certificado de estudios maestria","Cédula profesional de licenciatura(Frontal)","Cédula profesional de licenciatura(Detras)","Cédula profesional de maestria(Frontal)","Cédula profesional de maestria(Detras)","Oficio de basificación.","Acta de nacimiento","Título Licenciatura","Título Maestria","Alta al SAT(RFC)","Cartilla Militar(SMN)","No Antecedentes Penales.","No Sanción Administrativa");
                    $aux = array("no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no");
                    $aux1 = "f";
                    $aux2 = 0; 
                    $documentos = 20;
                    $directorio = opendir("../php/documentos/personal/".$row1['curpAdmi']."/"); //ruta actual
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
                                <button align="center" type="button" class="btn btn-danger" onclick="return enviar('."'".'../php/documentos/'.strtolower($row['Tipo']).'/'.$row1['curpAdmi'].'/'.$nombreDocu[$i].'.pdf'."'".','."'".'#Mod'."'".');" data-toggle="modal" href="#Mod1" >Enviar PDF a</button>
                                <button align="center" type="button" class="btn btn-info" onclick="window.open('."'".'../php/documentos/personal/'.$row1['curpAdmi'].'/'.$nombreDocu[$i].'.pdf'."'".')">Ver '.$nombreArchivos[$i].'</button>

                                
                              </div>
                            </div>';
                            //onclick="window.open('."'".'../php/documentos/maestro/'.$row1['curpMaestro'].'/'.$nombreDocu[$i].'.pdf'."'".')"
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
                    
                  }

                ?>
                  </div>
                </div>
                      <div id="ConsA"></div>
                </div>
              </div> 
            </div>    
        </div>
      </div><!-- Container-Fluid -->  
              <!-- ñam -->
              
            </div>
            <div class="modal-footer" align="center">
            </div>
          </div>

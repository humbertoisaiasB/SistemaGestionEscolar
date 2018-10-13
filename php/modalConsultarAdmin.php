<?php
session_start();
include 'Conexion.php';
  $asd = mysqli_query($con,"select Nom,Ap,Am,id_Usuario,Tipo,Pais,Estado,Ciudad,Correo from usuarios where id_Usuario='$_POST[info]'");
  $row = mysqli_fetch_array($asd);
  $curp = "";
  $aux = array("","","","","","","","","","");
  $directorio = "";
  $totalA = 0;
  $cont = 0;
  $queso1 = "";
  $queso2= "";
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
  <div class="modal-dialog ">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"  >&times;</button>
              <h4 align="center" class="modal-title">Ver archivos de: <?php echo "<p>".$row['Nom']." ".$row['Ap']." ".$row['Am']."</p>";?></h4> 
            </div>
            <div class="modal-body" align="center">
              <?php
                if($row['Tipo']=="Alumno"){
                echo "<p><b>Nombre : </b>".$row['Nom']." ".$row['Ap']." ".$row['Am']."</p>";
                echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                echo "<p><b>Ciudad:  </b>".$row['Ciudad']."</p>";
                echo "<p><b>Correo: </b>".$row['Correo']."</p>";
                }elseif($row['Tipo']=="Maestro") {
                  echo "<p><b>Nombre : </b>".$row['Nom']." ".$row['Ap']." ".$row['Am']."</p>";
                  echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                  echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                  echo "<p><b>Ciudad:  </b>".$row['Ciudad']."</p>";
                  echo "<p><b>Correo: </b>".$row['Correo']."</p>";
                }elseif ($row['Tipo']=="PersonalA") {
                  echo "<p><b>Nombre : </b>".$row['Nom']." ".$row['Ap']." ".$row['Am']."</p>";
                  echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                  echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                  echo "<p><b>Ciudad:  </b>".$row['Ciudad']."</p>";
                  echo "<p><b>Correo: </b>".$row['Correo']."</p>";
                }else {
                  echo "Valio verga".$row['Tipo'];
                }
                ?>
            </div>
            <div class="modal-footer" align="center">

                <?php
                  if($row['Tipo']=="Alumno"){
                    $sql = mysqli_query($con,"select curpAlumno,id_Usuario from alumnos where id_Usuario='$_POST[info]'");
                    $row1 = mysqli_fetch_array($sql);
                    $nombreArchivoC = "";
                    $compara = $row1['curpAlumno']."_";
                    $nombreDocu = array("".$compara."BG","".$compara."CP","".$compara."CU","".$compara."IMF","".$compara."IMD","".$compara."IPF","".$compara."IPD","".$compara."CD","".$compara."CM","".$compara."AN");
                    $nombreBoton = array("Reporte de evaluciacion del grado Anterior.","Certificado de primaria.","CURP del alumno.","INE de la madre(Frontal).","INE de la madre(Atras).","INE del padre(Frontal).","INE del padre(Atras).","Comprobante de domicilio.","Certificado Médico.","Acta de nacimiento.");
                    $existente = array("","","","","","","","","","");
                    $aux1 = "f";
                    $aux2 = 0; 
                    $documentos = 10;
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
                    $nombreDocu = array("".$compara."FUP","".$compara."CI","".$compara."CD","".$compara."CURP","".$compara."INEF","".$compara."INED","".$compara."CEL","".$compara."CEM","".$compara."CPLF","".$compara."CPLA","".$compara."CPMF","".$compara."CPMA","".$compara."OB","".$compara."AN","".$compara."TL","".$compara."TM","".$compara."SAT","".$compara."CL","".$compara."AP","".$compara."SA");
                    $nombreArchivos = array("Formato único de personal.","Comprobante de ingresos.","Comprobante de domicilio.","CURP","INE(Frontal)","INE(Detras)","Certificado estudios licenciatura","Certificado de estudios maestria","Cédula profesional de licenciatura(Frontal)","Cédula profesional de licenciatura(Detras)","Cédula profesional de maestria(Frontal)","Cédula profesional de maestria(Detras)","Oficio de basificación.","Acta de nacimiento","Título Licenciatura","Título Maestria","Alta al SAT(RFC)","Cartilla Militar(SMN)","No Antecedentes Penales.","No Sanción Administrativa");
                    $aux = array("no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no");
                    $aux1 = "f";
                    $aux2 = 0; 
                    $documentos = 20;
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
                                <button align="center" type="button" class="btn btn-info" onclick="window.open('."'".'../php/documentos/maestro/'.$row1['curpMaestro'].'/'.$nombreDocu[$i].'.pdf'."'".')">Ver '.$nombreArchivos[$i].'</button>
                                <button align="center" type="button" onclick="return enviar('."'"."hola"."'".','."'"."#aqui"."'".')" class="btn btn-info" >Enviar '.$nombreArchivos[$i].'</button>
                                <div id=aqui>

                                </div>
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
                  //Director  
                ?>
            </div>
          </div>
        </div>;
<?php  
  //}

//}

            //echo '<p>'.$_POST['es'].'</p>'; 
            /*echo '<div class="col-md-6" style="word-wrap:break-word; display: inline-table;">';
            echo '<ul class="list-unstyled">';
            if(mysqli_num_rows($asd)>1){

               <div class="row">
                      <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                          <img src="../assets/images/curp.png">
                          <div class="caption">
                            <h3></h3>
                            <p>...</p>
                            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                          </div>
                        </div>
                      </div>
                    </div>

              while ($row = mysqli_fetch_array($asd)) {
                //echo '<div class="col-md-4" style="word-wrap:break-word";>';
                echo '<li>';
                echo '<a data-toggle="modal" data-target="#Mod" class="thumbnail">';
                echo '<img src="../assets/Profiles/user.png"  width="180px" height="100px"><p>'.$row['Nom'].'</p><p>Tipo : '.$row['cont'].'</p></a>';
                echo '</li>';
              } 
              
            }else if(mysqli_num_rows($asd)==1){
              $row = mysqli_fetch_array($asd);
              echo '<div class="col-md-4" style="word-wrap:break-word";>';
              echo '<a  data-toggle="modal" data-target="#Mod" class="thumbnail">';
              echo '<img src="../assets/Profiles/user.png"  width="180px" height="100px"><p>'.$row['Nom'].'</p><p>Tipo : '.$row['cont'].'</p></a>';
              echo '</div>';
            }*/

             /* if ($row['Tipo'] == "Empresa") {
                echo "<p><b>Nombre: </b>".$row['Nom']."</p>";
                echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                echo "<p><b>Ciudad: </b>".$row['Ciudad']."</p>";
                //echo "<p><b>Colonia: </b>".$row['Colonia']."</p>";
                echo "<p><b>Correo: </b>".$row['Correo']."</p>";
                echo "<button onclick='mensajeAdmin(".$row['id_Usuario'].");' >¿Eliminar?</button>";
              }
              elseif ($row['Tipo'] == "Empleador") {
                echo "<p><b>Nombre: </b>".$row['Nom']." ".$row['Ap']." ".$row['Am']."</p>";
                echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                echo "<p><b>Ciudad: </b>".$row['Ciudad']."</p>";
                //echo "<p><b>Colonia: </b>".$row['Colonia']."</p>";
                echo "<p><b>Correo: </b>".$row['Correo']."</p>";
                echo "<button onclick='mensajeAdmin(".$row['id_Usuario'].");' >¿Eliminar?</button>";
              }
              elseif ($row['Tipo'] == "Candidato") {
                echo "<p><b>Nombre: </b>".$row['Nom']."</p>";
                echo "<button onclick='mensajeAdmin(".$row['id_Usuario'].");' >¿Eliminar?</button>";
              }
              //
              //echo "<p><b>Tipo: </b>".$row['Tipo'].;
              //echo "<p><b>Telefono del trabajo: </b>".$row['Trabajo']."</p>";
              //echo "<p><b>Telefono celular: </b>".$row['Celular']."</p>";
              //
              //echo "<p><b>Estado: </b>".$row['Estado']."</p>";
              //echo "<p><b>Ciudad: </b>".$row['Ciudad']."</p>";
              //echo "<p><b>Colonia: </b>".$row['Colonia']."</p>";
              //echo "<p><b>Calle: </b>".$row['Calle']."</p>";
              //echo "<p><b>Sexo: </b>".$row['Sexo']."</p>";
              //echo "<p><b>Departamento: </b>".$row['Departamento']."</p>";
              */
           ?>
           
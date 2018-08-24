<?php
session_start();
include 'Conexion.php';
//if ('$_POST[es]'=="empleo") {
  //$asd = mysqli_query($con,"select em.id_Empresa, u.Tipo, u.Nom, u.Ap, u.Am, em.Sexo, u.Pais, u.Estado, u.Ciudad, u.Colonia, u.Calle
  //FROM empleador AS em 
  //INNER JOIN usuarios AS u ON ( em.id_Usuario = u.id_Usuario ) 
  //INNER JOIN empleo AS e ON ( em.id_Empleador= e.id_Empleador AND e.id_Empleador=em.id_Empleador) where em.id_Empleador=e.id_Empleador and u.id_Usuario='$_POST[info]'");
  $asd = mysqli_query($con,"select Nom,Ap,Am,id_Usuario,Tipo,Pais,Estado,Ciudad,Correo from usuarios where id_Usuario='$_POST[info]'");
  $row = mysqli_fetch_array($asd);
  $curp = "";
  $directorio = "";
  $cont = 0;
  $queso1 = "";
  $queso2= "";
  //if ($row['Tipo'] == "Empresa") {
?>
  <div class="modal-dialog " onload="return BuscarDocumentos(<?php echo $_POST['info'];?>,<?php echo $curp ?>)">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"  >&times;</button>
              <h4 class="modal-title">Subir archivo de: </h4> 
            </div>
            <div class="modal-body" align="center">
              <?php
                if($row['Tipo']=="Alumno"){
                echo "<p><b>El nombre del alumno es: </b>".$row['Nom']." ".$row['Ap']." ".$row['Am']."</p>";
                echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                echo "<p><b>Ciudad:  </b>".$row['Ciudad']."</p>";
                echo "<p><b>Correo: </b>".$row['Correo']."</p>";
                }elseif($row['Tipo']=="Maestro") {
                  echo "<p><b>El nombre del maestro es: </b>".$row['Nom']." ".$row['Ap']." ".$row['Am']."</p>";
                  echo "<p><b>Pais: </b>".$row['Pais']."</p>";
                  echo "<p><b>Estado: </b>".$row['Estado']."</p>";
                  echo "<p><b>Ciudad:  </b>".$row['Ciudad']."</p>";
                  echo "<p><b>Correo: </b>".$row['Correo']."</p>";
                }elseif ($row['Tipo']=="PersonalA") {
                  echo "<p><b>El nombre del personal de apoyo es: </b>".$row['Nom']." ".$row['Ap']." ".$row['Am']."</p>";
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
                    $nombreDocu = array("".$row1['curpAlumno']."_BG","".$row1['curpAlumno']."_CP","".$row1['curpAlumno']."_CU","".$row1['curpAlumno']."_IM","".$row1['curpAlumno']."_IP","".$row1['curpAlumno']."_CD","".$row1['curpAlumno']."_CM","".$row1['curpAlumno']."_AN");
                    $nombreBoton = array("Boleta de calificaciones de 6 grado.","Certificado de primaria.","CURP del alumno.","Ife de la madre.","Ife del padre.","Comprobante de domicilio.","Certificado Medico.","Acta de nacimiento.");
                    $directorio = opendir("../php/documentos/".$row['Tipo']."/".$row1['curpAlumno']."/"); //ruta actual
                    while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
                    {
                      if (!is_dir($archivo))//verificamos si es o no un directorio
                        { 
                          if($archivo==$nombreDocu[$cont].".pdf"){
                            $queso1 = $queso1.
                            '<div class="media cambio">
                              <div class="media-left">
                                <a href="#">
                                  <img class="media-object" src="../assets/images/curp.png" height="60px" width="60px">
                                </a>
                              </div>
                              <div align="center" class="media-body">
                                <h4 align="center" class="media-heading">'.$nombreBoton[$cont].'</h4>
                                <button align="center" type="button" class="btn btn-info" onclick="window.open('."'".'../php/documentos/alumno/'.$row1['curpAlumno'].'/'.$nombreDocu[$cont].'.pdf'."'".')">Ver '.$nombreBoton[$cont].'</button>
                              </div>
                            </div>';
                            $cont=$cont+1;
                          }
                        }
                    }
                    $queso2 = '<div class="row">
                              '.$queso1.'
                             </div>';
                    echo '<h3 align="center">Archivos disponibles para su visualizacion: '.$cont.'</h3>';
                    echo $queso2;
                  }  
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
           
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
?>
<body class="site">
  <main class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-7">
              <ul class="nav nav-tabs">
                <li role="presentation" class="active" > <a href="#Consultar" data-toggle="tab"><img src="../assets/images/Consultar.png"  height="30px" width="30px" >  Consultar SubDirector</a></li>
              </ul>
          </div>
          
        </div>  
        <div class="row">
            <div class="col-sm-7">
              <div class="tab-content"> 
                 <br>
                 <div class="tab-pane fade in active" id="sub">
                  <div class="col-sm-12 registro1 well">
                    <h1>Consultar al SubDirector</h1>
                    <?php
                    if($val1=="si"){
                      $query2=mysqli_query($con,"select u.id_Usuario, u.Nom, sb.id_SubDirector, sb.curpSupDirector, u.Documento FROM usuarios AS u INNER JOIN subDirector AS sb ON (sb.id_Usuario=u.id_Usuario)WHERE u.claveEscuela=$variable && u.id_Usuario=sb.id_Usuario");
                      $val = mysqli_fetch_array($query2);
                    $nombreArchivoC = "";
                    $compara = $val['curpSubDirector']."_";
                    //
                    $sql=mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, sb.id_SubDirector, sb.curpSubDirector, u.Documento FROM usuarios AS u INNER JOIN subDirector AS sb ON sb.id_Usuario=u.id_Usuario)WHERE u.id_Usuario=$val[id_Usuario] && u.id_Usuario=sb.id_Usuario");
                    $row1 = mysqli_fetch_array($sql);
                    echo "<p><b>Nombre: </b>".$row1['Nom']." ".$row1['Ap']." ".$row1['Am']."</p>";
                    echo "<p><b>CURP: </b>".$row1['curpSubDirector']."</p>";
                    $nombreArchivoC = "";
                    $compara = $row1['curpSubDirector']."_";
                    $nombreDocu = array("".$compara."FUP","".$compara."CI","".$compara."CD","".$compara."CURP","".$compara."INEF","".$compara."INED","".$compara."CEL","".$compara."CEM","".$compara."CPLF","".$compara."CPLA","".$compara."CPMF","".$compara."CPMA","".$compara."OB","".$compara."AN","".$compara."TL","".$compara."TM","".$compara."SAT","".$compara."CL","".$compara."AP","".$compara."SA");
                    $nombreArchivos = array("Formato único de personal.","Comprobante de ingresos.","Comprobante de domicilio.","CURP","INE(Frontal)","INE(Detrás)","Certificado estudios licenciatura","Certificado de estudios maestria","Cédula profesional de licenciatura(Frontal)","Cédula profesional de licenciatura(Detrás)","Cédula profesional de maestria(Frontal)","Cédula profesional de maestria(Detrás)","Oficio de basificación.","Acta de nacimiento","Título licenciatura","Título maestria","Alta al SAT(RFC)","Cartilla militar(SMN)","No antecedentes penales.","No sanción administrativa");
                    $aux = array("no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no","no");
                    $documentos = 20;
                    $aux1 = "f";
                    $aux2 = 0;
                    $cont = 0; 
                    $directorio = opendir("../php/documentos/subDirector/".$row1['curpSubDirector']."/"); //ruta actual
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
                                <button align="center" type="button" class="btn btn-info" onclick="window.open('."'".'../php/documentos/subDirector/'.$row1['curpSubDirector'].'/'.$nombreDocu[$i].'.pdf'."'".')">Ver '.$nombreArchivos[$i].'</button>
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
  <div class="modal fade" id="Mod" role="dialog"></div>
</body>
</html>



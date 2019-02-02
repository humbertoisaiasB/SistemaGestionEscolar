<?php
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
include '../Conexion.php';
session_start();

$condicion1 = "";
$condicion2 = "";
$condicion3 = "";
//Va en la imprecion.
$enunciadoM = "";
$enunciadoC = "";
$enunciadoGu = "";
$enunciadoGa = "";

//
$datosFinal = "";
$datosR = array(
    array("", "", "", ""),
    array("", "", "", ""),
    array("", "", "", ""),
    array("", "", "", "")
);
//variables para determinar que sera
$ruta='../../assets/Profiles/';
$archivo=$ruta.$_SESSION['id'].'.png';
if($_POST['tipoU'] == "Alumno"){

}elseif ($_POST['tipoU'] == "Maestro"){
  $query1 = mysqli_query($con,"select * from usuarios u inner join maestros m on(u.id_Usuario=m.id_Usuario) where m.id_Usuario=u.id_Usuario and u.id_Usuario=".$_SESSION['id']);
  $val = mysqli_fetch_array($query1);
  //Codigo agregado
  //Codigo para funcion todos los alumnos sin grupos, todos los que tiene
  if(isset($val['todo'])){
    $numero = strlen($val['todo']);
    $variable = $val['todo'];
    $variable1 = "";
    $auxPalabras = "";
    $cont = 0;
    $cont1 = 0;
    for($i=0; $i < $numero; $i++){
      if($variable[$i] == "*"){
        $contenidoDetodo[$cont]=$auxPalabras;
        $cont++;
        $auxPalabras = "";
      }else{
        $auxPalabras = $auxPalabras."".$variable[$i];
      } 
    }
    $auxPalabras = "";
    for($i=0; $i < $cont; $i++){ 
      $variable1 = $contenidoDetodo[$i];
      for($j=0; $j<strlen($contenidoDetodo[$i]); $j++){ 
        if($variable1[$j] == "|"){
          $datosR[$i][$cont1] = $auxPalabras;
          $cont1++;
          $auxPalabras = "";
        }else{
          $auxPalabras = $auxPalabras."".$variable1[$j];
        } 
      }
      $cont1 =0;
      $variable1 = "";
    }
    //Aqui ya con datos el arreglo datosR
    //esto mostrara a todos sus alumnos
    //Recordando que modalidad|clave|grado|grupo
    for($i=0; $i<$cont; $i++){ 
      //Aqui decidiermos si es por filtros----------------------------------------
                if($_POST['filtro'] == "si"){
                  //Nuevo metodo milll
                  $condicion1 = ($_POST['f1'] == " ") ? "z.Modalidad!=' '":"z.Modalidad='".$_POST['f1']."'";
                  $clave = ($_POST['f2'] == " ") ? "".$datosR[$i][1]:"".$_POST['f2']."";
                  $grado = ($_POST['f3'] == " ") ? "".$datosR[$i][2]:"".$_POST['f3']."";
                  $grupo = ($_POST['f4'] == " ") ? "".$datosR[$i][3]:"".$_POST['f4']."";
                }else{
                  echo "nada";
                  $clave = $datosR[$i][1];
                  $grado = $datosR[$i][2];
                  $grupo = $datosR[$i][3];
                }


                 $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, a.id_Alumno,a.curpAlumno,a.Grado,a.Grupo FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.claveEscuela='$clave' and  a.Grado=$grado and a.Grupo='$grupo'");
                //Aqui acaba si es por filtros--------------------------------------------------
            while ($row=mysqli_fetch_array($sql)){
              //Codigo para saber los expedientes existentes
              //Aqui va lo demas
              if($_POST['informeT'] == "expediente"){
                $compara = $row['curpAlumno']."_";
                $nombreDocu = array("".$compara."BG","".$compara."CP","".$compara."CU","".$compara."IMF","".$compara."IMD","".$compara."IPF","".$compara."IPD","".$compara."CD","".$compara."CM","".$compara."AN");
                $complemento = "";
                $aux1 = "f";
                $aux2 = 0; 
                $documentos = 10;
                $directorio = opendir("../documentos/alumno/".$row['curpAlumno']."/"); //ruta actual
                while($archivo = readdir($directorio)){
                  if (!is_dir($archivo)) {
                    $nombreArchivoC = nombreCadena($archivo);
                    $aux[$cont] = $nombreArchivoC;
                    $cont = $cont + 1;
                  }
                }
                for($i=0; $i<$documentos; $i++){ 
                  for($j=0; $j<$documentos; $j++){
                    if($nombreDocu[$i]==$aux[$j]){
                      $aux1=$aux[$j];
                      $caso = "si";
                      $complemento = $complemento."<td>"."*</td>";
                    }
                  }
                  if($nombreDocu[$i]!=$aux1){
                    $caso = "no";
                    $complemento = $complemento."<td>"."x</td>";
                  }
                }
                $datosFinal = "".$datosFinal."<tr><td>num</td><td>".$row['Nom']." ".$row['Ap']." ".$row['Am']." </td><td>:".$grado."°</td><td>".$grupo."</td><td>".$clave."</td>".$complemento."</tr>\n";
                //Acaba aqui
                }elseif ($_POST['informeT'] == "listado") {
                  $datosFinal = "".$datosFinal."<tr><td>".($i+1)."</td><td>".$row['Nom']." ".$row['Ap']." ".$row['Am']." </td><td>:".$grado."°</td><td>".$grupo."</td><td>".$clave."</td></tr>\n";
                }elseif ($_POST['informeT'] == "total") {
                  if($row['Sexo'] == "Femenino"){
                    $totalNiñas++;
                    $complemento = "<td>Si</td><td>No</td>";
                  }else{
                    $totalNiños++;
                    $complemento = "<td>No</td><td>Si</td>";
                  }
                  $datosFinal = "".$datosFinal."<tr><td>num</td><td>".$row['Nom']." ".$row['Ap']." ".$row['Am']." </td><td>:".$grado."°</td><td>".$grupo."</td><td>".$clave."</td>".$complemento."</tr>\n";
                }
              } 
    }
  }else{
    $datosFinal = "<p>queso</p>";
    echo "Orale no entra al primerooo";
  }
  //Codigo para funcion todos los alumnos sin grupos, todos los que tiene
  //Codigo agregado
}elseif ($_POST['tipoU'] == "PersonalA"){
  # code...
}elseif ($_POST['tipoU'] == "SubDirector") {
  # code...
}elseif ($_POST['tipoU'] == "Director") {
  # code...
}

//Aqui terminan las variables
//Codigo que es general para todos
  //Codigo agregado
  if(file_exists($archivo)){
    $image=$ruta.$_SESSION['id'].'.png';
  }else{
    $image=$ruta.'default.png';
  }

  ob_start();

  require_once("lib/mpdf.php");

  $mpdf = new mPDF('c','A4');
  ob_clean();
  //Aqui para el primer bloque de codigo intermedio
  if($_POST['informeT'] == "listado"){
    $css = '<style>'.file_get_contents('PDF/style.css').'</style>';
    $mpdf->writeHTML($css,1);
    $mpdf->writeHTML('
    <style>
    #section-left .section .logo {
        background: url('.$image.');
    }

  </style>
  <body>
    <div id="section-left">
      <div class="wrapper">
        <table>
      <tr >
        <td rowspan="1" class="logo">
          <img src="../../assets/images/logoZ.png"> 
        </td>
        <td colspan="3">
          <div class="section">
            <div class="title">
            Secretaria de educacion publica
          </div>
          </div>
          <h3>CORDINACION DE EDUCACION BASICA</h3>
          <h4>DIRECCION GENERAL DE EDUCACION SECUNDARIA</h4>
          <h4>DIRECCION DE EDUCACION TELESECUNDARIA</h4>
          <h5>SUPERVISION ESCOLAR DE TELESECUNDARIAS</h5>
          <h3>'.$val["Nom"].' '.$val["Ap"].'</h3>
          <span class="intro">'.$val["curpMaestro"].'</span> 
                <span class="num">Celular: '.$val["Celular"].'</span>
                <span class="num">Casa: '.$val["Casa"].'</span>
        </td>
        <td rowspan="1" class="logo">
          <img src="../../assets/images/logoE.png"> 
        </td>
      </tr>
    </table>
    <!--Aqui empieza la tabla mejorada full power-->7

    <!--Aqui acaba codigo agregado -->
    <div id="section-right">
      <div class="wrapper">
        <div class="section">
        <div class="">
      <h3>Titulo del informe</h3>
      <p>Nombre de la escuela: <span>tal</span>    Clave:<span>'.$_POST['f2'].'</span>   Modalidad: <span>'.$_POST['f1'].'</span></p>
      <p>Localidad: <span>tal</span>   Municipio: <span>Uno</span></p>
      <p>Maestr(a): <span>'.$val["Nom"].' '.$val["Ap"].' '.$val['Am'].'</span></p>
      <p>Grado: <span></span>   Grupo: <span>B</span></p>
    </div>
          <div class="title">
            <i class="fa fa-user" aria-hidden="true"></i>
            Lista de alumnos que toman clases contigo.
          </div>
          <table border="1">
        <tr>
          <td>
            <p>Numero</p>
          </td>
          <td>
            <p>Nombre de alumno</p>
          </td>
          <td>
            <p>Grado</p>
          </td>
          <td>
            <p>Grupo</p>
          </td>
          <td>
            <p>Clave de centro de trabajo</p>
          </td>
        </tr>
        '.$datosFinal.'

      </table>
        </div>
        </div>
      </div>
    </div>
  </body>');
  }elseif ($_POST['informeT'] == "expediente") {
    $css = '<style>'.file_get_contents('PDF/style.css').'</style>';
    $mpdf->writeHTML($css,1);
    $mpdf->writeHTML('
  <style>
  #section-left .section .logo {
      background: url('.$image.');
    }

  </style>
  <body>
    <div id="section-left">
      <div class="">
        <table>
      <tr >
        <td rowspan="1" class="logo">
          <img src="../../assets/images/logoZ.png"> 
        </td>
        <td colspan="3">
          <h2>Secretaria de educacion publica</h2>
          <h3>CORDINACION DE EDUCACION BASICA</h3>
          <h4>DIRECCION GENERAL DE EDUCACION SECUNDARIA</h4>
          <h4>DIRECCION DE EDUCACION TELESECUNDARIA</h4>
          <h5>SUPERVISION ESCOLAR DE TELESECUNDARIAS</h5>
          <h3>'.$val["Nom"].' '.$val["Ap"].'</h3>
          <span class="intro">'.$val["curpMaestro"].'</span> 
                <span class="num">Celular: '.$val["Celular"].'</span>
                <span class="num">Casa: '.$val["Casa"].'</span>
        </td>
        <td rowspan="1" class="logo">
          <img src="../../assets/images/logoE.png"> 
        </td>
      </tr>
    </table>
    <!--Aqui empieza la tabla mejorada full power-->7
    <div class="">
      <h3>Titulo del informe</h3>
      <p>Nombre de la escuela: <span>tal</span>    Clave:<span>14DT</span>   Zona: <span>6</span></p>
      <p>Localidad: <span>tal</span>   Municipio: <span>Uno</span></p>
      <p>Maestr(a): <span>Jose</span></p>
      <p>Grado: <span>1</span>   Grupo: <span>B</span></p>
      <table border="1">
        <tr>
          <td>
            <p>Numero</p>
          </td>
          <td>
            <p>Nombre de alumno</p>
          </td>
          <td>
            <p>Grado</p>
          </td>
          <td>
            <p>Grupo</p>
          </td>
          <td>
            <p>Clave de centro de trabajo</p>
          </td>
          <td>
            <p>Doc1</p>
          </td>
          <td>
            <p>Doc2</p>
          </td>
          <td>
            <p>Doc3</p>
          </td>
          <td>
            <p>Doc4</p>
          </td>
          <td>
            <p>Doc5</p>
          </td>
          <td>
            <p>Doc6</p>
          </td>
          <td>
            <p>Doc7</p>
          </td>
          <td>
            <p>Doc8</p>
          </td>
          <td>
            <p>Doc9</p>
          </td>
          <td>
            <p>Doc10</p>
          </td>
        </tr>
        '.$datosFinal.'

      </table>
    </div>
    <!--Aqui acaba codigo agregado -->
    <div id="section-right">
      <div class="wrapper">
        <div class="section">
          <div class="title">
            <i class="fa fa-user" aria-hidden="true"></i>
            Lista de alumnos que toman clases contigo.
          </div>
          '.$datosFinal.'
        </div>
        </div>
      </div>
    </div>
  </body>');   
  }elseif ($_POST['informeT'] == "total") {
    $css = '<style>'.file_get_contents('PDF/style.css').'</style>';
    $mpdf->writeHTML($css,1);
    $mpdf->writeHTML('
    <style>
  #section-left .section .logo {
      background: url('.$image.');
    }

  </style>
  <body>
    <div id="section-left">
      <div class="">
        <table>
      <tr >
        <td rowspan="1" class="logo">
          <img src="../../assets/images/logoZ.png"> 
        </td>
        <td colspan="3">
          <h2>Secretaria de educacion publica</h2>
          <h3>CORDINACION DE EDUCACION BASICA</h3>
          <h4>DIRECCION GENERAL DE EDUCACION SECUNDARIA</h4>
          <h4>DIRECCION DE EDUCACION TELESECUNDARIA</h4>
          <h5>SUPERVISION ESCOLAR DE TELESECUNDARIAS</h5>
          <h3>'.$val["Nom"].' '.$val["Ap"].'</h3>
          <span class="intro">'.$val["curpMaestro"].'</span> 
                <span class="num">Celular: '.$val["Celular"].'</span>
                <span class="num">Casa: '.$val["Casa"].'</span>
        </td>
        <td rowspan="1" class="logo">
          <img src="../../assets/images/logoE.png"> 
        </td>
      </tr>
    </table>
    <!--Aqui empieza la tabla mejorada full power-->7
    <div class="">
      <h3>Titulo del informe</h3>
      <p>Nombre de la escuela: <span>tal</span>    Clave:<span>14DT</span>   Zona: <span>6</span></p>
      <p>Localidad: <span>tal</span>   Municipio: <span>Uno</span></p>
      <p>Maestr(a): <span>Jose</span></p>
      <p>Grado: <span>1</span>   Grupo: <span>B</span></p>
      <table border="1">
        <tr>
          <td>
            <p>Numero</p>
          </td>
          <td>
            <p>Nombre de alumno</p>
          </td>
          <td>
            <p>Grado</p>
          </td>
          <td>
            <p>Grupo</p>
          </td>
          <td>
            <p>Clave de centro de trabajo</p>
          </td>
          <td>
            <p>Mujer</p>
          </td>
          <td>
            <p>Hombre</p>
          </td>
        '.$datosFinal.'
          <tr>
            <td colspan="2">
              <p>Total de mujeres: '.$totalNiñas.'</p>
            </td>
            <td colspan="2">
              <p>Total de Hombres: '.$totalNiños.'</p>
            </td>
            <td colspan="3">
              <p>Total de alumnos: '.($totalNiñas+$totalNiños).'</p>
            </td>
          </tr>
      </table>
    </div>
    <!--Aqui acaba codigo agregado -->
    <div id="section-right">
      <div class="wrapper">
        <div class="section">
          <div class="title">
            <i class="fa fa-user" aria-hidden="true"></i>
            Lista de alumnos que toman clases contigo.
          </div>
          '.$datosFinal.'
        </div>
        </div>
      </div>
    </div>
  </body>');
  }elseif ($_POST['informeT'] == "identificacion") {
    $css = '<style>'.file_get_contents('PDF/style1.css').'</style>';
    $mpdf->writeHTML($css,1);
    $mpdf->writeHTML('
    <style>
  #section-left .section .logo {
      background: url('.$image.');
    }

  </style>
  <body>
    <div id="section-left">
      <div class="section intro">
        <div class="logo">
        <img src="">
        </div>
        <h3>'.$val["Nom"].' '.$val["Ap"].'</h3>
        <div class="content">
          <span class="dob">'.$val["Dia"].' '.$mes.' '.$val["Ano"].'</span>, '.$val["Edad"].' años <br>
          <span class="intro">'.$val["curpAlumno"].'</span> <br>
          <span class="title">'.$val["Sexo"].'</span>
        </div>
        <hr>
        <div id="contact">
          <span class="num">Celular: '.$val["Celular"].'</span><br>
            <span class="num">Casa: '.$val["Casa"].'</span>
          <div class="email">
            <i class="fa fa-envelope-open-o" aria-hidden="true"></i>
            '.$val["Correo"].'
          </div>
          <br>
          <br>
          <hr>
          <div class="web">
            <br>
            '.$val["Ciudad"].', '.$val["Estado"].', '.$val["Pais"].'.<br>
          </div>
        </div>
      </div>
    </div>
    <div id="section-right">
      <div class="wrapper">
        <div class="section">
          <div class="title">
            <i class="fa fa-user" aria-hidden="true"></i>
            Perfil
          </div>
          <p>'.$_POST["Perfil"].'</p>
        </div>
        </div>
      </div>
    </div>
  </body>');
  }elseif ($_POST['informeT'] == "personal") {
    # code...
  }
  $mpdf->Output('../../assets/Pdf/Prueba'.$val["id_Usuario"].'.pdf','F');
//Aqui acaba

/*
if (isset($_POST['btn_SubmitpdfListado'])){
  $ruta='../assets/Profiles/';
  $archivo=$ruta.$_SESSION['id'].'.png';
  if(empty($_SESSION['User']) && empty($_SESSION['id'])){ header("Location: ../index.php");}
  $query1 = mysqli_query($con,"select * from usuarios u inner join maestros m on(u.id_Usuario=m.id_Usuario) where m.id_Usuario=u.id_Usuario and u.id_Usuario=".$_SESSION['id']);
  $val = mysqli_fetch_array($query1);
  //Codigo agregado
  //Codigo para funcion todos los alumnos sin grupos, todos los que tiene
  if(isset($val['todo'])){
    $numero = strlen($val['todo']);
    $variable = $val['todo'];
    $variable1 = "";
    $auxPalabras = "";
    $cont = 0;
    $cont1 = 0;
    for($i=0; $i < $numero; $i++){
      if($variable[$i] == "*"){
        $contenidoDetodo[$cont]=$auxPalabras;
        $cont++;
        $auxPalabras = "";
      }else{
        $auxPalabras = $auxPalabras."".$variable[$i];
      } 
    }
    $auxPalabras = "";
    for($i=0; $i < $cont; $i++){ 
      $variable1 = $contenidoDetodo[$i];
      for($j=0; $j<strlen($contenidoDetodo[$i]); $j++){ 
        if($variable1[$j] == "|"){
          $datosR[$i][$cont1] = $auxPalabras;
          $cont1++;
          $auxPalabras = "";
        }else{
          $auxPalabras = $auxPalabras."".$variable1[$j];
        } 
      }
      $cont1 =0;
      $variable1 = "";
    }
    //Aqui ya con datos el arreglo datosR
    //esto mostrara a todos sus alumnos
    //Recordando que modalidad|clave|grado|grupo
    for($i=0; $i<$cont; $i++){ 
      $clave = $datosR[$i][1];
      $grado = $datosR[$i][2];
      $grupo = $datosR[$i][3];
      $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, a.id_Alumno,a.curpAlumno,a.Grado,a.Grupo FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.claveEscuela='$clave' and  a.Grado=$grado and a.Grupo='$grupo'");
            while ($row=mysqli_fetch_array($sql)){
                $datosFinal = "".$datosFinal."<tr><td>".($i+1)."</td><td>".$row['Nom']." ".$row['Ap']." ".$row['Am']." </td><td>:".$grado."°</td><td>".$grupo."</td><td>".$clave."</td></tr>\n";
            } 
    }
  }else{
    $datosFinal = "<p>queso</p>";
    echo "Orale no entra al primerooo";
  }
  //Codigo para funcion todos los alumnos sin grupos, todos los que tiene

  //Codigo agregado
  if(file_exists($archivo)){
    $image=$ruta.$_SESSION['id'].'.png';
  }else{
    $image=$ruta.'default.png';
  }

  ob_start();

  require_once("/lib/mpdf.php");

  $mpdf = new mPDF('c','A4');
  ob_clean();
  $css = '<style>'.file_get_contents('/PDF/style.css').'</style>';
  $mpdf->writeHTML($css,1);
  $mpdf->writeHTML('
  <style>
  #section-left .section .logo {
      background: url('.$image.');
    }

  </style>
  <body>
    <div id="section-left">
      <div class="">
        <table>
      <tr >
        <td rowspan="1" class="logo">
          <img src="../assets/images/logoZ.png"> 
        </td>
        <td colspan="3">
          <h2>Secretaria de educacion publica</h2>
          <h3>CORDINACION DE EDUCACION BASICA</h3>
          <h4>DIRECCION GENERAL DE EDUCACION SECUNDARIA</h4>
          <h4>DIRECCION DE EDUCACION TELESECUNDARIA</h4>
          <h5>SUPERVISION ESCOLAR DE TELESECUNDARIAS</h5>
          <h3>'.$val["Nom"].' '.$val["Ap"].'</h3>
          <span class="intro">'.$val["curpMaestro"].'</span> 
                <span class="num">Celular: '.$val["Celular"].'</span>
                <span class="num">Casa: '.$val["Casa"].'</span>
        </td>
        <td rowspan="1" class="logo">
          <img src="../assets/images/logoE.png"> 
        </td>
      </tr>
    </table>
    <!--Aqui empieza la tabla mejorada full power-->7
    <div class="">
      <h3>Titulo del informe</h3>
      <p>Nombre de la escuela: <span>tal</span>    Clave:<span>14DT</span>   Zona: <span>6</span></p>
      <p>Localidad: <span>tal</span>   Municipio: <span>Uno</span></p>
      <p>Maestr(a): <span>Jose</span></p>
      <p>Grado: <span>1</span>   Grupo: <span>B</span></p>
      <table border="1">
        <tr>
          <td>
            <p>Numero</p>
          </td>
          <td>
            <p>Nombre de alumno</p>
          </td>
          <td>
            <p>Grado</p>
          </td>
          <td>
            <p>Grupo</p>
          </td>
          <td>
            <p>Clave de centro de trabajo</p>
          </td>
        </tr>
        '.$datosFinal.'

      </table>
    </div>
    <!--Aqui acaba codigo agregado -->
    <div id="section-right">
      <div class="wrapper">
        <div class="section">
          <div class="title">
            <i class="fa fa-user" aria-hidden="true"></i>
            Lista de alumnos que toman clases contigo.
          </div>
          '.$datosFinal.'
        </div>
        </div>
      </div>
    </div>
  </body>');
  $mpdf->Output('../assets/Pdf/Prueba'.$val["id_Usuario"].'.pdf','F');

}elseif (isset($_POST['btn_SubmitpdfExp'])) {
  $ruta='../assets/Profiles/';
  $archivo=$ruta.$_SESSION['id'].'.png';
  if(empty($_SESSION['User']) && empty($_SESSION['id'])){ header("Location: ../index.php");}
  $query1 = mysqli_query($con,"select * from usuarios u inner join maestros m on(u.id_Usuario=m.id_Usuario) where m.id_Usuario=u.id_Usuario and u.id_Usuario=".$_SESSION['id']);
  $val = mysqli_fetch_array($query1);
  //Codigo agregado
  //Codigo para funcion todos los alumnos sin grupos, todos los que tiene
  if(isset($val['todo'])){
    $numero = strlen($val['todo']);
    $variable = $val['todo'];
    $variable1 = "";
    $auxPalabras = "";
    $cont = 0;
    $cont1 = 0;
    for($i=0; $i < $numero; $i++){
      if($variable[$i] == "*"){
        $contenidoDetodo[$cont]=$auxPalabras;
        $cont++;
        $auxPalabras = "";
      }else{
        $auxPalabras = $auxPalabras."".$variable[$i];
      } 
    }
    $auxPalabras = "";
    for($i=0; $i < $cont; $i++){ 
      $variable1 = $contenidoDetodo[$i];
      for($j=0; $j<strlen($contenidoDetodo[$i]); $j++){ 
        if($variable1[$j] == "|"){
          $datosR[$i][$cont1] = $auxPalabras;
          $cont1++;
          $auxPalabras = "";
        }else{
          $auxPalabras = $auxPalabras."".$variable1[$j];
        } 
      }
      $cont1 =0;
      $variable1 = "";
    }
    //Aqui ya con datos el arreglo datosR
    //esto mostrara a todos sus alumnos
    //Recordando que modalidad|clave|grado|grupo
    for($i=0; $i<$cont; $i++){ 
      $clave = $datosR[$i][1];
      $grado = $datosR[$i][2];
      $grupo = $datosR[$i][3];
      $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, a.id_Alumno,a.curpAlumno,a.Grado,a.Grupo FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.claveEscuela='$clave' and  a.Grado=$grado and a.Grupo='$grupo'");
            while ($row=mysqli_fetch_array($sql)){
              //Codigo para saber los expedientes existentes
                    $compara = $row['curpAlumno']."_";
                    $nombreDocu = array("".$compara."BG","".$compara."CP","".$compara."CU","".$compara."IMF","".$compara."IMD","".$compara."IPF","".$compara."IPD","".$compara."CD","".$compara."CM","".$compara."AN");
                    $complemento = "";
                    $aux1 = "f";
                    $aux2 = 0; 
                    $documentos = 10;
                    $directorio = opendir("../php/documentos/alumno/".$row['curpAlumno']."/"); //ruta actual
                    while($archivo = readdir($directorio)){
                      if (!is_dir($archivo)) {
                        $nombreArchivoC = nombreCadena($archivo);
                        $aux[$cont] = $nombreArchivoC;
                        $cont = $cont + 1;
                      }
                    }
                    for($i=0; $i<$documentos; $i++){ 
              for($j=0; $j<$documentos; $j++){
                if($nombreDocu[$i]==$aux[$j]){
                  $aux1=$aux[$j];
                  $caso = "si";
                  $complemento = $complemento."<td>"."*</td>";
                }
              }
              if($nombreDocu[$i]!=$aux1){
                $caso = "no";
                $complemento = $complemento."<td>"."x</td>";
              }
              }               
    //Acaba aqui
                $datosFinal = "".$datosFinal."<tr><td>num</td><td>".$row['Nom']." ".$row['Ap']." ".$row['Am']." </td><td>:".$grado."°</td><td>".$grupo."</td><td>".$clave."</td>".$complemento."</tr>\n";
            } 
    }
  }else{
    $datosFinal = "<p>queso</p>";
    echo "Orale no entra al primerooo";
  }
  //Codigo para funcion todos los alumnos sin grupos, todos los que tiene

  //Codigo agregado
  if(file_exists($archivo)){
    $image=$ruta.$_SESSION['id'].'.png';
  }else{
    $image=$ruta.'default.png';
  }

  ob_start();

  require_once("../php/librerias/lib/mpdf.php");

  $mpdf = new mPDF('c','A4');
  ob_clean();
  $css = '<style>'.file_get_contents('../php/librerias/PDF/style.css').'</style>';
  $mpdf->writeHTML($css,1);
  $mpdf->writeHTML('
  <style>
  #section-left .section .logo {
      background: url('.$image.');
    }

  </style>
  <body>
    <div id="section-left">
      <div class="">
        <table>
      <tr >
        <td rowspan="1" class="logo">
          <img src="../assets/images/logoZ.png"> 
        </td>
        <td colspan="3">
          <h2>Secretaria de educacion publica</h2>
          <h3>CORDINACION DE EDUCACION BASICA</h3>
          <h4>DIRECCION GENERAL DE EDUCACION SECUNDARIA</h4>
          <h4>DIRECCION DE EDUCACION TELESECUNDARIA</h4>
          <h5>SUPERVISION ESCOLAR DE TELESECUNDARIAS</h5>
          <h3>'.$val["Nom"].' '.$val["Ap"].'</h3>
          <span class="intro">'.$val["curpMaestro"].'</span> 
                <span class="num">Celular: '.$val["Celular"].'</span>
                <span class="num">Casa: '.$val["Casa"].'</span>
        </td>
        <td rowspan="1" class="logo">
          <img src="../assets/images/logoE.png"> 
        </td>
      </tr>
    </table>
    <!--Aqui empieza la tabla mejorada full power-->7
    <div class="">
      <h3>Titulo del informe</h3>
      <p>Nombre de la escuela: <span>tal</span>    Clave:<span>14DT</span>   Zona: <span>6</span></p>
      <p>Localidad: <span>tal</span>   Municipio: <span>Uno</span></p>
      <p>Maestr(a): <span>Jose</span></p>
      <p>Grado: <span>1</span>   Grupo: <span>B</span></p>
      <table border="1">
        <tr>
          <td>
            <p>Numero</p>
          </td>
          <td>
            <p>Nombre de alumno</p>
          </td>
          <td>
            <p>Grado</p>
          </td>
          <td>
            <p>Grupo</p>
          </td>
          <td>
            <p>Clave de centro de trabajo</p>
          </td>
          <td>
            <p>Doc1</p>
          </td>
          <td>
            <p>Doc2</p>
          </td>
          <td>
            <p>Doc3</p>
          </td>
          <td>
            <p>Doc4</p>
          </td>
          <td>
            <p>Doc5</p>
          </td>
          <td>
            <p>Doc6</p>
          </td>
          <td>
            <p>Doc7</p>
          </td>
          <td>
            <p>Doc8</p>
          </td>
          <td>
            <p>Doc9</p>
          </td>
          <td>
            <p>Doc10</p>
          </td>
        </tr>
        '.$datosFinal.'

      </table>
    </div>
    <!--Aqui acaba codigo agregado -->
    <div id="section-right">
      <div class="wrapper">
        <div class="section">
          <div class="title">
            <i class="fa fa-user" aria-hidden="true"></i>
            Lista de alumnos que toman clases contigo.
          </div>
          '.$datosFinal.'
        </div>
        </div>
      </div>
    </div>
  </body>');
  $mpdf->Output('../assets/Pdf/Prueba'.$val["id_Usuario"].'.pdf','F');

}elseif (isset($_POST['btn_SubmitpdfSexo'])) {
   $ruta='../assets/Profiles/';
  $archivo=$ruta.$_SESSION['id'].'.png';
  $totalNiñas = 0;
  $totalNiños = 0;
  if(empty($_SESSION['User']) && empty($_SESSION['id'])){ header("Location: ../index.php");}
  $query1 = mysqli_query($con,"select * from usuarios u inner join maestros m on(u.id_Usuario=m.id_Usuario) where m.id_Usuario=u.id_Usuario and u.id_Usuario=".$_SESSION['id']);
  $val = mysqli_fetch_array($query1);
  //Codigo agregado
  //Codigo para funcion todos los alumnos sin grupos, todos los que tiene
  if(isset($val['todo'])){
    $numero = strlen($val['todo']);
    $variable = $val['todo'];
    $variable1 = "";
    $auxPalabras = "";
    $cont = 0;
    $cont1 = 0;
    for($i=0; $i < $numero; $i++){
      if($variable[$i] == "*"){
        $contenidoDetodo[$cont]=$auxPalabras;
        $cont++;
        $auxPalabras = "";
      }else{
        $auxPalabras = $auxPalabras."".$variable[$i];
      } 
    }
    $auxPalabras = "";
    for($i=0; $i < $cont; $i++){ 
      $variable1 = $contenidoDetodo[$i];
      for($j=0; $j<strlen($contenidoDetodo[$i]); $j++){ 
        if($variable1[$j] == "|"){
          $datosR[$i][$cont1] = $auxPalabras;
          $cont1++;
          $auxPalabras = "";
        }else{
          $auxPalabras = $auxPalabras."".$variable1[$j];
        } 
      }
      $cont1 =0;
      $variable1 = "";
    }
    //Aqui ya con datos el arreglo datosR
    //esto mostrara a todos sus alumnos
    //Recordando que modalidad|clave|grado|grupo
    for($i=0; $i<$cont; $i++){ 
      $clave = $datosR[$i][1];
      $grado = $datosR[$i][2];
      $grupo = $datosR[$i][3];
      $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Sexo, u.Tipo, a.id_Alumno,a.curpAlumno,a.Grado,a.Grupo FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.claveEscuela='$clave' and  a.Grado=$grado and a.Grupo='$grupo'");
            while ($row=mysqli_fetch_array($sql)){
                if($row['Sexo'] == "Femenino"){
                  $totalNiñas++;
                  $complemento = "<td>Si</td><td>No</td>";
                }else{
                  $totalNiños++;
                  $complemento = "<td>No</td><td>Si</td>";
                }
                $datosFinal = "".$datosFinal."<tr><td>num</td><td>".$row['Nom']." ".$row['Ap']." ".$row['Am']." </td><td>:".$grado."°</td><td>".$grupo."</td><td>".$clave."</td>".$complemento."</tr>\n";
            } 
    }
  }else{
    $datosFinal = "<p>queso</p>";
    echo "Orale no entra al primerooo";
  }
  //Codigo para funcion todos los alumnos sin grupos, todos los que tiene

  //Codigo agregado
  if(file_exists($archivo)){
    $image=$ruta.$_SESSION['id'].'.png';
  }else{
    $image=$ruta.'default.png';
  }

  ob_start();

  require_once("../php/librerias/lib/mpdf.php");

  $mpdf = new mPDF('c','A4');
  ob_clean();
  $css = '<style>'.file_get_contents('../php/librerias/PDF/style.css').'</style>';
  $mpdf->writeHTML($css,1);
  $mpdf->writeHTML('
  <style>
  #section-left .section .logo {
      background: url('.$image.');
    }

  </style>
  <body>
    <div id="section-left">
      <div class="">
        <table>
      <tr >
        <td rowspan="1" class="logo">
          <img src="../assets/images/logoZ.png"> 
        </td>
        <td colspan="3">
          <h2>Secretaria de educacion publica</h2>
          <h3>CORDINACION DE EDUCACION BASICA</h3>
          <h4>DIRECCION GENERAL DE EDUCACION SECUNDARIA</h4>
          <h4>DIRECCION DE EDUCACION TELESECUNDARIA</h4>
          <h5>SUPERVISION ESCOLAR DE TELESECUNDARIAS</h5>
          <h3>'.$val["Nom"].' '.$val["Ap"].'</h3>
          <span class="intro">'.$val["curpMaestro"].'</span> 
                <span class="num">Celular: '.$val["Celular"].'</span>
                <span class="num">Casa: '.$val["Casa"].'</span>
        </td>
        <td rowspan="1" class="logo">
          <img src="../assets/images/logoE.png"> 
        </td>
      </tr>
    </table>
    <!--Aqui empieza la tabla mejorada full power-->7
    <div class="">
      <h3>Titulo del informe</h3>
      <p>Nombre de la escuela: <span>tal</span>    Clave:<span>14DT</span>   Zona: <span>6</span></p>
      <p>Localidad: <span>tal</span>   Municipio: <span>Uno</span></p>
      <p>Maestr(a): <span>Jose</span></p>
      <p>Grado: <span>1</span>   Grupo: <span>B</span></p>
      <table border="1">
        <tr>
          <td>
            <p>Numero</p>
          </td>
          <td>
            <p>Nombre de alumno</p>
          </td>
          <td>
            <p>Grado</p>
          </td>
          <td>
            <p>Grupo</p>
          </td>
          <td>
            <p>Clave de centro de trabajo</p>
          </td>
          <td>
            <p>Mujer</p>
          </td>
          <td>
            <p>Hombre</p>
          </td>
        '.$datosFinal.'
          <tr>
            <td colspan="2">
              <p>Total de mujeres: '.$totalNiñas.'</p>
            </td>
            <td colspan="2">
              <p>Total de Hombres: '.$totalNiños.'</p>
            </td>
            <td colspan="3">
              <p>Total de alumnos: '.($totalNiñas+$totalNiños).'</p>
            </td>
          </tr>
      </table>
    </div>
    <!--Aqui acaba codigo agregado -->
    <div id="section-right">
      <div class="wrapper">
        <div class="section">
          <div class="title">
            <i class="fa fa-user" aria-hidden="true"></i>
            Lista de alumnos que toman clases contigo.
          </div>
          '.$datosFinal.'
        </div>
        </div>
      </div>
    </div>
  </body>');
  $mpdf->Output('../assets/Pdf/Prueba'.$val["id_Usuario"].'.pdf','F');

}elseif(isset($_POST['btn_SubmitpdfMio'])) {
  $ruta='../assets/Profiles/';
  $archivo=$ruta.$_SESSION['id'].'.png';
  if(empty($_SESSION['User']) && empty($_SESSION['id'])){ header("Location: ../index.php");}
  $query1 = mysqli_query($con,"select * from usuarios u inner join maestros m on(u.id_Usuario=m.id_Usuario) where m.id_Usuario=u.id_Usuario and u.id_Usuario=".$_SESSION['id']);
  $val = mysqli_fetch_array($query1);
  //Codigo agregado
  //Codigo para funcion todos los alumnos sin grupos, todos los que tiene
  if(isset($val['todo'])){
    $numero = strlen($val['todo']);
    $variable = $val['todo'];
    $variable1 = "";
    $auxPalabras = "";
    $cont = 0;
    $cont1 = 0;
    for($i=0; $i < $numero; $i++){
      if($variable[$i] == "*"){
        $contenidoDetodo[$cont]=$auxPalabras;
        $cont++;
        $auxPalabras = "";
      }else{
        $auxPalabras = $auxPalabras."".$variable[$i];
      } 
    }
    $auxPalabras = "";
    for($i=0; $i < $cont; $i++){ 
      $variable1 = $contenidoDetodo[$i];
      for($j=0; $j<strlen($contenidoDetodo[$i]); $j++){ 
        if($variable1[$j] == "|"){
          $datosR[$i][$cont1] = $auxPalabras;
          $cont1++;
          $auxPalabras = "";
        }else{
          $auxPalabras = $auxPalabras."".$variable1[$j];
        } 
      }
      $cont1 =0;
      $variable1 = "";
    }
    //Aqui ya con datos el arreglo datosR
    //esto mostrara a todos sus alumnos
    //Recordando que modalidad|clave|grado|grupo
    for($i=0; $i<$cont; $i++){ 
      $clave = $datosR[$i][1];
      $grado = $datosR[$i][2];
      $grupo = $datosR[$i][3];
      $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Sexo, u.Tipo, a.id_Alumno,a.curpAlumno,a.Grado,a.Grupo FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.claveEscuela='$clave' and  a.Grado=$grado and a.Grupo='$grupo'");
            while ($row=mysqli_fetch_array($sql)){
                if($row['Sexo'] == "Femenino"){
                  $totalNiñas++;
                  $complemento = "<td>Si</td><td>No</td>";
                }else{
                  $totalNiños++;
                  $complemento = "<td>No</td><td>Si</td>";
                }
                $datosFinal = "".$datosFinal."<tr><td>num</td><td>".$row['Nom']." ".$row['Ap']." ".$row['Am']." </td><td>:".$grado."°</td><td>".$grupo."</td><td>".$clave."</td>".$complemento."</tr>\n";
            } 
    }
  }else{
    $datosFinal = "<p>queso</p>";
    echo "Orale no entra al primerooo";
  }
  //Codigo para funcion todos los alumnos sin grupos, todos los que tiene

  //Codigo agregado
  if(file_exists($archivo)){
    $image=$ruta.$_SESSION['id'].'.png';
  }else{
    $image=$ruta.'default.png';
  }

  ob_start();

  require_once("../php/librerias/lib/mpdf.php");

  $mpdf = new mPDF('c','A4');
  ob_clean();
  $css = '<style>'.file_get_contents('../php/librerias/PDF/style1.css').'</style>';
  $mpdf->writeHTML($css,1);
  $mpdf->writeHTML('
  <style>
  #section-left .section .logo {
      background: url('.$image.');
    }

  </style>
  <body>
    <div id="section-left">
      <div class="section intro">
        <div class="logo">
        <img src="">
        </div>
        <h3>'.$val["Nom"].' '.$val["Ap"].'</h3>
        <div class="content">
          <span class="dob">'.$val["Dia"].' '.$mes.' '.$val["Ano"].'</span>, '.$val["Edad"].' años <br>
          <span class="intro">'.$val["curpAlumno"].'</span> <br>
          <span class="title">'.$val["Sexo"].'</span>
        </div>
        <hr>
        <div id="contact">
          <span class="num">Celular: '.$val["Celular"].'</span><br>
            <span class="num">Casa: '.$val["Casa"].'</span>
          <div class="email">
            <i class="fa fa-envelope-open-o" aria-hidden="true"></i>
            '.$val["Correo"].'
          </div>
          <br>
          <br>
          <hr>
          <div class="web">
            <br>
            '.$val["Ciudad"].', '.$val["Estado"].', '.$val["Pais"].'.<br>
          </div>
        </div>
      </div>
    </div>
    <div id="section-right">
      <div class="wrapper">
        <div class="section">
          <div class="title">
            <i class="fa fa-user" aria-hidden="true"></i>
            Perfil
          </div>
          <p>'.$_POST["Perfil"].'</p>
        </div>
        </div>
      </div>
    </div>
  </body>');
  $mpdf->Output('../assets/Pdf/Prueba'.$val["id_Usuario"].'.pdf','F');

}

?>
*/

?>
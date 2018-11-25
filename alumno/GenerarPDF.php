<?php

if (isset($_POST['btn_Submitpdf'])){
    session_start();
  $ruta='../assets/Profiles/';
  $archivo=$ruta.$_SESSION['id'].'.png';
  include '../php/Conexion.php';
  if(empty($_SESSION['User']) && empty($_SESSION['id'])){ header("Location: ../index.php");}
  $query1 = mysqli_query($con,"select * from usuarios u inner join alumnos a on(u.id_Usuario=a.id_Usuario) inner join zona z on(u.claveEscuela=z.clave) where a.id_Usuario=u.id_Usuario and u.id_Usuario=".$_SESSION['id']);
  $val = mysqli_fetch_array($query1);
  if(file_exists($archivo)){
    $image=$ruta.$_SESSION['id'].'.png';
  }else{
    $image=$ruta.'default.png';
  }
  if($val["Mes"]==1){
    $mes="Enero";
  }else if($val["Mes"]==2){
    $mes="Febrero";
  }else if($val["Mes"]==3){
    $mes="Marzo";
  }else if($val["Mes"]==4){
    $mes="Abril";
  }else if($val["Mes"]==5){
    $mes="Mayo";
  }else if($val["Mes"]==6){
    $mes="Junio";
  }else if($val["Mes"]==7){
    $mes="Julio";
  }else if($val["Mes"]==8){
    $mes="Agosto";
  }else if($val["Mes"]==9){
    $mes="Septiembre";
  }else if($val["Mes"]==10){
    $mes="Octubre";
  }else if($val["Mes"]==11){
    $mes="Noviembre";
  }else if($val["Mes"]==12){
    $mes="Diciembre";
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
      <div class="section intro">
        <div class="logo"></div>
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

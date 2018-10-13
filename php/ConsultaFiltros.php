<?php
  include ("Conexion.php");
  session_start();
  $Grupos = array("A","B","C","D","E","F","G","todos");
  //Consultar Usuarios
  if(isset($_POST['tipoC']) && $_POST['tipoC']=="Consulta" && $_POST['tipoU']=="Alumno"){
    if($_POST['GradoU']=="1"){
      for($i=0; $i<=6; $i++){
        if($Grupos[$i]==$_POST['GrupoU']){
          if($_POST['GrupoU']=="todos"){
            $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, a.id_Alumno,a.curpAlumno,a.Grupo FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  a.Grado=$_POST[GradoU] and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/estudiante.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 1°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
          }else{
              $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, a.id_Alumno,a.curpAlumno,a.Grupo FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  a.Grado=$_POST[GradoU] and a.Grupo='$_POST[GrupoU]' and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/estudiante.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 1°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
          }
          
        }
      }
    }elseif ($_POST['GradoU'] == "2") {
      for($i=0; $i<=6; $i++){
        if($Grupos[$i]==$_POST['GrupoU']){
          if($_POST['GrupoU']=="todos"){
            $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, a.id_Alumno,a.curpAlumno,a.Grupo FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  a.Grado=$_POST[GradoU] and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/estudiante.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 2°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
          }else{
              $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, a.id_Alumno,a.curpAlumno,a.Grupo FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  a.Grado=$_POST[GradoU] and a.Grupo='$_POST[GrupoU]' and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/estudiante.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 2°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
          }
          
        }
      }
    }elseif ($_POST['GradoU']=="3") {
      for($i=0; $i<=6; $i++){
        if($Grupos[$i]==$_POST['GrupoU']){
          if($_POST['GrupoU']=="todos"){
            $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, a.id_Alumno,a.curpAlumno,a.Grupo FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  a.Grado=$_POST[GradoU] and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/estudiante.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 3°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
          }else{
              $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, a.id_Alumno,a.curpAlumno,a.Grupo FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  a.Grado=$_POST[GradoU] and a.Grupo='$_POST[GrupoU]' and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/estudiante.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 3°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
          }
          
        }
      }
    }elseif($_POST['GradoU']=="todos") {
      $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, a.id_Alumno,a.curpAlumno,a.Grupo,a.Grado FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario) WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/estudiante.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> '.$row['Grado'].'° '.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
    }else{
      $sql = mysqli_query($con,"select Tipo,Nom,Ap,Am,u.id_Usuario,Tipo from usuarios u where Nom like '$_POST[busqueda]%' limit 0,6");
      $cambio="";
      while ($row=mysqli_fetch_array($sql)){
        if ($row['Tipo']=="Alumno") {
        $cambio="estudiante.png";
        }elseif ($row['Tipo']=="Maestro") {
          $cambio="maestro.png";
        }elseif ($row['Tipo']=="PersonalA") {
          $cambio="perso.png";
        }
        else{
          $cambio="candidato.png";
        }
      echo '<div class="col-sm-4 align-items-center">
            <div class="thumbnail">
              <a  class="img-fluid thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');">
                <img class="img-fluid" src="../assets/images/'.$cambio.'" height="70px" width="70px">
              </a>
              <div class="caption">
                <h3>'.$row['Nom'].'</h3>
                <p><a onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod" class="btn btn-primary" role="button">Consultar!</a>
              </div>
            </div>
          </div>';
      }
    }
  }elseif(isset($_POST['tipoC']) && $_POST['tipoC']=="Consulta" && $_POST['tipoU']=="PersonalA"){
    if($_POST['GradoU']=="Intendencia"){
      $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, pe.id_Personal,pe.curpAdmi FROM usuarios AS u INNER JOIN personaladmi AS pe ON (pe.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  Nom like '$_POST[busqueda]%' limit 0,6");
      while ($row=mysqli_fetch_array($sql)){
        echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/estudiante.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 1°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
      }
    }elseif ($_POST['GradoU'] == "administrativo") {
        $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, pe.id_Personal,pe.curpAdmi FROM usuarios AS u INNER JOIN personaladmi AS pe ON (pe.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  Nom like '$_POST[busqueda]%' limit 0,6");
      while ($row=mysqli_fetch_array($sql)){
        echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/estudiante.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 1°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
      }
    }elseif ($_POST['GradoU']=="docente") {
      $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, pe.id_Personal,pe.curpAdmi FROM usuarios AS u INNER JOIN personaladmi AS pe ON (pe.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  Nom like '$_POST[busqueda]%' limit 0,6");
      while ($row=mysqli_fetch_array($sql)){
        echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/estudiante.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 1°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
      }
    }elseif($_POST['GradoU']=="todos") {
      $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, pe.id_Personal,pe.curpAdmi FROM usuarios AS u INNER JOIN personaladmi AS pe ON (pe.id_Usuario=u.id_Usuario) WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/estudiante.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> '.$row['Grado'].'° '.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
    }else{
      $sql = mysqli_query($con,"select Tipo,Nom,Ap,Am,u.id_Usuario,Tipo from usuarios u where Nom like '$_POST[busqueda]%' limit 0,6");
      $cambio="";
      while ($row=mysqli_fetch_array($sql)){
        if ($row['Tipo']=="Alumno") {
        $cambio="estudiante.png";
        }elseif ($row['Tipo']=="Maestro") {
          $cambio="maestro.png";
        }elseif ($row['Tipo']=="PersonalA") {
          $cambio="perso.png";
        }
        else{
          $cambio="candidato.png";
        }
      echo '<div class="col-sm-4 align-items-center">
            <div class="thumbnail">
              <a  class="img-fluid thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');">
                <img class="img-fluid" src="../assets/images/'.$cambio.'" height="70px" width="70px">
              </a>
              <div class="caption">
                <h3>'.$row['Nom'].'</h3>
                <p><a onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod" class="btn btn-primary" role="button">Consultar!</a>
              </div>
            </div>
          </div>';
      }
    }
  }elseif(isset($_POST['tipoC']) && $_POST['tipoC']=="Consulta" && $_POST['tipoU']=="Maestro"){
    if($_POST['GradoU']=="1"){
      for($i=0; $i<=6; $i++){
        if($Grupos[$i]==$_POST['GrupoU']){
          if($_POST['GrupoU']=="todos"){
            $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, m.id_Maestro,m.curpMaestro,m.Grupo FROM usuarios AS u INNER JOIN maestros AS m ON (m.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  m.Grado=$_POST[GradoU] and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/maestro.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 1°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
          }else{
              $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, m.id_Maestro,m.curpMaestro,m.Grupo FROM usuarios AS u INNER JOIN maestros AS m ON (m.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  m.Grado=$_POST[GradoU] and m.Grupo='$_POST[GrupoU]' and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/maestro.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 1°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
          }
          
        }
      }
    }elseif ($_POST['GradoU'] == "2") {
      for($i=0; $i<=6; $i++){
        if($Grupos[$i]==$_POST['GrupoU']){
          if($_POST['GrupoU']=="todos"){
            $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, m.id_Maestro,m.curpMaestro,m.Grupo FROM usuarios AS u INNER JOIN maestros AS m ON (m.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  m.Grado=$_POST[GradoU] and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/maestro.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 2°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
          }else{
              $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, m.id_Maestro,m.curpMaestro,m.Grupo FROM usuarios AS u INNER JOIN maestros AS m ON (m.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  m.Grado=$_POST[GradoU] and m.Grupo='$_POST[GrupoU]' and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/maestro.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 2°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
          }
          
        }
      }
    }elseif ($_POST['GradoU']=="3") {
      for($i=0; $i<=6; $i++){
        if($Grupos[$i]==$_POST['GrupoU']){
          if($_POST['GrupoU']=="todos"){
            $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, m.id_Maestro,m.curpMaestro,m.Grupo FROM usuarios AS u INNER JOIN maestros AS m ON (m.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  m.Grado=$_POST[GradoU] and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/maestro.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 3°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
          }else{
              $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, m.id_Maestro,m.curpMaestro,m.Grupo FROM usuarios AS u INNER JOIN maestros AS m ON (m.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  m.Grado=$_POST[GradoU] and m.Grupo='$_POST[GrupoU]' and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/maestro.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 3°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
          }
          
        }
      }
    }elseif($_POST['GradoU']=="todos") {
      $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, m.id_Maestro,m.curpMaestro,m.Grupo,m.Grado FROM usuarios AS u INNER JOIN maestros AS m ON (m.id_Usuario=u.id_Usuario) WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/maestro.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> '.$row['Grado'].'° '.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
    }else{
      $sql = mysqli_query($con,"select Tipo,Nom,Ap,Am,u.id_Usuario,Tipo from usuarios u where Nom like '$_POST[busqueda]%' limit 0,6");
      $cambio="";
      while ($row=mysqli_fetch_array($sql)){
        if ($row['Tipo']=="Alumno") {
        $cambio="estudiante.png";
        }elseif ($row['Tipo']=="Maestro") {
          $cambio="maestro.png";
        }elseif ($row['Tipo']=="PersonalA") {
          $cambio="perso.png";
        }
        else{
          $cambio="candidato.png";
        }
      echo '<div class="col-sm-4 align-items-center">
            <div class="thumbnail">
              <a  class="img-fluid thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');">
                <img class="img-fluid" src="../assets/images/'.$cambio.'" height="70px" width="70px">
              </a>
              <div class="caption">
                <h3>'.$row['Nom'].'</h3>
                <p><a onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod" class="btn btn-primary" role="button">Consultar!</a>
              </div>
            </div>
          </div>';
      }
    }
  }
  //Aqui empieza eliminar por parte del maestro y director y supervisor
  //Eliminar Alumno por grado////////
  elseif(isset($_POST['tipoC']) && $_POST['tipoC']=="Eliminar" && $_POST['tipoU']=="Alumno"){
    if($_POST['GradoU']=="1"){
      for($i=0; $i<=6; $i++){
        if($Grupos[$i]==$_POST['GrupoU']){
          if($_POST['GrupoU']=="todos"){
            $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, a.id_Alumno,a.curpAlumno,a.Grupo FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  a.Grado=$_POST[GradoU] and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return mensajeAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/estudiante.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 1°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
          }else{
              $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, a.id_Alumno,a.curpAlumno,a.Grupo FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  a.Grado=$_POST[GradoU] and a.Grupo='$_POST[GrupoU]' and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return mensajeAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/estudiante.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 1°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
          }
          
        }
      }
    }elseif ($_POST['GradoU'] == "2") {
      for($i=0; $i<=6; $i++){
        if($Grupos[$i]==$_POST['GrupoU']){
          if($_POST['GrupoU']=="todos"){
            $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, a.id_Alumno,a.curpAlumno,a.Grupo FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  a.Grado=$_POST[GradoU] and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return mensajeAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/estudiante.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 2°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
          }else{
              $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, a.id_Alumno,a.curpAlumno,a.Grupo FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  a.Grado=$_POST[GradoU] and a.Grupo='$_POST[GrupoU]' and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return mensajeAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/estudiante.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 2°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
          }
          
        }
      }
    }elseif ($_POST['GradoU']=="3") {
      for($i=0; $i<=6; $i++){
        if($Grupos[$i]==$_POST['GrupoU']){
          if($_POST['GrupoU']=="todos"){
            $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, a.id_Alumno,a.curpAlumno,a.Grupo FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  a.Grado=$_POST[GradoU] and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return mensajeAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/estudiante.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 3°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
          }else{
              $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, a.id_Alumno,a.curpAlumno,a.Grupo FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and  a.Grado=$_POST[GradoU] and a.Grupo='$_POST[GrupoU]' and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return mensajeAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/estudiante.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> 3°'.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
          }
          
        }
      }
    }elseif($_POST['GradoU']=="todos") {
      $sql = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.Tipo, a.id_Alumno,a.curpAlumno,a.Grupo,a.Grado FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario) WHERE u.Tipo='$_POST[tipoU]' and u.claveEscuela='$_POST[claveEscuela1]' and Nom like '$_POST[busqueda]%' limit 0,6");
              while ($row=mysqli_fetch_array($sql)){
              echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return mensajeAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
              <img src="../assets/images/estudiante.png" height="70px" width="70px">
                 <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
                 <p align=center> '.$row['Grado'].'° '.$row['Grupo'].'</p>
                 </a> </div>
                ';
              }
    }else{
      $sql = mysqli_query($con,"select Tipo,Nom,Ap,Am,u.id_Usuario,Tipo from usuarios u where Nom like '$_POST[busqueda]%' limit 0,6");
      $cambio="";
      while ($row=mysqli_fetch_array($sql)){
        if ($row['Tipo']=="Alumno") {
        $cambio="estudiante.png";
        }elseif ($row['Tipo']=="Maestro") {
          $cambio="maestro.png";
        }elseif ($row['Tipo']=="PersonalA") {
          $cambio="perso.png";
        }
        else{
          $cambio="candidato.png";
        }
      echo '<div class="col-sm-4 align-items-center">
            <div class="thumbnail">
              <a  class="img-fluid thumbnail" onclick="return mensajeAdmin('.$row['id_Usuario'].');">
                <img class="img-fluid" src="../assets/images/'.$cambio.'" height="70px" width="70px">
              </a>
              <div class="caption">
                <h3>'.$row['Nom'].'</h3>
                <p><a onclick="return mensajeAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod" class="btn btn-primary" role="button">Consultar!</a>
              </div>
            </div>
          </div>';
      }
    }
  }
 ?>
<?php
  include ("Conexion.php");
  session_start();
  //Consultar Usuarios
  if(isset($_POST['tipo']) && $_POST['tipo']=="Consultar" && $_POST['tipoC']=="Administrador"){
    if($_POST['filtro']=="Alumno"){
      $sql = mysqli_query($con,"select Nom,Ap,Am,u.id_Usuario,Tipo from usuarios u where Tipo='$_POST[filtro]' and Nom like '$_POST[busqueda]%' limit 0,6");
      while ($row=mysqli_fetch_array($sql)){
      echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
      <img src="../assets/images/estudiante.png" height="70px" width="70px">
         <h5 align=center> '.$row['Nom'].' '.$row['Ap'].'</h5>
         </a> </div>
        ';
      }
    }elseif ($_POST['filtro'] == "Maestro") {
      $sql = mysqli_query($con,"select Nom,Ap,Am,u.id_Usuario,Tipo from usuarios u where Tipo='$_POST[filtro]' and Nom like '$_POST[busqueda]%' limit 0,6");
      while ($row=mysqli_fetch_array($sql)){
      echo  '<div class="col-sm-4"> <a  class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
      <img src="../assets/images/maestro.png" height="70px" width="70px">
         <h5 align=center> '.$row['Nom'].' '.$row['Ap'].' </h5>
         </a> </div>';
      }
    }elseif ($_POST['filtro']=="PersonalA") {
      $sql = mysqli_query($con,"select Nom,Ap,Am,u.id_Usuario,Tipo from usuarios u where Tipo='$_POST[filtro]' and Nom like '$_POST[busqueda]%' limit 0,6");
      while ($row=mysqli_fetch_array($sql)){
      echo  '<div class="col-sm-4"> <a  class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
      <img src="../assets/images/perso.png" height="70px" width="70px">
         <h5 align=center> '.$row['Nom'].' '.$row['Ap'].' </h5>
         </a> </div>';
      }
    }elseif ($_POST['filtro']=="Materia") {
      $sql = mysqli_query($con,"select Nom,Ap,Am,u.id_Usuario,Tipo from usuarios u where Tipo='$_POST[filtro]' and Nom like '$_POST[busqueda]%' limit 0,6");
      while ($row=mysqli_fetch_array($sql)){
      echo  '<div class="col-sm-4"> <a  class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
      <img src="../assets/images/materia.png" height="70px" width="70px">
         <h5 align=center> '.$row['Nom'].' '.$row['Ap'].' </h5>
         </a> </div>';
      }
    }
    else{
      $sql = mysqli_query($con,"select Tipo,Nom,Ap,Am,id_Usuario from usuarios where not Tipo='Administrador' and Nom like '$_POST[busqueda]%' limit 0,6");
      $cambio="";
      while ($row=mysqli_fetch_array($sql)){
        if ($row['Tipo']=="Alumno") {
        $cambio="estudiante.png";
        }elseif ($row['Tipo']=="Maestro") {
          $cambio="maestro.png";
        }elseif ($row['Tipo']=="PersonalA") {
          $cambio="perso.png";
        }elseif ($row['Tipo']=="Director") {
          $cambio="maestro.png";
        }elseif ($row['Tipo']=="Supervisor") {
          $cambio="maestro.png";
        }
        else{
          $cambio="candidato.png";
        }

      echo '<div class="col-sm-4 align-items-center">
            <div class="thumbnail">
              <a  class="img-fluid thumbnail" onclick="return MostrarConsultarAdminL('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
                <img class="img-fluid" src="../assets/images/'.$cambio.'" height="70px" width="70px">
              </a>
              <div class="caption">
                <h4>'.$row['Nom'].'</h4>
                <p><a onclick="return MostrarConsultarAdminL('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod" class="btn btn-primary" role="button">Consultar!</a>
              </div>
            </div>
          </div>';
      }
    }
    //Eliminar empleos
    }elseif (isset($_POST['tipo']) && $_POST['tipo']=="Eliminar" && $_POST['tipoC']=="Administrador") {
      $sql = mysqli_query($con,"select Tipo,Nom,Ap,Am,id_Usuario from usuarios where not Tipo='Administrador' and Nom like '$_POST[busqueda]%' limit 0,6");
      $cambio="";
      while ($row=mysqli_fetch_array($sql)){
        if ($row['Tipo']=="Alumno") {
        $cambio="estudiante.png";
        }elseif ($row['Tipo']=="Maestro") {
          $cambio="maestro.png";
        }elseif ($row['Tipo']=="PersonalA") {
          $cambio="perso.png";
        }elseif ($row['Tipo']=="Director") {
          $cambio = "maestro.png";
        }
      echo '<div class="col-sm-4">
            <div class="thumbnail">
              <a  class="img-fluid thumbnail" onclick="return mensajeAdmin('.$row['id_Usuario'].');">
                <img src="../assets/images/'.$cambio.'" height="70px" width="70px">
              </a>
              <div class="caption">
                <h4>'.$row['Nom'].'</h4>
                <p><a onclick="return mensajeAdmin('.$row['id_Usuario'].');" class="btn btn-primary" role="button">Eliminar!</a>
              </div>
            </div>
          </div>';
      }
    }
 ?>
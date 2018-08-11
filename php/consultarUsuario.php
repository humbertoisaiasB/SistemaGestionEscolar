<?php
  include ("Conexion.php");
  session_start();
  //Consultar Usuarios
  if(isset($_POST['tipo']) && $_POST['tipo']=="Consultar" && $_POST['tipoC']=="Administrador"){
    if($_POST['filtro']=="Alumno"){
      $sql = mysqli_query($con,"select Nom,Ap,Am,u.id_Usuario,Tipo from usuarios u where Tipo='$_POST[filtro]' and Nom like '$_POST[busqueda]%' limit 0,6");
      while ($row=mysqli_fetch_array($sql)){
      $_SESSION['alu'] = $VARIABLE_HOST;
      $_SESSION['alu'] = $row['id_Usuario'];
      echo  '<div class="col-sm-4"><a class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
      <img src="../assets/images/estudiante.png" height="70px" width="70px">
         <h5 align=center> '.$row['Nom'].'  </h5>
         </a> </div>
        ';
      }
    }elseif ($_POST['filtro'] == "Maestro") {
      $sql = mysqli_query($con,"select Nom,Ap,Am,u.id_Usuario,Tipo from usuarios u where Tipo='$_POST[filtro]' and Nom like '$_POST[busqueda]%' limit 0,6");
      while ($row=mysqli_fetch_array($sql)){
      echo  '<div class="col-sm-4"> <a  class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
      <img src="../assets/images/maestro.png" height="70px" width="70px">
         <h5 align=center> '.$row['Nom'].'  </h5>
         </a> </div>';
      }
    }elseif ($_POST['filtro']=="PersonalA") {
      $sql = mysqli_query($con,"select Nom,Ap,Am,u.id_Usuario,Tipo from usuarios u where Tipo='$_POST[filtro]' and Nom like '$_POST[busqueda]%' limit 0,6");
      while ($row=mysqli_fetch_array($sql)){
      echo  '<div class="col-sm-4"> <a  class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
      <img src="../assets/images/perso.png" height="70px" width="70px">
         <h5 align=center> '.$row['Nom'].'  </h5>
         </a> </div>';
      }
    }elseif ($_POST['filtro']=="Materia") {
      $sql = mysqli_query($con,"select Nom,Ap,Am,u.id_Usuario,Tipo from usuarios u where Tipo='$_POST[filtro]' and Nom like '$_POST[busqueda]%' limit 0,6");
      while ($row=mysqli_fetch_array($sql)){
      echo  '<div class="col-sm-4"> <a  class="thumbnail" onclick="return MostrarModalConsultarAdmin('.$row['id_Usuario'].');" data-toggle="modal" href="#Mod">
      <img src="../assets/images/materia.png" height="70px" width="70px">
         <h5 align=center> '.$row['Nom'].'  </h5>
         </a> </div>';
      }
    }
    else{
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
    //Eliminar empleos
    }elseif (isset($_POST['tipo']) && $_POST['tipo']=="Eliminar" && $_POST['tipoC']=="Administrador") {
      $sql = mysqli_query($con,"select Tipo,Nom,Ap,Am,u.id_Usuario,Tipo from usuarios u where Nom like '$_POST[busqueda]%' limit 0,6");
      $cambio="";
      while ($row=mysqli_fetch_array($sql)){
        if ($row['Tipo']=="Empresa") {
        $cambio="empresa1.png";
        }elseif ($row['Tipo']=="Empleador") {
          $cambio="empleador.png";
        }else{
          $cambio="candidato.png";
        }
      echo '<div class="col-sm-4">
            <div class="thumbnail">
              <a  class="img-fluid thumbnail" onclick="mensajeAdminE('.$row['id_Usuario'].');">
                <img src="../assets/images/'.$cambio.'" height="70px" width="70px">
              </a>
              <div class="caption">
                <h3>'.$row['Nom'].'</h3>
                <p><a onclick="mensajeAdminE('.$row['id_Usuario'].');" class="btn btn-primary" role="button">Eliminar!</a>
              </div>
            </div>
          </div>';
      }
    }
    // ---------------------------------------- Aqui va empleos
    elseif (isset($_POST['tipo']) && $_POST['tipo']=="EliminarE" && $_POST['tipoC']=="Administrador") {
      $sql = mysqli_query($con,"select e.id_Empleo,e.Puesto,e.Turno,emp.id_Empresa, u.Nom, u.Pais, u.Estado, u.Ciudad, u.Colonia, u.Calle
        FROM empresa AS emp
        INNER JOIN  empleador AS em ON ( emp.id_Empresa= em.id_Empresa )
        INNER JOIN empleo AS e ON ( em.id_Empleador= e.id_Empleador )
        INNER JOIN usuarios AS u ON ( emp.id_Usuario=u.id_Usuario ) WHERE emp.id_Empresa=em.id_Empresa and e.Puesto LIKE '$_POST[busqueda]%'");
      while ($row=mysqli_fetch_array($sql)){
      echo '<div class="col-sm-4">
            <div class="thumbnail">
              <a  class="img-fluid thumbnail" onclick="return EmpleosA1('.$row['id_Empleo'].','."'Eliminar'".')">
                <img src="../assets/images/Jobs.png" height="70px" width="70px">
              </a>
              <div class="caption">
                <h3>'.$row['Puesto'].'</h3>
                <p><a onclick="return EmpleosA1('.$row['id_Empleo'].','."'Eliminar'".')" class="btn btn-primary" role="button">Consultar!</a>
              </div>
            </div>
          </div>';

      }
    }
 ?>
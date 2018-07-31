<?php
  include ("Conexion.php");
  session_start();
  $ruta='../assets/Profiles/';
  $asd = mysqli_query($con,"select Nom,Ap,Am,u.id_Usuario from usuarios u,empleador ed,empresa e where e.id_Usuario=".$_SESSION['id']." and e.id_Empresa=ed.id_Empresa and u.id_Usuario=ed.id_Usuario and Nom like '$_POST[input]%'");
  if(mysqli_num_rows($asd)>1){
    while ($row = mysqli_fetch_array($asd)) {
      $archivo=$ruta.$row['id_Usuario'].'.png';
      echo '<div class="col-md-4" style="word-wrap:break-word";>';
      echo '<a onclick="return MostrarModalUpdate('.$row['id_Usuario'].');" data-toggle="modal" data-target="#Mod" class="thumbnail">';
       if (file_exists($archivo)){
      echo '<img src="'.$archivo.'"  width="180px" height="100px" requeride><p>'.$row['Nom'].' '.$row['Ap'].' '.$row['Am'].'</p></a>';
    }else{
         echo '<img src="'.$ruta.'user.png"  width="180px" height="100px"><p>'.$row['Nom'].' '.$row['Ap'].' '.$row['Am'].'</p></a>';
    }
      echo '</div>';
    }
  }else if(mysqli_num_rows($asd)==1){
    $row = mysqli_fetch_array($asd);
    echo '<div class="col-md-4" style="word-wrap:break-word";>';
    echo '<a onclick="return MostrarModalUpdate('.$row['id_Usuario'].');" data-toggle="modal" data-target="#Mod" href="#" class="thumbnail">';
     if (file_exists($archivo)){
      echo '<img src="'.$archivo.'"  width="180px" height="100px" requeride><p>'.$row['Nom'].' '.$row['Ap'].' '.$row['Am'].'</p></a>';
    }else{
         echo '<img src="'.$ruta.'user.png"  width="180px" height="100px"><p>'.$row['Nom'].' '.$row['Ap'].' '.$row['Am'].'</p></a>';
    }
    echo '</div>';
  }
 ?>

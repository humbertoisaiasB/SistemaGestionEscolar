<?php
  include 'Conexion.php';
  session_start();
  $query1 = mysqli_query($con,"select u.id_Usuario, u.Nom, u.Ap, u.Am, u.claveEscuela, a.id_Alumno, a.curpAlumno, u.Documento FROM usuarios AS u INNER JOIN alumnos AS a ON (a.id_Usuario=u.id_Usuario)WHERE u.id_Usuario=".$_POST['nombreN']." && u.id_Usuario=a.id_Usuario");
      $val = mysqli_fetch_array($query1);
  $_SESSION['nombreD'] = $val['curpAlumno']."_Tarea_".$_POST['materia']."_".$_POST['nombreFinal'];

?>
<div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  >&times;</button>
                <h4 class="modal-title">Subir archivo de <?php echo $val['Nom']." ".$val['Ap']." ".$val['Am']; ?></h4> 
              </div>
              <div class="modal-body" align="center">
                  <h3><b><?php echo $_POST['nombreFinal'];?></b></h3>
                  <img  src="../assets/images/Like.png" class="img-rounded" width=200px height=200px >
              </div>
              <div class="modal-footer" align="center">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="../php/interSube.php"></iframe>
                </div>
              </div>
            </div>
          </div>;
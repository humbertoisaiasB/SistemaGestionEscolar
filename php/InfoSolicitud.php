<?php 
	include 'Conexion.php';
	$sql=mysqli_query($con,"SELECT * from usuarios WHERE id_Usuario=".$_POST['id_Usuario']);
	$row=mysqli_fetch_array($sql);
	echo '<div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"  >&times;</button>
        <h4 class="modal-title">'.$row['Ap'].' </h4> 
      </div>
      <div class="modal-body" align=center>
      		<h3><b>Estoy Interesado</b> </h3>
          	<img  src="../assets/images/Like.png" class="img-rounded" width=200px height=200px >

      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-info" >Ver PDF</button>
        <button type="button" class="btn btn-success" data-toggle="modal"  >Agendar</button>
        <button type="button" class="btn btn-danger" >Rechazar</button>
      </div>
    </div>

  </div>';
?>
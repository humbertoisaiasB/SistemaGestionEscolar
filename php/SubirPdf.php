<?php
	include 'Conexion.php';
	session_start();
	$sql = mysqli_query($con,'select u.id_Usuario, u.Nom,u.Ap,u.Am from usuarios as u where u.id_Usuario='.$_SESSION['id'].'');
	$row = mysqli_fetch_array($sql);
	//if($_POST['con'] == "uno"){
	if($_POST['accion']=="subeA"){
		//Las variable s aqui representadas son las indicadas para un parte de cadaq modal.
	    $arriba = '<button type="button" class="close" data-dismiss="modal"  >&times;</button>
	        <h4 class="modal-title">Subir archivo de '.$row['Nom'].' '.$row['Ap'].' '.$row['Am'].'.</h4> ';
	    $cuerpo = '<h3><b>'.$_POST['archivo'].'</b></h3>
	          <img  src="../assets/images/Like.png" class="img-rounded" width=200px height=200px >';
	    $abajo = '<div class="embed-responsive embed-responsive-16by9">
	                <iframe class="embed-responsive-item" src="../php/interSube.php"></iframe>
	              </div>';	    
        modalC($arriba,$cuerpo,$abajo);
	}
	elseif($_POST['accion']=="subirArchivoYa") {
		echo '<script type="text/javascript">
          swal("Buen Trabajo!", "archivo bien!", "success");
      </script>';
      	//if(isset($_POST['subir'])){
			$var1 = 'txt_Documento';
			$var2 = 'alumno';
			echo $_POST['curp'];
			echo $_POST['archivo'];
			$var3 = $_POST['curp'];
			$var4 = $_POST['archivo'];
			subir($var1,$var2,$var3,$var4);    
		//}
	}
	  //La funcion modalC sera un molde
	function modalC($cabeza,$cuerpo,$abajo){
	    echo    '<div class="modal-dialog modal-md">
	                <!-- Modal content-->
	                <div class="modal-content">
	                  <div class="modal-header">
	                      '.$cabeza.'
	                  </div>
	                  <div class="modal-body" align=center>
	                    '.$cuerpo.'
	                  </div>
	                  <div class="modal-footer">
	                    '.$abajo.'
	                  </div>
	                </div>
	            </div>';
	}
?>
<?php
	include 'Conexion.php';
	//$sql = mysqli_query($con,"select u.id_Usuario,a.curpAlumno from alumnno as a, usuario as u where id_Usuario='$_POST[id_Busqueda]'");
	//$row = mysqli_fetch_array($sql);
	//if($_POST['con'] == "uno"){
	if($_POST['accion']=="subeA"){
		//Las variable s aqui representadas son las indicadas para un parte de cadaq modal.
	    $arriba = '<button type="button" class="close" data-dismiss="modal"  >&times;</button>
	        <h4 class="modal-title">Subir archivo de .</h4> ';
	    $cuerpo = '<h3><b>hola</b></h3>
	          <p>hola</p>
	          <p>'.$_SERVER['PHP_SELF'].'</p>
	          <p>'.$_POST['clave'].'</p>
	          <p>'.$_POST['archivo'].'</p>
	          <img  src="../assets/images/Like.png" class="img-rounded" width=200px height=200px >';
	    $abajo = '<div id="div_Documento">
	    				<form action="../php/subirYmoverArchivos.php" method="POST" enctype="multipart/form-data">
		                  <label>Seleciona un documento:</label><input id="txt_Documento" onfocus="validacion4all(/[a-zA-Z0-9-.]/,'."'".'Documento'."'".',this.value);" type="file" class="form-control" name="txt_Documento"><span id="span_Documento"></span>
                    	<input class="btn btn-primary" type="submit" onclick="return subirT('."'".''.$_POST['archivo'].''."'".','."'".''."subirArchivoYa".''."'".','."'".''.$_POST['clave'].''."'".');" name="subir" id="subir">Subir</input>
                    	</form>
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
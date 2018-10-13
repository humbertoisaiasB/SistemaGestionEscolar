<?php  
$archivo="".$_POST['ruta'];
header('Content-Description: File Transfer');
header("Content-Length: " . filesize ($archivo) ); 
header("Content-type: application/octet-stream"); 
header("Content-disposition: attachment; filename=".basename($archivo));
readfile($archivo);
echo  '<div class="alert alert-success" role="alert">
      					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	 					<strong>¡Cuidado!</strong> Descarga hecha.
      			   </div>';
?>
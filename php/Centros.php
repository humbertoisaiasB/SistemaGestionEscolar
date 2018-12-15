<?php  
include "Conexion.php";
	echo "Queso";
?>
<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="text-align:center;">Agrega la modalidad de tu centro de trabajo</h4>
    </div>
    <div class="modal-body">
<div id="div_ZonaMaestro" class="row">
			<div class="col-2">
				<label>Escoje la modalidad de tu centro de trabajo.</label>
				<div class="btn-group btn-lg" role="group">
					<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Modalidad
					<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a onclick="return agregaZonas('Tecnicas','#zonasAgregadas');">Tecnicas</a></li>
						<li><a onclick="return agregaZonas('General','#zonasAgregadas');">Generales</a></li>
						<li><a onclick="return agregaZonas('Telesecundaria','#zonasAgregadas');">Telesecundarias</a></li>
					</ul>
				</div>
				<div id="zonasAgregadas">
					
				</div>
			</div>
		</div>
     </div>
  </div>
</div>
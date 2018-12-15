	<div id="div_ZonaMaestro" class="row">
		<label style="margin: 5px;" id="tipoModalidad"></label>Tipo de Modalidad:<span style="margin:10px;font-size: 15px;" id="Modalidad" name="prueba13M" class="label label-info"><?php echo $_POST['modalidad']."";?></span><input type="hidden" id="prueba13EM" name="prueba13EM" value="">
		<div class="col-2">
			<div class="btn-group btn-lg" role="group">
				<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Zona escolar
				<span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<?php
						for($i=1; $i<=54; $i++){
							echo '<li value="'.$i.'"><a onclick="return zonaRD('.$i.','."'".''."Maestro".''."'".','."'"."#zonaYM"."'".','."'".$_POST['modalidad']."'".');">'.$i.'</a></li>';
						}
					?>
				</ul>
			</div>
			<div id="claveM" style="display: inline-flex; margin-bottom: 3px; margin: 5px;">
		<label style="margin: 5px;" id="clavecitaCM"></label><span style="margin:10px;font-size: 15px;" id="prueba13M" name="prueba13M" class="label label-info"></span><input type="hidden" id="prueba13EM" name="prueba13EM" value="">
			</div>
		</div>
		<div id="zonaYM"></div>
		<div>
			
		</div>
	</div>
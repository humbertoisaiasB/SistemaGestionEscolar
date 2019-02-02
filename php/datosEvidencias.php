<?php
  include ("Conexion.php");
  session_start();
  $hoy = getdate(); //La gecha
  $Materia = "'".$_POST['materia']."'";
 ?>
<div id="div_NombreEvidencia">
  <label>Agrega un nombre a la evidencia</label><input id="txt_NombreEvidencia" onkeypress="return validarXD(alphaxd,this.value.length,100);" onkeyup="validacion4all(/[a-zA-Z0-9]{3,50}/,'NombreEvidencia',this.value); type="text" class="form-control" name="txt_NombreEvidencia" id="txt_NombreEvidencia" required><span id="span_NombreEvidencia" ></span>
  <div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>¡Atención!</strong> Usted podrá agregar una descripción de su evidencia menor a 50 caracteres.
  </div>
</div>
<div id="div_DescripcionEvidencia">
  <label>Agrega una descripcion:</label><input id="txt_DescripcionEvidencia" onkeypress="return validarXD(alphaxd,this.value.length,100);" onkeyup="validacion4all(/[a-zA-Z0-9]{3,50}/,'DescripcionEvidencia',this.value);" type="text" class="form-control" name="txt_DescripcionEvidencia"><span id="span_DescripcionEvidencia" ></span>
  <div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>¡Atención!</strong> Usted podrá agregar una descripción de su evidencia menor a 50 caracteres.
  </div>
</div>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>¡Cuidado!</strong> <?php echo "Usted agregará la evidencia el día: $hoy[weekday], $hoy[mday]/$hoy[month]/$hoy[year]. Alas $hoy[hours]:$hoy[minutes]:$hoy[seconds].";?>
</div>
<button class="btn btn-success" data-toggle="modal" href="#Mod" onclick="return subirEvidencias(<?php echo $_POST['aux'];?>,<?php echo $Materia;?>);">¡Subir archivo!</button>
<div id="div_Fecha">
  
</div>
<?php
include("Conexion.php");
session_start();
$asd = mysqli_query($con,"select * from usuarios u,empleador ed,empresa e where e.id_Usuario=".$_SESSION['id']." and e.id_Empresa=ed.id_Empresa and u.id_Usuario=ed.id_Usuario and u.id_Usuario='$_POST[info]'");
$row = mysqli_fetch_array($asd);
$_SESSION['EmpleadorID']=$_POST['info'];
?>
<script type="text/javascript" src="../assets/JS/MyJS.js"></script>
<div class="modal-dialog modal-md">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="text-align:center;">Modificar información</h4>
    </div>
    <div class="modal-body">
  <font size="4"></font>
  <form action="../php/UpdateEmpleador.php" method="POST">

      <div id="div_NomEmpleador1">
        <label>Nombre:</label><input id="txt_NomEmpleador1" onkeypress="return validarXD(/^[a-zA-Z.\s]*$/,this.value.length,25);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'NomEmpleador1',this.value);NomValid(this);" type="text" class="form-control" name="txt_Nom1" value="<?php echo $row['Nom']; ?>"><span id="span_NomEmpleador1"></span>
      </div>
      <div id="div_Ap1">
        <label>Apellido paterno:</label><input id="txt_Ap1" onkeypress="return validarXD(/^[a-zA-Z.\s]*$/,this.value.length,10);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'Ap1',this.value);NomValid(this);" type="text" class="form-control"  name="txt_Ap1" value="<?php echo $row['Ap']; ?>"><span id="span_Ap1" ></span>
      </div>
      <div id="div_Am1">
        <label>Apellido materno:</label><input id="txt_Am1" onkeypress="return validarXD(/^[a-zA-Z.\s]*$/,this.value.length,10);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'Am1',this.value);NomValid(this);" type="text" class="form-control" name="txt_Am1" value="<?php echo $row['Am']; ?>"><span id="span_Am1" ></span>
      </div>
      <div id="div_Teltrabajo1" >
        <label>Teléfono de trabajo: </label><input input id="txt_Teltrabajo1" onkeypress="return validarXD(numeric,this.value.length,8);"  onkeyup="validacion4all(/^[0-9]{6,8}$/,'Teltrabajo1',this.value);" type="text" class="form-control" name="txt_Teltrabajo1" value="<?php echo $row['Trabajo']; ?>"><span id="span_Teltrabajo1" ></span>
      </div>
      <div id="div_Telcelular1">
        <label>Teléfono celular:</label><input input id="txt_Telcelular1" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/,'Telcelular1',this.value);" type="text" class="form-control" name="txt_Telcelular1" value="<?php echo $row['Celular']; ?>"><span id="span_Telcelular1" ></span>
      </div>
      <div id="div_CorreoEmpleador1">
        <label>Correo:</label><input id="txt_Correo1" onkeyup="validacion4all(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/,'CorreoEmpleador1',this.value);"  onkeypress="return validarXD(helo,this.value.length,30);" type="email" class="form-control" name="txt_Correo1" required value="<?php echo $row['Correo']; ?>"><span id="span_CorreoEmpleador1" ></span>
      </div>
        <div id="div_Departamento1">
          <label>Departamento:</label><input id="txt_Departamento1" onkeypress="return validarXD(/^[a-zA-Z\s]*$/,this.value.length,30);" onkeyup="validacion4all(/[a-zA-Z]{4,}/,'Departamento1',this.value);NomValid(this);" type="text" class="form-control" name="txt_Departamento1" required value="<?php echo $row['Departamento']; ?>"><span id="span_Departamento1" ></span>
        </div>
        <div id="div_CP1">
          <label>Código Postal:</label><input id="txt_CP1" onkeypress="return validarXD(numeric,this.value.length,5);" onkeyup="validacion4all(/^\d{4,5}$/,'CP1',this.value); return codigoEmp('../php/PostalEmp.php','txt_CP1','#ModificarE'); " onblur="checkCP1(this.value);"  type="text" class="form-control" name="txt_CP1" value="<?php echo $row['Codigo_Postal']; ?>"><span id="span_CP1" ></span>
        </div>
    <div id="ModificarE">
                  <label for="Sl_Pais">País:</label>
                  <select class="form-control" name="Sl_Pais" >
                  <option>México</option>  </select>
                  <label for="Sl_Estado">Estado:</label>
                  <select class="form-control" name="Sl_Estado" >
                  <option> <?php echo utf8_encode($row['Estado']); ?></option>
                  </select>
                  <label for="Sl_Ciudad">Ciudad:</label>
                  <select class="form-control" name="Sl_Ciudad" >
                  <option><?php echo $row['Ciudad']; ?></option>
                  </select>
                  <label for="Sl_Colonia">Colonia/Fraccionamiento:</label>
                  <select class="form-control" name="Sl_Colonia">
                  <option><?php echo $row['Colonia']; ?></option>
                  </select>
              </div>
      <div id="div_Calle1">
        <label>Calle:</label><input id="txt_Calle1" onkeyup="validacion4all(/[0-9a-zA-Z]{5,}/,'Calle1',this.value);" onkeypress="return validarXD(/^[a-zA-Z.\s]*$/,this.value.length,30);NomValid(this);" type="text" class="form-control" name="txt_Calle1" required value="<?php echo $row['Calle']; ?>"><span id="span_Calle1"></span>
      </div>
        <div id="div_Psw1">
          <label>Contraseña:</label><input id="txt_Psw1" type="text" class="form-control" name="txt_Psw1" value="<?php echo $row['Contrasena']; ?>"><span id="span_Psw1" ></span>
        </div>
        <div id="div_Psw21">
          <label>Repite Contraseña:</label><input id="txt_Psw21" onkeyup="checkPw1(this.value);" onblur="checkPw1(this.value);" type="text" class="form-control" name="txt_Psw21"><br><span id="span_Psw21" ></span>
        </div>
      <br>
      <p align="center"><input type="submit" class="btn btn-success" value="Modificar empleador" name="btn_updateEmpleador"></p>
</form>
     </div>
  </div>
</div>

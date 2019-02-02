<?php
  
 ?>
 <div class="principal">
    <div class="wrap">
      <form class="formulario" action="">
        <?php
          if($_POST['tipoU'] == "Alumno"  || $_POST['tipoU'] == "Director" && $_POST['modalidad'] == "Telesecundaria" || $_POST['caso'] == "si"){
        ?>
        <input type="text" id="nombreEscuela" hidden>
        <h4>Ingresa los grupos a tu cargo</h4>
        <div style="display:block;margin:10px;">
          <div id="div_S_Grado<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px; ">
            <label for="S_Grado<?php echo $_POST['tipoU'];?>">Grado:</label>
            <select class="form-control" name="S_Grado<?php echo $_POST['tipoU'];?>" id="S_Grado<?php echo $_POST['tipoU'];?>">
              <option value="1">1°</option>
              <option value="2">2°</option>
              <option value="3">3°</option>
            </select>
          </div>
          <div id="div_S_Grupo<?php echo $_POST['tipoU'];?>" style="display: inline-block;margin: 20px;">
            <label for="S_Grupo<?php echo $_POST['tipoU'];?>">Grupo:</label>
            <select class="form-control" name="S_Grupo<?php echo $_POST['tipoU'];?>" id="S_Grupo<?php echo $_POST['tipoU'];?>">
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
              <option value="E">E</option>
              <option value="F">F</option>
              <option value="G">G</option>
            </select>
          </div>
        </div>
        <?php  
        }else{
          echo "";}
        ?>
        <input type="button" class="btn btn-primary" id="btn-agregar<?php echo $_POST['tipoU'];?>" value="Agregar">
      </form>
    </div>
    <script src="assets/JS/main1.js"></script>
  </div>  
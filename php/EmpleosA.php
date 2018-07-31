<?php 
	include 'Conexion.php';
	$sql=mysqli_query($con,"select * from empleo where id_Empleo=".$_POST['empleo'] );
	$row=mysqli_fetch_array($sql);
	if(isset($_POST['tipo']) && $_POST['tipo']=="Consultar"){
		echo '<script type="text/javascript">
	          swal("'.$row['Puesto'].'", "Fecha: '.$row['Dia'].'/'.$row['Mes'].'/'.$row['Ano'].'\n Puestos Disponibles: '.$row['Puestos_dis'].'\n Sueldo: '.$row['Sueldo'].'\n Turno: '.$row['Turno'].'\n Descripción: '.$row['Descripcion'].' ");
	      </script>';
  	}if(isset($_POST['tipo']) && $_POST['tipo']=="Modificar"){ ?>
  			<div class="panel panel-info">
                      <div class="panel-heading">Modificar Empleo</div>
                      <div class="panel-body">
                          <form action="../php/UpdateEmpleo.php" method="POST">
                                <div id="div_Puesto">
                                  <label>Puesto:</label><input id="txt_puesto" type="text" class="form-control" name="txt_puesto" value="<?php echo $row['Puesto']; ?> " ><span id="" ></span>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                    <label>Puestos Disponibles:</label>
                                    <select class="form-control" id="" name="sl_PuestosD" onmousedown="if(this.options.length>5){this.size=5;}" onchange="this.blur()" onblur="this.size=0;">
                                    <?php for($var=1; $var<=50; $var++){
                                    	if($row['Puestos_dis']==$var ){
                                        echo "<option selected>".$var." </option>";
                                    	}else{
                                    		echo "<option >".$var." </option>";
                                    	}
                                      }?>
                                    </select></div>
                                    <div class="col-sm-6">
                                      <label>Turno:</label>
                                    <select class="form-control" id="" name="sl_Turno" >
                                        <option <?php if($row['Turno']=='Matutino')print "selected";  ?> > Matutino</option>
                                        <option <?php if($row['Turno']=='Vespertino')print "selected";  ?>>Vespertino</option>
                                    </select></div>
                                </div>
                                <input type="hidden" name="Num" value="<?php print $row['id_Empleo']; ?>"/>
                                <label>Sueldo:</label>
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                  <input id="txt_Sueldo" type="text" class="form-control" name="txt_Sueldo" value="<?php print $row['Sueldo']; ?> ">
                                </div>
                                  <div id="div_descripcion" >
                                  <label>Descripción: </label><textarea class="form-control" rows="4" id="txt_Desc" name="txt_Desc" ><?php print $row['Descripcion'];?></textarea><span id="" ></span>
                                </div>
                                <br>
                                <p align="center"><input type="submit" class="btn btn-info" value="Modificar Empleo" name="btn_Empleo"></p>
                          </form>
                      </div>
                    </div>

  	<?php } if(isset($_POST['tipo']) && $_POST['tipo']=="Eliminar"){
  		echo '<script type="text/javascript">
  			swal({
				  title: "Estás Seguro?",
				  text: "No podrás revertir los cambios!",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	DeleteEmpleo('.$row['id_Empleo'].');
				    swal("Poof! Empleo Eliminado !", {
				      icon: "success",
				    });
				  } else {
				    swal("Empleo no eliminado!");
				  }
				});
			</script>';
  		}
?>

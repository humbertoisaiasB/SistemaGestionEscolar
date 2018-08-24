<?php
	$cont = 1;
  if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$_POST['txt_Correo']) ){
    $cont=$cont-1;
  }
/*
	$cont=7;
	if(preg_match('/[0-9a-zA-Z]{3,}/',$_POST['txt_Nom']) ){
		$cont=$cont-1;
	}
	if(preg_match('/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/',$_POST['txt_Tel']) ){
		$cont=$cont-1;
	}
	if(preg_match('/^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))((-)?([A-Z\d]{3}))?$/',$_POST['txt_RFC']) ){
		$cont=$cont-1;
	}

	if(preg_match('/^\d{4,5}$/',$_POST['txt_CP']) ){
		$cont=$cont-1;
	}
	if(preg_match('/[0-9a-zA-Z]{5,}/',$_POST['txt_Calle']) ){
		$cont=$cont-1;
	}
	if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$_POST['txt_Correo']) ){
		$cont=$cont-1;
	}
	if($_POST['txt_Psw']==$_POST['txt_Psw2'] ){
		$cont=$cont-1;
	}
	*/
	//$cont=0;

	if($cont==0){
		echo '<p align="center"><input type="submit" class="btn btn-success" value="Registrarme" name="btn_Empresa"></p>';
	}else{
		echo '<p align="center"><button type="button" class="btn btn-danger" onmousemove="return validar();">Check</button>';
	}
?>

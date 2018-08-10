<?php session_start();
      session_unset();
      session_destroy();?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/Home.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		 	<link rel="stylesheet" href="assets/css/foot.css">
      <script type="text/javascript" src="assets/bootstrap/js/jquery-3.1.1.js" ></script>
      <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
			<link rel="stylesheet" href="assets/css/Mycss.css">
			<script type="text/javascript" src="assets/JS/MyJS.js"></script>
	<title>Registrarme</title>
	<style media="screen">
		span{
			margin-top:8px;
		}
	</style>
</head>
<body class="site" onload="return validar(); return validar2(); return validar3();" >
	<header>
		<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" style="color:white !important;" href="index.php">Gestion</a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
							</ul>
							<ul class="nav navbar-nav navbar-right ">
								<li><a style="color:white !important;" href="index.php">Inicio</a></li>
								<li> <a style="color:white !important;"  data-toggle="modal" data-target="#Mod"><i class="fa fa-user"></i> Iniciar sesión</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
		</nav>
	</header>
	<main class="content">
		<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 align="center">Registro</h1>
							<div class="alert alert-dismissable alert-info">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4>Info!</h4> <strong>Seleciona el tipo de usuario que eres!</strong> <br>
										<strong>Alumno: </strong>Ingresa como un alumno<br>
										<strong>Personal Administrativo: Ingrese como personal auxiliar del plantel</strong>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<ul class="nav nav-pills">
								<li onload="return validar();" class="active"><a href="#alumno" data-toggle="tab">Alumno</a></li>
								<li onload="return validar2();"><a href="#maestro" onclick="return validar2();" data-toggle="tab">Maestro</a></li>
								<li onload="return validar3();"><a href="#PersonalA" data-toggle="tab" onclick="return validar3();">Personal Administrativo</a></li><!--Aqui nos falta el atributo de validar-->
								<li ><a href="#PersonalApo" data-toggle="tab">Personal Apoyo</a></li><!--Aqui nos falta el atributo de validar-->
								<li ><a href="#director" data-toggle="tab">Director</a></li>
							</ul>
						</div>
					</div>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="alumno" >
								<div class="row">
									<div class="col-md-2"></div>
									  <div class="col-md-8"><br>
										<div class="panel panel-success">
											<div class="panel-heading">
												<h3 class="panel-title">
													Registro Alumno
												</h3>
											</div>
											<div class="panel-body">
												<!-- Aqui tenemos que empresa desaparecera y ahora sera alumnos-->
												<form  action="php/AddEmpresa.php" method="POST">
													<div id="div_NomCandidato">
														<label>Nombre:</label><input id="txt_NomCandidato" onkeypress="return validarXD(alphaxd,this.value.length,20);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'NomCandidato',this.value);NomValid(this);"  type="text" class="form-control" name="txt_Nom"><span id="span_NomCandidato" ></span>
													</div>
													<div id="div_Ap">
														<label>Apellido paterno:</label><input id="txt_Ap" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'Ap',this.value);NomValid(this);" type="text" class="form-control"  name="txt_Ap"><span id="span_Ap" ></span>
													</div>
													<div id="div_Am">
														<label>Apellido materno:</label><input id="txt_Am" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'Am',this.value);NomValid(this);" type="text" class="form-control" name="txt_Am"><span id="span_Am" ></span>
													</div>
													<div id="div_CorreoCandidato">
														<label>Correo:</label><input id="txt_CorreoCan" onkeypress="return validarXD(helo,this.value.length,30);" onkeyup="validacion4all(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/,'CorreoCandidato',this.value);" type="email" class="form-control" name="txt_Correo" required><span id="span_CorreoCandidato" ></span>
													</div>
													<div id="div_ClaveEscolar">
														<label>Clave de la escuela de residencia:</label><input id="txt_ClaveEscolar" onkeypress="return validarXD(helo,this.value.length,30);" onkeyup="validacion4all(/^[_a-z0-9-]*$/,'ClaveEscolar',this.value);" type="texto" class="form-control" name="txt_ClaveEscolar" required><span id="span_ClaveEscolar" ></span>
													</div>
														<div style="display:block;margin-top:20px;">
															<div id="div_Telcasa" style="display: inline-block;">
																<label style="margin-right:5px;">Teléfono casa: </label><input input id="txt_Telcasa" onkeypress="return validarXD(numeric,this.value.length,8);" onkeyup="validacion4all(/^[0-9]{6,8}$/,'Telcasa',this.value);" type="text" style="min-width:230px" class="form-control" name="txt_Telcasa"><span id="span_Telcasa" ></span>
															</div>
															<div id="div_Telcelular" style="display:inline-block;">
																<label>Teléfono celular:</label><input input id="txt_Telcelular" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/,'Telcelular',this.value);" style="min-width:230px;" type="text" class="form-control" name="txt_Telcelular"><span id="span_Telcelular" ></span>
															</div>
														</div>

													<div id="div_Curp">
															<label>Curp del Alumno:</label><input id="txt_Curp" onkeyup="validacion4all(/[A-Za-z]{4}[0-9]{6}[Hh,Mm][A-Za-z]{5}[0-9]{2}/,'Curp',this.value);" onkeypress="return validateCurp(this.value.length);" style="text-transform: uppercase" type="text" class="form-control" name="txt_Curp"><span id="span_Curp" ></span>
														</div>
														<label for="Sl_Sexo">Sexo:</label>
															<select class="form-control" name="Sl_Sexo">
																<option>Masculino</option>
																<option>Femenino</option>
															</select>
																<p style="margin-top:20px;"> <label> Fecha de nacimiento:</label><br>
																	<label style="" for="Sl_Dia">Dia:</label>
																	<select style="width:130px; display:inline-block;" class="form-control" name="Sl_Dia">
																			<?php
																			for ($i = 1; $i <= 31; $i++) {
																				echo "<option value=".$i.">$i</option>";
																			}
																			 ?>
																		</select>
																		<label style="margin-left:5%;" for="Sl_Mes">Mes:</label>
																		<select style="width:130px; display:inline-block;" class="form-control" name="Sl_Mes">
																			<?php
																				for ($i = 1; $i <= 12; $i++) {
																					echo "<option value=".$i.">$i</option>";
																				}
																			 ?>
																			</select>
																		<label style="margin-left:5%;" for="Sl_Anio">Año:</label>
																		<select style="width:130px; display:inline-block;" class="form-control" name="Sl_Anio">
																			<?php
																			for ($i = 1940; $i <= 2018; $i++) {
																				echo "<option value=".$i.">$i</option>";
																			}
																			 ?>
																		</select>
																</p>
																<div id="div_CPCan">
																	<label>Código Postal:</label><input id="txt_CPCan" onkeypress="return validarXD(numeric,this.value.length,5);" onkeyup="validacion4all(/^\d{4,5}$/,'CPCan',this.value); return codigoCan();"  type="text" class="form-control" name="txt_CP" required><span id="span_CPCan" ></span>
																</div>
															<div id="codigoC"></div>
															<div id="div_CalleCan">
																<label>Calle:</label><input id="txt_CalleCan" onkeypress="return validarXD(alphaxd,this.value.length,25);" onkeyup="validacion4all(/[0-9a-zA-Z]{5,}/,'CalleCan',this.value);NomValid(this);"  type="text" class="form-control" name="txt_Calle" required><span id="span_CalleCan"></span>
															</div>
															<!-- Aqui se sale de lo normal de usuario aqui es modificar para cada uno de los actores. -->
															<div style="display:block;margin-top:20px;">
															<div id="div_Grupo" style="display: inline-block;">
																<label style="margin-right:5px;">Ingresa tu grupo: </label><input input id="txt_Grupo" onkeypress="return validarXD(alphaxd,this.value.length,2);" onkeyup="validacion4all(/^[A-Z]{0,1}$/,'Grupo',this.value);" type="text" style="min-width:230px" class="form-control" name="txt_Grupo"><span id="span_Grupo" ></span>
															</div>
															<div id="div_Grado" style="
															display:inline-block;">
																<label>Ingresa tu grado:</label><input input id="txt_Grado" onkeypress="return validarXD(numeric,this.value.length,2);" onkeyup="validacion4all(/^[0-9]{0,1}$/,'Grado',this.value);" style="min-width:230px;" type="text" class="form-control" name="txt_Grado"><span id="span_Grado" ></span>
															</div>
														</div>
															<div id="div_nomPapa">
																<label>Nombre del papá:</label><input id="txt_nomPapa" onkeypress="return validarXD(alphaxd,this.value.length,20);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'NomPapa',this.value);NomValid(this);"  type="text" class="form-control" name="txt_nomPapa"><span id="span_nomPapa" ></span>
															</div>
															<div id="div_apPapa">
																<label>Apellido paterno:</label><input id="txt_apPapa" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'apPapa',this.value);NomValid(this);" type="text" class="form-control"  name="txt_apPapa"><span id="span_apPapa" ></span>
															</div>
															<div id="div_amPapa">
																<label>Apellido materno:</label><input id="txt_amPapa" onkeypress="return validarXD(alphaxd,this.value.length,11);"  onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'amPapa',this.value);NomValid(this);" type="text" class="form-control" name="txt_amPapa"><span id="span_AmPapa" ></span>
															</div>
															<div id="div_curpPapa">
																<label>Curp del papá</label><input id="txt_curpPapa" onkeyup="validacion4all(/[A-Za-z]{4}[0-9]{6}[Hh,Mm][A-Za-z]{5}[0-9]{2}/,'curpPapa',this.value);" onkeypress="return validateCurp(this.value.length);" style="text-transform: uppercase" type="text" class="form-control" name="txt_curpPapa"><span id="span_curpPapa" ></span>
															</div>
															<div id="div_telPapa" style="display: inline-block;">
																<label style="margin-right:5px;">Teléfono casa: </label><input input id="txt_telPapa" onkeypress="return validarXD(numeric,this.value.length,8);" onkeyup="validacion4all(/^[0-9]{6,8}$/,'telPapa',this.value);" type="text" style="min-width:230px" class="form-control" name="txt_telPapa"><span id="span_telPapa" ></span>
															</div>
															<div id="div_nomMama">
																<label>Nombre de la mamá:</label><input id="txt_nomMama" onkeypress="return validarXD(alphaxd,this.value.length,20);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'nomMama',this.value);NomValid(this);"  type="text" class="form-control" name="txt_nomMama"><span id="span_nomPapa" ></span>
															</div>
															<div id="div_apMama">
																<label>Apellido paterno de la mamá</label><input id="txt_apMama" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'apMama',this.value);NomValid(this);" type="text" class="form-control"  name="txt_apMama"><span id="span_apMama" ></span>
															</div>
															<div id="div_amMama">
																<label>Apellido materno de la mamá:</label><input id="txt_amMama" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'amMama',this.value);NomValid(this);" type="text" class="form-control" name="txt_amMama"><span id="span_amMama" ></span>
															</div>
															<div id="div_curpMama">
																<label>Curp de la mamá</label><input id="txt_curpMama" onkeyup="validacion4all(/[A-Za-z]{4}[0-9]{6}[Hh,Mm][A-Za-z]{5}[0-9]{2}/,'curpMama',this.value);" onkeypress="return validateCurp(this.value.length);" style="text-transform: uppercase" type="text" class="form-control" name="txt_curpMama"><span id="span_curpMama" ></span>
															</div>
															<div id="div_telMama" style="display: inline-block;">
																<label style="margin-right:5px;">Teléfono casa: </label><input input id="txt_telMama" onkeypress="return validarXD(numeric,this.value.length,8);" onkeyup="validacion4all(/^[0-9]{6,8}$/,'telMama',this.value);" type="text" style="min-width:230px" class="form-control" name="txt_telMama"><span id="span_telMama" ></span>
															</div>
																<div id="div_Psw">
																	<label>Contraseña:</label><input id="txt_Psw" type="password" class="form-control" name="txt_Psw" required><span id="span_Psw" ></span>
																</div>
																<div id="div_Psw2">
																	<label>Repite Contraseña:</label><input id="txt_Psw2" onkeyup="checkPwCan(this.value);" type="password" class="form-control" name="txt_Psw2" required><br><span id="span_Psw2" ></span>
																</div>
                                <div id="btn">
								</div>
									 			</form>
											</div>
										</div>
									  </div>
								</div>
							</div>
							<div class="tab-pane fade" id="maestro" >
								<div class="row">
									<div class="col-md-2"></div>
										<div class="col-md-8"><br>
										<div class="panel panel-success">
											<div class="panel-heading">
												<h3 class="panel-title">
													Registro de maestro.
												</h3>
											</div>
											<div class="panel-body">
												<form  action="php/AddCandidato.php" method="POST">
													<div id="div_NomMaestro">
														<label>Nombre:</label><input id="txt_NomMaestro" onkeypress="return validarXD(alphaxd,this.value.length,20);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'NomMaestro',this.value);NomValid(this);"  type="text" class="form-control" name="txt_NomMaestro"><span id="span_NomMaestro" ></span>
													</div>
													<div id="div_ApMaestro">
														<label>Apellido paterno:</label><input id="txt_ApMaestro" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'ApMaestro',this.value);NomValid(this);" type="text" class="form-control"  name="txt_ApMaestro"><span id="span_ApMaestro" ></span>
													</div>
													<div id="div_AmMaestro">
														<label>Apellido materno:</label><input id="txt_AmMaestro" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'AmMaestro',this.value);NomValid(this);" type="text" class="form-control" name="txt_AmMaestro"><span id="span_AmMaestro" ></span>
													</div>
													<div id="div_CorreoMaestro">
														<label>Correo:</label><input id="txt_CorreoMaestro" onkeypress="return validarXD(helo,this.value.length,30);" onkeyup="validacion4all(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/,'CorreoMaestro',this.value);" type="email" class="form-control" name="txt_CorreoMaestro" required><span id="span_CorreoMaestro" ></span>
													</div>
													<div id="div_ClaveEscolarMaestro">
														<label>Clave de la escuela de residencia:</label><input id="txt_ClaveEscolarMaestro" onkeypress="return validarXD(helo,this.value.length,30);" onkeyup="validacion4all(/^[_a-z0-9-]*$/,'ClaveEscolarMaestro',this.value);" type="texto" class="form-control" name="txt_ClaveEscolarMaestro" required><span id="span_ClaveEscolarMaestro" ></span>
													</div>
														<div style="display:block;margin-top:20px;">
															<div id="div_TelcasaMaestro" style="display: inline-block;">
																<label style="margin-right:5px;">Teléfono casa: </label><input input id="txt_TelcasaMaestro" onkeypress="return validarXD(numeric,this.value.length,8);" onkeyup="validacion4all(/^[0-9]{6,8}$/,'TelcasaMaestro',this.value);" type="text" style="min-width:230px" class="form-control" name="txt_TelcasaMaestro"><span id="span_TelcasaMaestro" ></span>
															</div>
															<div id="div_TelcelularMaestro" style="display:inline-block;">
																<label>Teléfono celular:</label><input input id="txt_TelcelularMaestro" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/,'TelcelularMaestro',this.value);" style="min-width:230px;" type="text" class="form-control" name="txt_TelcelularMaestro"><span id="span_TelcelularMaestro" ></span>
															</div>
														</div>
														<div id="div_CurpMaestro">
															<label>Curp del Maestro:</label><input id="txt_CurpMaestro" onkeyup="validacion4all(/[A-Za-z]{4}[0-9]{6}[Hh,Mm][A-Za-z]{5}[0-9]{2}/,'CurpMaestro',this.value);" onkeypress="return validateCurp(this.value.length);" style="text-transform: uppercase" type="text" class="form-control" name="txt_CurpMaestro"><span id="span_CurpMaestro" ></span>
														</div>
														<label for="Sl_SexoMaestro">Sexo:</label>
															<select class="form-control" name="Sl_SexoMaestro">
																<option>Masculino</option>
																<option>Femenino</option>
															</select>
																<p style="margin-top:20px;"> <label> Fecha de nacimiento:</label><br>
																	<label style="" for="Sl_DiaMaestro">Dia:</label>
																	<select style="width:130px; display:inline-block;" class="form-control" name="Sl_DiaMaestro">
																			<?php
																			for ($i = 1; $i <= 31; $i++) {
																				echo "<option value=".$i.">$i</option>";
																			}
																			 ?>
																		</select>
																		<label style="margin-left:5%;" for="Sl_MesMaestro">Mes:</label>
																		<select style="width:130px; display:inline-block;" class="form-control" name="Sl_MesMaestro">
																			<?php
																				for ($i = 1; $i <= 12; $i++) {
																					echo "<option value=".$i.">$i</option>";
																				}
																			 ?>
																			</select>
																		<label style="margin-left:5%;" for="Sl_Anio">Año:</label>
																		<select style="width:130px; display:inline-block;" class="form-control" name="Sl_Anio">
																			<?php
																			for ($i = 1940; $i <= 2018; $i++) {
																				echo "<option value=".$i.">$i</option>";
																			}
																			 ?>
																		</select>
																</p>
																<div id="div_CPCanMaestro">
																	<label>Código Postal:</label><input id="txt_CPCanMaestro" onkeypress="return validarXD(numeric,this.value.length,5);" onkeyup="validacion4all(/^\d{4,5}$/,'CPCanMaestro',this.value); return codigoCan();"  type="text" class="form-control" name="txt_CPCanMaestro" required><span id="span_CPCanMaestro" ></span>
																</div>
															<div id="codigoCMaestro"></div>
															<div id="div_CalleCanMaestro">
																<label>Calle:</label><input id="txt_CalleCanMaestro" onkeypress="return validarXD(alphaxd,this.value.length,25);" onkeyup="validacion4all(/[0-9a-zA-Z]{5,}/,'CalleCan',this.value);NomValid(this);"  type="text" class="form-control" name="txt_Calle" required><span id="span_CalleCan"></span>
															</div>
															<!--Aqui comienza el registro con los de mas atribuytos de maestro -->
																<div id="div_ClavePresupuestal">
																	<label>Introdusca su clave presupuestal:</label><input type="text" name="txt_ClavePresupuestal" class="form-control" id="txt_ClavePresupuestal"><span id="span_ClavePresupuestal"></span>
																</div>

																<div id="div_rfc">
																	<label>Introdusca su rfc:</label><input id="txt_rfc" type="text" class="form-control" name="txt_rfc"><span id="span_rfc" ></span>
																</div>
																<div id="div_Funcion">
																	<label>Funcion en escuela:</label><input id="txt_Funcion" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'Funcion',this.value);NomValid(this);" type="text" class="form-control" name="txt_Funcion"><span id="span_Funcion" ></span>
																</div>
																<div id="div_PswCanMaestro">
																	<label>Contraseña:</label><input id="txt_PswCanMaestro" type="password" class="form-control" name="txt_Psw" required><span id="span_PswCan" ></span>
																</div>
																<div id="div_Psw2CanMaestro">
																	<label>Repite Contraseña:</label><input id="txt_Psw2CanMaestro" onkeyup="checkPwCan(this.value);" type="password" class="form-control" name="txt_Psw2CanMaestro" required><br><span id="span_Psw2CanMaestro" ></span>
																</div>
                                <div id="btnCan">
                                </div>
    												</form>
											</div>
										</div>
										</div>
								</div>
							</div>
							<div class="tab-pane fade" id="PersonalA" >
								<div class="row">
									<div class="col-md-2"></div>
										<div class="col-md-8"><br>
										<div class="panel panel-success">
											<div class="panel-heading">
												<h3 class="panel-title">
													Registro Personal Administrativo.
												</h3>
											</div>
											<div class="panel-body">
												<form  action="php/AddMaestro.php" method="POST">
													<!-- Aqui em pieza de maestro-->
													<div id="div_nomAdmi">
														<label>Nombre:</label><input id="txt_nomAdmi" onkeypress="return validarXD(alphaxd,this.value.length,20);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'nomAdmi',this.value);NomValid(this);"  type="text" class="form-control" name="txt_nomAdmi"><span id="span_nomAdmi"></span>
													</div>
													<div id="div_ApAdmi">
														<label>Apellido paterno:</label><input id="txt_ApAdmi" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'ApAdmi',this.value);NomValid(this);" type="text" class="form-control"  name="txt_ApAdmi"><span id="span_ApAdmi" ></span>
													</div>
													<div id="div_AmAdmi">
														<label>Apellido materno:</label><input id="txt_AmAdmi" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'AmAdmi',this.value);NomValid(this);" type="text" class="form-control" name="txt_AmAdmi"><span id="span_AmAdmi" ></span>
													</div>
													<div id="div_CorreoAdmi">
														<label>Correo:</label><input id="txt_CorreoAdmin" onkeypress="return validarXD(helo,this.value.length,30);" onkeyup="validacion4all(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/,'CorreoAdmin',this.value);" type="email" class="form-control" name="txt_CorreoAdmin" required><span id="span_Admin" ></span>
													</div>
													<div id="div_ClaveEscolar">
														<label>Clave de la escuela de residencia:</label><input id="txt_ClaveEscolar" onkeypress="return validarXD(helo,this.value.length,30);" onkeyup="validacion4all(/^[_a-z0-9-]*$/,'ClaveEscolar',this.value);" type="texto" class="form-control" name="txt_ClaveEscolar" required><span id="span_ClaveEscolar" ></span>
													</div>
														<div style="display:block;margin-top:20px;">
															<div id="div_Telcasa" style="display: inline-block;">
																<label style="margin-right:5px;">Teléfono casa: </label><input input id="txt_Telcasa" onkeypress="return validarXD(numeric,this.value.length,8);" onkeyup="validacion4all(/^[0-9]{6,8}$/,'Telcasa',this.value);" type="text" style="min-width:230px" class="form-control" name="txt_Telcasa"><span id="span_Telcasa" ></span>
															</div>
															<div id="div_Telcelular" style="display:inline-block;">
																<label>Teléfono celular:</label><input input id="txt_Telcelular" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/,'Telcelular',this.value);" style="min-width:230px;" type="text" class="form-control" name="txt_Telcelular"><span id="span_Telcelular" ></span>
															</div>
														</div>

													    <div id="div_Curp">
															<label>Curp del personal Administrativo:</label><input id="txt_Curp" onkeyup="validacion4all(/[A-Za-z]{4}[0-9]{6}[Hh,Mm][A-Za-z]{5}[0-9]{2}/,'Curp',this.value);" onkeypress="return validateCurp(this.value.length);" style="text-transform: uppercase" type="text" class="form-control" name="txt_Curp"><span id="span_Curp" ></span>
														</div>
														<label for="Sl_Sexo">Sexo:</label>
															<select class="form-control" name="Sl_Sexo">
																<option>Masculino</option>
																<option>Femenino</option>
															</select>
																<p style="margin-top:20px;"> <label> Fecha de nacimiento:</label><br>
																	<label style="" for="Sl_Dia">Dia:</label>
																	<select style="width:130px; display:inline-block;" class="form-control" name="Sl_Dia">
																			<?php
																			for ($i = 1; $i <= 31; $i++) {
																				echo "<option value=".$i.">$i</option>";
																			}
																			 ?>
																		</select>
																		<label style="margin-left:5%;" for="Sl_Mes">Mes:</label>
																		<select style="width:130px; display:inline-block;" class="form-control" name="Sl_Mes">
																			<?php
																				for ($i = 1; $i <= 12; $i++) {
																					echo "<option value=".$i.">$i</option>";
																				}
																			 ?>
																			</select>
																		<label style="margin-left:5%;" for="Sl_Anio">Año:</label>
																		<select style="width:130px; display:inline-block;" class="form-control" name="Sl_Anio">
																			<?php
																			for ($i = 1940; $i <= 2018; $i++) {
																				echo "<option value=".$i.">$i</option>";
																			}
																			 ?>
																		</select>
																</p>
																<div id="div_CPCan">
																	<label>Código Postal:</label><input id="txt_CPCan" onkeypress="return validarXD(numeric,this.value.length,5);" onkeyup="validacion4all(/^\d{4,5}$/,'CPCan',this.value); return codigoCan();"  type="text" class="form-control" name="txt_CP" required><span id="span_CPCan" ></span>
																</div>
															<div id="codigoC"></div>
															<div id="div_CalleCan">
																<label>Calle:</label><input id="txt_CalleCan" onkeypress="return validarXD(alphaxd,this.value.length,25);" onkeyup="validacion4all(/[0-9a-zA-Z]{5,}/,'CalleCan',this.value);NomValid(this);"  type="text" class="form-control" name="txt_Calle" required><span id="span_CalleCan"></span>
															</div>
															<!-- Extras para el usuario maestro -->
															<div id="div_Funcion">
																<label>Ingrese su funcion:</label><input type="text" name="txt_Funcion" id="txt_Funcion" class="form-control"><span id="span_Funcion"></span>
															</div>
															<label for="departamento">Sexo:</label>
															<select class="form-control" name="departamento">
																<option>Intendencia.</option>
																<option>Administrativo.</option>
																<option>De apoyo.</option>
															</select>
															<div id="div_PswCan">
																<label>Contraseña:</label><input id="txt_PswCan" type="password" class="form-control" name="txt_Psw" required><span id="span_PswCan" ></span>
															</div>
															<div id="div_Psw2Can">
																<label>Repite Contraseña:</label><input id="txt_Psw2Can" onkeyup="checkPwCan(this.value);" type="password" class="form-control" name="txt_Psw2" required><br><span id="span_Psw2Can" ></span>
															</div>

                                <div id="btnPersonal">
                                </div>
    												</form>
											</div>
										</div>
										</div>
								</div>
							</div>
							<div class="tab-pane fade" id="PersonalApo" >
								<div class="row">
									<div class="col-md-2"></div>
										<div class="col-md-8"><br>
										<div class="panel panel-success">
											<div class="panel-heading">
												<h3 class="panel-title">
													Registro Personal Administrativo
												</h3>
											</div>
											<div class="panel-body">
												<form  action="php/AddCandidato.php" method="POST">
													<div id="div_NomCandidato">
														<label>Nombre:</label><input id="txt_NomCandidato" onkeypress="return validarXD(alphaxd,this.value.length,20);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'NomCandidato',this.value);NomValid(this);"  type="text" class="form-control" name="txt_Nom"><span id="span_NomCandidato" ></span>
													</div>
													<div id="div_Ap">
														<label>Apellido paterno:</label><input id="txt_Ap" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'Ap',this.value);NomValid(this);" type="text" class="form-control"  name="txt_Ap"><span id="span_Ap" ></span>
													</div>
													<div id="div_Am">
														<label>Apellido materno:</label><input id="txt_Am" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'Am',this.value);NomValid(this);" type="text" class="form-control" name="txt_Am"><span id="span_Am" ></span>
													</div>
													<div id="div_CorreoCandidato">
														<label>Correo:</label><input id="txt_CorreoCan" onkeypress="return validarXD(helo,this.value.length,30);" onkeyup="validacion4all(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/,'CorreoCandidato',this.value);" type="email" class="form-control" name="txt_Correo" required><span id="span_CorreoCandidato" ></span>
													</div>
														<div style="display:block;margin-top:20px;">
															<div id="div_Telcasa" style="display: inline-block;">
																<label style="margin-right:5px;">Teléfono casa: </label><input input id="txt_Telcasa" onkeypress="return validarXD(numeric,this.value.length,8);" onkeyup="validacion4all(/^[0-9]{6,8}$/,'Telcasa',this.value);" type="text" style="min-width:230px" class="form-control" name="txt_Telcasa"><span id="span_Telcasa" ></span>
															</div>
															<div id="div_Telcelular" style="display:inline-block;">
																<label>Teléfono celular:</label><input input id="txt_Telcelular" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/,'Telcelular',this.value);" style="min-width:230px;" type="text" class="form-control" name="txt_Telcelular"><span id="span_Telcelular" ></span>
															</div>
														</div>

													<div id="div_Curp">
															<label>Curp:</label><input id="txt_Curp" onkeyup="validacion4all(/[A-Za-z]{4}[0-9]{6}[Hh,Mm][A-Za-z]{5}[0-9]{2}/,'Curp',this.value);" onkeypress="return validateCurp(this.value.length);" style="text-transform: uppercase" type="text" class="form-control" name="txt_Curp"><span id="span_Curp" ></span>
														</div>
														<label for="Sl_Sexo">Sexo:</label>
															<select class="form-control" name="Sl_Sexo">
																<option>Masculino</option>
																<option>Femenino</option>
															</select>
															<label for="Sl_Estudio">Nivel de estudio:</label>
																<select class="form-control" name="Sl_Estudio">
																	<option>Secundaria</option>
																	<option>Bachillerato</option>
																	<option>Licenciatura</option>
																	<option>Postgrado</option>
																</select>
																<p style="margin-top:20px;"> <label> Fecha de nacimiento:</label><br>
																	<label style="" for="Sl_Dia">Dia:</label>
																	<select style="width:130px; display:inline-block;" class="form-control" name="Sl_Dia">
																			<?php
																			for ($i = 1; $i <= 31; $i++) {
																				echo "<option value=".$i.">$i</option>";
																			}
																			 ?>
																		</select>
																		<label style="margin-left:5%;" for="Sl_Mes">Mes:</label>
																		<select style="width:130px; display:inline-block;" class="form-control" name="Sl_Mes">
																			<?php
																				for ($i = 1; $i <= 12; $i++) {
																					echo "<option value=".$i.">$i</option>";
																				}
																			 ?>
																			</select>
																		<label style="margin-left:5%;" for="Sl_Anio">Año:</label>
																		<select style="width:130px; display:inline-block;" class="form-control" name="Sl_Anio">
																			<?php
																			for ($i = 1940; $i <= 2018; $i++) {
																				echo "<option value=".$i.">$i</option>";
																			}
																			 ?>
																		</select>
																</p>
																<div id="div_CPCan">
																	<label>Código Postal:</label><input id="txt_CPCan" onkeypress="return validarXD(numeric,this.value.length,5);" onkeyup="validacion4all(/^\d{4,5}$/,'CPCan',this.value); return codigoCan();"  type="text" class="form-control" name="txt_CP" required><span id="span_CPCan" ></span>
																</div>
															<div id="codigoC"></div>
															<div id="div_CalleCan">
																<label>Calle:</label><input id="txt_CalleCan" onkeypress="return validarXD(alphaxd,this.value.length,25);" onkeyup="validacion4all(/[0-9a-zA-Z]{5,}/,'CalleCan',this.value);NomValid(this);"  type="text" class="form-control" name="txt_Calle" required><span id="span_CalleCan"></span>
															</div>
																<div id="div_PswCan">
																	<label>Contraseña:</label><input id="txt_PswCan" type="password" class="form-control" name="txt_Psw" required><span id="span_PswCan" ></span>
																</div>
																<div id="div_Psw2Can">
																	<label>Repite Contraseña:</label><input id="txt_Psw2Can" onkeyup="checkPwCan(this.value);" type="password" class="form-control" name="txt_Psw2" required><br><span id="span_Psw2Can" ></span>
																</div>
                                <div id="btn_personal">
                                </div>
    												</form>
											</div>
										</div>
										</div>
								</div>
							</div>
							<div class="tab-pane fade" id="director" >
								<div class="row">
									<div class="col-md-2"></div>
										<div class="col-md-8"><br>
										<div class="panel panel-success">
											<div class="panel-heading">
												<h3 class="panel-title">
													Registro Personal Administrativo
												</h3>
											</div>
											<div class="panel-body">
												<form  action="php/AddCandidato.php" method="POST">
													<div id="div_NomCandidato">
														<label>Nombre:</label><input id="txt_NomCandidato" onkeypress="return validarXD(alphaxd,this.value.length,20);" onkeyup="validacion4all(/[a-zA-Z]{3,}/,'NomCandidato',this.value);NomValid(this);"  type="text" class="form-control" name="txt_Nom"><span id="span_NomCandidato" ></span>
													</div>
													<div id="div_Ap">
														<label>Apellido paterno:</label><input id="txt_Ap" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'Ap',this.value);NomValid(this);" type="text" class="form-control"  name="txt_Ap"><span id="span_Ap" ></span>
													</div>
													<div id="div_Am">
														<label>Apellido materno:</label><input id="txt_Am" onkeypress="return validarXD(alphaxd,this.value.length,11);" onkeyup="validacion4all(/^[a-zA-Z](\s?[a-zA-Z]){2,10}$/,'Am',this.value);NomValid(this);" type="text" class="form-control" name="txt_Am"><span id="span_Am" ></span>
													</div>
													<div id="div_CorreoCandidato">
														<label>Correo:</label><input id="txt_CorreoCan" onkeypress="return validarXD(helo,this.value.length,30);" onkeyup="validacion4all(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/,'CorreoCandidato',this.value);" type="email" class="form-control" name="txt_Correo" required><span id="span_CorreoCandidato" ></span>
													</div>
														<div style="display:block;margin-top:20px;">
															<div id="div_Telcasa" style="display: inline-block;">
																<label style="margin-right:5px;">Teléfono casa: </label><input input id="txt_Telcasa" onkeypress="return validarXD(numeric,this.value.length,8);" onkeyup="validacion4all(/^[0-9]{6,8}$/,'Telcasa',this.value);" type="text" style="min-width:230px" class="form-control" name="txt_Telcasa"><span id="span_Telcasa" ></span>
															</div>
															<div id="div_Telcelular" style="display:inline-block;">
																<label>Teléfono celular:</label><input input id="txt_Telcelular" onkeypress="return validarXD(numeric,this.value.length,10);" onkeyup="validacion4all(/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/,'Telcelular',this.value);" style="min-width:230px;" type="text" class="form-control" name="txt_Telcelular"><span id="span_Telcelular" ></span>
															</div>
														</div>

													<div id="div_Curp">
															<label>Curp:</label><input id="txt_Curp" onkeyup="validacion4all(/[A-Za-z]{4}[0-9]{6}[Hh,Mm][A-Za-z]{5}[0-9]{2}/,'Curp',this.value);" onkeypress="return validateCurp(this.value.length);" style="text-transform: uppercase" type="text" class="form-control" name="txt_Curp"><span id="span_Curp" ></span>
														</div>
														<label for="Sl_Sexo">Sexo:</label>
															<select class="form-control" name="Sl_Sexo">
																<option>Masculino</option>
																<option>Femenino</option>
															</select>
															<label for="Sl_Estudio">Nivel de estudio:</label>
																<select class="form-control" name="Sl_Estudio">
																	<option>Secundaria</option>
																	<option>Bachillerato</option>
																	<option>Licenciatura</option>
																	<option>Postgrado</option>
																</select>
																<p style="margin-top:20px;"> <label> Fecha de nacimiento:</label><br>
																	<label style="" for="Sl_Dia">Dia:</label>
																	<select style="width:130px; display:inline-block;" class="form-control" name="Sl_Dia">
																			<?php
																			for ($i = 1; $i <= 31; $i++) {
																				echo "<option value=".$i.">$i</option>";
																			}
																			 ?>
																		</select>
																		<label style="margin-left:5%;" for="Sl_Mes">Mes:</label>
																		<select style="width:130px; display:inline-block;" class="form-control" name="Sl_Mes">
																			<?php
																				for ($i = 1; $i <= 12; $i++) {
																					echo "<option value=".$i.">$i</option>";
																				}
																			 ?>
																			</select>
																		<label style="margin-left:5%;" for="Sl_Anio">Año:</label>
																		<select style="width:130px; display:inline-block;" class="form-control" name="Sl_Anio">
																			<?php
																			for ($i = 1940; $i <= 2018; $i++) {
																				echo "<option value=".$i.">$i</option>";
																			}
																			 ?>
																		</select>
																</p>
																<div id="div_CPCan">
																	<label>Código Postal:</label><input id="txt_CPCan" onkeypress="return validarXD(numeric,this.value.length,5);" onkeyup="validacion4all(/^\d{4,5}$/,'CPCan',this.value); return codigoCan();"  type="text" class="form-control" name="txt_CP" required><span id="span_CPCan" ></span>
																</div>
															<div id="codigoC"></div>
															<div id="div_CalleCan">
																<label>Calle:</label><input id="txt_CalleCan" onkeypress="return validarXD(alphaxd,this.value.length,25);" onkeyup="validacion4all(/[0-9a-zA-Z]{5,}/,'CalleCan',this.value);NomValid(this);"  type="text" class="form-control" name="txt_Calle" required><span id="span_CalleCan"></span>
															</div>
																<div id="div_PswCan">
																	<label>Contraseña:</label><input id="txt_PswCan" type="password" class="form-control" name="txt_Psw" required><span id="span_PswCan" ></span>
																</div>
																<div id="div_Psw2Can">
																	<label>Repite Contraseña:</label><input id="txt_Psw2Can" onkeyup="checkPwCan(this.value);" type="password" class="form-control" name="txt_Psw2" required><br><span id="span_Psw2Can" ></span>
																</div>
                                <div id="btn_director">
                                </div>
    												</form>
											</div>
										</div>
										</div>
								</div>
							</div>
						</div>
					</div>

<div id="Mod" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Iniciar sesión</h4>
      </div>
      <div class="modal-body">
    <font size="4"></font>

         <form  action="#">

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input class="form-control" placeholder="E-mail" name="txt_User"  type="text" id="txt_User">
                        </div>
                        </br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input class="form-control" placeholder="Password" name="txt_Password" type="password" id="txt_Password">
                        </div>
                        </br>
                        <input class="btn btn-lg btn-success btn-block" type="submit"  value="Iniciar sesión" id="btn_Login" onclick="return login();">
                        <br>
                        <div id="Login" ></div>
                        <p class="">¿No tienes cuenta? <a href="">Registrate</a></p>
                        <p class="">Se te olvidó la contraseña? <a href="">Recuperar</a></p>

                    </form>
       </div>
    </div>
  </div>
</div>
	</main>
	<footer>
		<i class="fa fa-facebook-official f2c-hover-opacity"></i>
				<i class="fa fa-instagram f2c-hover-opacity"></i>
				<i class="fa fa-twitter f2c-hover-opacity"></i>
			<p>Powered by <strong>Dym Corp</p></strong>
	</footer>

</body>
</html>

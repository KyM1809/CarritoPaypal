<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Registro</title>
		<?php
			include('php/meta.php');
			include('php/styles.php');
		?>
		<style type="text/css">
			/*
			body{
				background: #9053c7;
				background: -webkit-linear-gradient(-135deg, #c850c0, #4158d0);
				background: -o-linear-gradient(-135deg, #c850c0, #4158d0);
				background: -moz-linear-gradient(-135deg, #c850c0, #4158d0);
				background: linear-gradient(-135deg, #c850c0, #4158d0);
			}*/
			body{
				background-image: url('Imagenes/Img019.jpg');
				background-size: 100%;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row"><br></div>
			<div class="row" align="center">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 offset-md-1 offset-lg-1">
					<div class="form-group">
						<h2>Registro</h2>
					<br>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 offset-md-1 offset-lg-1">
					<div class="form-group">
						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" placeholder="Nombre" id="Nombre">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user-circle" aria-hidden="true"></i>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 offset-md-1 offset-lg-1">
					<div class="form-group">
						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" placeholder="Apellido paterno" id="APaterno">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user-circle" aria-hidden="true"></i>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 offset-md-1 offset-lg-1">
					<div class="form-group">
						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" placeholder="Apellido materno" id="AMaterno">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user-circle" aria-hidden="true"></i>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 offset-md-1 offset-lg-1">
					<div class="form-group">
						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" placeholder="N&uacute;mero de celular" id="Celular">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-mobile-phone" aria-hidden="true"></i>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 offset-md-1 offset-lg-1">
					<div class="form-group">
						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" placeholder="Correo" id="Correo">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 offset-md-1 offset-lg-1">
					<div class="form-group">
						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" placeholder="Contraseña" id="Contrasena">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-key" aria-hidden="true"></i>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 offset-md-1 offset-lg-1">
					<div class="form-group">
						<div class="wrap-input100 validate-input">
							<input class="input100" type="text" placeholder="Confirmar contraseña" id="Contrasena2">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-key" aria-hidden="true"></i>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 offset-md-1 offset-lg-1">
					<div class="form-group">
						<input type="checkbox" id="Terminos"> Acepto los terminos y condiciones
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 offset-md-1 offset-lg-1">
					<div class="form-group">
						<button class="btn btn-warning form-control" id="BtnRegistrar">Registrar</button>
					</div>
				</div>
			</div>
		</div>
	</body>

	<script type="text/javascript">
		let Sys = {
			Data : {
				WebService : '',
				Formulario : null
			},
			Ajax : {
				Solicitud : function(){
					var AjaxObj = null;
					try{
						if (window.XMLHttpRequest) {
						    AjaxObj = new XMLHttpRequest();
						 } else {
						    AjaxObj = new ActiveXObject("Microsoft.XMLHTTP");
						}
						AjaxObj.onreadystatechange = function() {
							if (this.readyState == 0) {
								console.log("Request not initialized.");
							}
							if (this.readyState == 1) {
								console.log("Server connection established.");
							}
							if (this.readyState == 2) {
								console.log("Request received.");
							}
							if (this.readyState == 3) {
								console.log("Processing request.");
							}
							if (this.readyState == 4) {
								console.log("Request finished and response is ready.")
								if (this.readyState == 4 && this.status == 200) {
									console.log("[200] OK");
								}
								if (this.readyState == 4 && this.status == 403) {
									console.log("[403] Forbidden");
								}
								if (this.readyState == 4 && this.status == 404) {
									console.log("[404] Page Not Found");
								}
								if (this.readyState == 4 && this.status == 500) {
									//console.log("[500] Internal Server Error");
									alert("Error interno en el servidor");
								}
								if (this.readyState == 4 && this.status == 501) {
									console.log("[501] Not Implemented");
								}
								if (this.readyState == 4 && this.status == 502) {
									console.log("[502] Bad Gateway");
								}
								if (this.readyState == 4 && this.status == 503) {
									console.log("[503] Service Unavailable");
								}
								if (this.readyState == 4 && this.status == 504) {
									console.log("[504] Gateway Timeout");
								}
								if (this.readyState == 4 && this.status == 505) {
									console.log("[505] HTTP Version Not Supported");
								}
								if (this.readyState == 4 && this.status == 511) {
									console.log("[511] Network Authentication Required");
								}
							}
						};
						AjaxObj.open("POST", Sys.Data.WebService, false);
						AjaxObj.send(Sys.Data.Formulario);
						return AjaxObj.responseText;
					}catch(Ex){
						console.log('----------------------------------------------');
						console.error(Ex);
						console.log('----------------------------------------------');
					}
				}
			},
			Functions : {
				Registrar : function(){
					try{
						Sys.Data.Formulario = new FormData();
						Sys.Data.Formulario.append('Nombre',document.getElementById('Nombre').value);
						Sys.Data.Formulario.append('APaterno',document.getElementById('APaterno').value);
						Sys.Data.Formulario.append('AMaterno',document.getElementById('AMaterno').value);
						Sys.Data.Formulario.append('Celular',document.getElementById('Celular').value);
						Sys.Data.Formulario.append('Correo',document.getElementById('Correo').value);
						Sys.Data.Formulario.append('Contrasena',document.getElementById('Contrasena').value);

						Sys.Data.Formulario.append('Id',1);
						Sys.Data.WebService = 'php/Consulta.php';
						Sys.Ajax.Solicitud();
					}catch(Ex){
						console.log('----------------------------------------------');
						console.error(Ex);
						console.log('----------------------------------------------');
					}
				},
				ComprobarCamposVacios : function(){
					try{
						var Ids = ['Nombre', 'APaterno', 'AMaterno','Celular','Correo', 'Contrasena', 'Contrasena2'];
						for(var i = 0; i < Ids.length; i++){
							if(document.getElementById(Ids[i]).value == ''){
								alert('Por favor llene todos los datos');
								document.getElementById(Ids[i]).focus();
								return false;
							}
						}
					}catch(Ex){
						console.log('----------------------------------------------');
						console.error(Ex);
						console.log('----------------------------------------------');
					}
					return true;
				}
			},
			Init : function(){
				try{
					BtnRegistrar = document.getElementById('BtnRegistrar');
					BtnRegistrar.addEventListener('click', function(){
						try{
							if(!Sys.Functions.ComprobarCamposVacios()){
								return false;
							}
							if(document.getElementById('Contrasena').value != document.getElementById('Contrasena2').value){
								return false;
							}
							if(!document.getElementById('Terminos').checked){
								alert('No se han aceptado los terminos y condiciones');
								return false;
							}
							Sys.Functions.Registrar();
						}catch(Ex){
							console.log('----------------------------------------------');
							console.error(Ex);
							console.log('----------------------------------------------');
						}
					});
				}catch(Ex){
					console.log('----------------------------------------------');
					console.error(Ex);
					console.log('----------------------------------------------');
				}
			}
		};
		window.onload = Sys.Init();
	</script>
</html>

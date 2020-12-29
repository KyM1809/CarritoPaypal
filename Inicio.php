<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Iniciar sesión</title>
		<?php
			include('php/meta.php');
			include('php/styles.php');
		?>
		<style type="text/css">
			body{
				background-color: rgb(184 185 199);
			}
			.Tabla{
				overflow: scroll;
				color: white;
				background-color: rgb(90 88 92);
			}
			.TablaMovimientos{
				height: 300px;
			}
			.TablaUsuarios{
				height: 300px;
			}
			.TablaInmuebles{
				height: 300px;
			}
			.TablaEdificios{
				height: 300px;
			}
			.Borde1{
				border: 1px solid;
			}
			.OpcionInventario{
				cursor: pointer;
				color: #6610f2;
				width: 100% !important;
				padding: 0;
			}
			.Link{
				cursor: pointer;
				color: #6610f2;
			}
			.Oculto{
				visibility: hidden;
				display: none;
			}
			.gj-textbox-md{
				background: #e6e6e6;
			}
			#FechaCatalogo{
				text-align: center;
			}
			:root {
				--input-padding-x: 1.5rem;
				--input-padding-y: 0.75rem;
			}

			.login,
			.image {
				min-height: 100vh;
			}

			.bg-image {
				background-image: url('Imagenes/Img024.jpg');
				background-size: cover;
				background-position: center;
			}

			.login-heading {
				font-weight: 300;
			}

			.btn-login {
				font-size: 0.9rem;
				letter-spacing: 0.05rem;
				padding: 0.75rem 1rem;
				border-radius: 2rem;
			}

			.form-label-group {
				position: relative;
				margin-bottom: 1rem;
			}

			.form-label-group>input,
			.form-label-group>label {
				padding: var(--input-padding-y) var(--input-padding-x);
				height: auto;
				border-radius: 2rem;
			}

			.form-label-group>label {
				position: absolute;
				top: 0;
				left: 0;
				display: block;
				width: 100%;
				margin-bottom: 0;
				/* Override default `<label>` margin */
				line-height: 1.5;
				color: #495057;
				cursor: text;
				/* Match the input under the label */
				border: 1px solid transparent;
				border-radius: .25rem;
				transition: all .1s ease-in-out;
			}

			.form-label-group input::-webkit-input-placeholder {
				color: transparent;
			}

			.form-label-group input:-ms-input-placeholder {
				color: transparent;
			}

			.form-label-group input::-ms-input-placeholder {
				color: transparent;
			}

			.form-label-group input::-moz-placeholder {
				color: transparent;
			}

			.form-label-group input::placeholder {
				color: transparent;
			}

			.form-label-group input:not(:placeholder-shown) {
				padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
				padding-bottom: calc(var(--input-padding-y) / 3);
			}

			.form-label-group input:not(:placeholder-shown)~label {
				padding-top: calc(var(--input-padding-y) / 3);
				padding-bottom: calc(var(--input-padding-y) / 3);
				font-size: 12px;
				color: #777;
			}

			/* Fallback for Edge
			-------------------------------------------------- */

			@supports (-ms-ime-align: auto) {
				.form-label-group>label {
					display: none;
				}
				.form-label-group input::-ms-input-placeholder {
					color: #777;
				}
			}

			/* Fallback for IE
			-------------------------------------------------- */

			@media all and (-ms-high-contrast: none),
			(-ms-high-contrast: active) {
				.form-label-group>label {
					display: none;
				}
				.form-label-group input:-ms-input-placeholder {
					color: #777;
				}
			}
			.input100{
				height: 35px;
			}
			.select100 {
				font-family: Poppins-Medium;
				font-size: 15px;
				line-height: 1.5;
				color: #666666;
				display: block;
				width: 100%;
				background: #e6e6e6;
				height: 35px;
				border-radius: 25px;
				padding: 0 30px 0 68px;
			}
			.modal-content{
				border-radius: 0.9rem;
			}
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row no-gutter">
				<div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
				<div class="col-md-8 col-lg-6">
					<div class="login d-flex align-items-center py-5">
						<div class="container">
							<div class="row">
								<div class="col-md-9 col-lg-8 mx-auto">
									<h3 class="login-heading mb-4">Bienvenido!</h3>
									<form action="php/IniciarSesion.php" method="POST">
										<div class="form-label-group">
											<input type="email" id="inputEmail" name="Usuario" class="form-control" placeholder="Email address" required autofocus>
											<label for="inputEmail">Usuario</label>
										</div>

										<div class="form-label-group">
											<input type="password" id="inputPassword" name="Contrasena" class="form-control" placeholder="Password" required>
											<label for="inputPassword">Contraseña</label>
										</div>

										<div class="custom-control custom-checkbox mb-3 Oculto">
											<input type="checkbox" class="custom-control-input" id="customCheck1">
											<label class="custom-control-label" for="customCheck1">Remember password</label>
										</div>
										<button class="btn btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Entrar</button>
										<div class="text-center Oculto">
											<a class="small" href="#">Forgot password?</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<?php
		include('php/scripts.php');
	?>
</html>
<?php
	session_start();
?>
<?php
	include('php/Config.php');
	include('php/Conexion.php');
	include('php/Carrito.php');
	include('php/Header.php');
?>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php if($Msg == '') { ?>
						<div class="alert alert-success">
							<?php echo $Msg; ?>
							<a href="MostrarCarrito.php" class="badge badge-success">Ver Carrito</a>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="row">
				<?php
					$s = $pdo->prepare("SELECT * FROM tproductos;");
					$s->execute();
					$Lista = $s->fetchAll(PDO::FETCH_ASSOC);
					//print_r($Lista);
				?>

				<?php foreach ($Lista as $Producto) { ?>

					<div class="col-3">
						<div class="card">
							<span><?php echo $Producto['Nombre']; ?></span>
							<img height="317" src="<?php echo $Producto['Imagen'];?>" class="card-img-top" title="Titulo" data-trigger="hover" data-toggle="popover" data-content="<?php echo $Producto['Descripcion']; ?>">
							<div class="card-body">
								<h5 class="card-title">$<?php echo $Producto['Precio']; ?></h5>
								<p class="card-text"><?php echo $Producto['Descripcion']; ?></p>

								<form method="POST" action="">
									<input type="hidden" name="Id" value="<?php echo openssl_encrypt($Producto['Id'], COD, KEY); ?>">
									<input type="hidden" name="Nombre" value="<?php echo openssl_encrypt($Producto['Nombre'], COD, KEY); ?>">
									<input type="hidden" name="Descripcion" value="<?php echo openssl_encrypt($Producto['Descripcion'], COD, KEY); ?>">
									<input type="hidden" name="Precio" value="<?php echo openssl_encrypt($Producto['Precio'], COD, KEY); ?>">
									<input type="hidden" name="Cantidad" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">

									<button class="btn btn-primary" name="BtnAction" value="Agregar" type="submit">Agregar al carrito</button>
								</form>

							</div>
						</div>
					</div>

				<?php }?>

			</div>
		</div>

		<?php
			include('php/Scripts.php');
		?>

		<script type="text/javascript">
			$(function () {
				//$('[data-toggle="popover"]').popover()
			})
		</script>
<?php
	include('php/Footer.php');
?>

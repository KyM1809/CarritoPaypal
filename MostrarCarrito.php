<?php
	session_start();
?>
<?php
	include('php/Config.php');
	include('php/Carrito.php');
	include('php/Header.php');
?>
	<br>
	<?php if(!empty($_SESSION['Carrito'])){ ?>
	<table class="table table-striped table-hover table-dark table-sm">
		<thead>
			<tr>
				<th width="40%">Descripcion</th>
				<th width="15%">Cantidad</th>
				<th width="20%">Precio</th>
				<th width="20%">Total</th>
				<th width="5%">---</th>
			</tr>
		</thead>
		<tbody>
			<?php $Total = 0; ?>
			<?php foreach ($_SESSION['Carrito'] as $key => $Producto) { ?>
				<tr>
					<td width="40%"><?php echo $Producto['Descripcion']; ?></td>
					<td width="15%"><?php echo $Producto['Cantidad']; ?></td>
					<td width="20%"><?php echo number_format($Producto['Precio'] * $Producto['Cantidad'], 2) ?></td>
					<td width="20%">Total</td>
					<td width="5%">
						<form action="" method="POST">
							<input type="hidden" name="Id" id="Id" value="<?php echo openssl_encrypt($Producto['Id'], COD, KEY); ?>">
							<button class="btn btn-danger btn-sm" type="submit" name="BtnAction" value="Eliminar">Eliminar</button>
						</form>
					</td>
				</tr>
			<?php $Total = $Total + ($Producto['Precio'] * $Producto['Cantidad']); ?>
			<?php } ?>
			<tr>
				<td colspan="3" align="right"><h3>Total</h3></td>
				<td align="right"><h3><?php echo number_format($Total,2) ?></h3></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="5">
					<form action="Pagar.php" method="POST">
						<div class="alert alert-success">
							<div class="form-group">
								<label for="Correo">Correo de contacto</label>
								<input type="email" name="Correo" id="Correo" class="form-control" placeholder="Pro favor escribe tu correo" required>
							</div>
							<small id="emailHelp" class="form-text text-muted">
								Los productos se enviaran a este correo
							</small>
							<button class="btn btn-primary btn-lg btn-block" type="submit" value="Pagar" name="BtnAction">Proceder a pagar >></button>
						</div>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
	<?php } else { ?>
		<div class="alert alert-success">No hay productos</div>
	<?php } ?>
<?php
	include('php/Footer.php');
?>
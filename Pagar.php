<?php
	session_start();
?>
<?php
	include('php/Config.php');
	include('php/Conexion.php');
	include('php/Carrito.php');
	include('php/Header.php');
?>
<?php
	if($_POST){
		$Total = 0;
		$SSID = session_id();
		$Correo = $_POST['Correo'];
		foreach ($_SESSION['Carrito'] as $key => $Producto) {
			$Total = $Total + ($Producto['Precio'] * $Producto['Cantidad']);
		}

		$s = $pdo->prepare('INSERT INTO tventas (CveTransaccion,DatosPago,Fecha,Correo,Total,Status) VALUES(:CVE,:DP,NOW(),:CORREO,:TOTAL,:ST);');
		$s->bindParam(':CVE', $SSID);
		$s->bindParam(':DP', $SSID);
		$s->bindParam(':CORREO', $Correo);
		$s->bindParam(':TOTAL', $Total);
		$s->bindParam(':ST', $SSID);
		$s->execute();

		$IdVenta = $pdo->lastInsertId();


		foreach ($_SESSION['Carrito'] as $key => $Producto) {
			$s = $pdo->prepare('INSERT INTO tdetalleventa (IdVenta,IdProducto,PrecioUnitario,Cantidad,Descargado) VALUES(:IDV,:IDP,:PU,:CANT,0);');
			$s->bindParam(':IDV', $IdVenta);
			$s->bindParam(':IDP', $Producto['Id']);
			$s->bindParam(':PU', $Producto['Precio']);
			$s->bindParam(':CANT', $Producto['Cantidad']);
			$s->execute();
		}
	}
?>

	<style>
        @media screen and (max-width: 400px) {
            #paypal-button-container {
                width: 100%;
            }
        }
        
        @media screen and (min-width: 400px) {
            #paypal-button-container {
                width: 250px;
            }
        }
    </style>
    	<div class="jumbotron text-center">
    		<h1 class="display-4">¡Paso Final!</h1>
    		<hr class="my-4">
    		<p class="lead">Estas a punto de pagar con paypal la cantidad de : <h4>$<?php echo number_format($Total,2); ?></h4> </p>
    		<div class="row">
    			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 offset-md-3 offset-lg-4" align="center">

    				<div id="paypal-button-container"></div>
    			</div>
    		</div>
    		<p>Los productos podran ser descargados una vez que se procese el pago
    			<strong>Para aclaraciones Marco@outlook.com</strong>
    		</p>
    	</div>

    	<div class="modal fade" id="ModalOK">
    		<div class="modal-dialog">
    			<div class="modal-content">
    				<div class="modal-header">
    					<div class="modal-title">
    						<h4><b>Compra exitosa</b></h4>
    					</div>
    				</div>
    				<div class="modal-body">
    					<div class="row">
    						<div class="col-12" align="center">
    							<img src="Imagenes/xromlogo.png" />
    						</div>
    					</div>
    					<div class="row">
    						<div class="col-12">
    							<table class="table table-hover table-striped table-sm">
    								<thead>
    									<tr>
    										<th></th>
    										<th></th>
    									</tr>
    								</thead>
    								<tbody id="DatosCompra">
    								</tbody>
    							</table>
    						</div>
    					</div>
    				</div>
    				<div class="modal-footer" style="justify-content: center;">
    					<div class="row">
    						<div class="col-12" align="center">
    							<div class="btn-group" align="center">
		    						<button class="btn btn-success btn-lg" id="BtnHecho">Hecho</button>
		    					</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>

		<?php
			include('php/Scripts.php');
		?>

		<script src="https://www.paypal.com/sdk/js?client-id=AS3G22vXdgKE3Bl6vLiMS8M8g1ZVLPIuzfy3hFfrq6WQKAt3cknvXSAzBdLiDkCMtQn-0CJok_8KlHYl&currency=MXN"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.</script>

		<script>

				paypal.Buttons({
					createOrder: function(data, actions) {
						return actions.order.create({
							purchase_units: [{
								amount: {
									value: '<?php echo $Total; ?>',
									currency : 'MXN'
								}
							}]
						});
					},
					onApprove: function(data, actions) {
						return actions.order.capture().then(function(details) {
							console.log(details);
							if(details.status == 'COMPLETED'){
								$("#ModalOK").modal({keyboard:false, backdrop:false});

								var Datos = '';
								Datos += '<tr>' + '<td>' + 'Id' + '</td>' + '<td>' + details.id + '</td>' + '</tr>';
								Datos += '<tr>' + '<td>' + 'Correo' + '</td>' + '<td>' + details.payer.email_address + '</td>' + '</tr>';
								Datos += '<tr>' + '<td>' + 'Nombre' + '</td>' + '<td>' + details.purchase_units[0].shipping.name.full_name + '</td>' + '</tr>';
								Datos += '<tr>' + '<td>' + 'Direccion' + '</td>' + '<td>' + details.purchase_units[0].shipping.address.address_line_1 + '</td>' + '</tr>';
								Datos += '<tr>' + '<td>' + 'Correo' + '</td>' + '<td>' + details.purchase_units[0].payee.email_address + '</td>' + '</tr>';
								Datos += '<tr>' + '<td>' + 'Cantidad' + '</td>' + '<td>' + details.purchase_units[0].payments.captures[0].amount.value + '</td>' + '</tr>';
								Datos += '<tr>' + '<td>' + 'Id' + '</td>' + '<td>' + details.purchase_units[0].payments.captures[0].id + '</td>' + '</tr>';
								Datos += '<tr>' + '<td>' + 'Fecha y hora' + '</td>' + '<td>' + details.purchase_units[0].payments.captures[0].create_time + '</td>' + '</tr>';

								$("#DatosCompra")[0].innerHTML = Datos;
							}
						});
					}
				}).render('#paypal-button-container');

				$("#BtnHecho").on('click', function(){
					window.location.href = 'Pagado.php';
				});
		</script>

<?php
	include('php/Footer.php');
?>

<?php
	$Msg = "";
	if(isset($_POST['BtnAction'])){
		switch ($_POST['BtnAction']) {
			case 'Agregar':
				if(is_numeric(openssl_decrypt($_POST['Id'], COD, KEY))){
					$Id = openssl_decrypt($_POST['Id'], COD, KEY);
					$Msg = 'Id correcto ' . openssl_decrypt($_POST['Id'], COD, KEY);
				}else{
					$Msg = 'Id incorrecto ' . openssl_decrypt($_POST['Id'], COD, KEY);
					break;
				}


				if(is_string(openssl_decrypt($_POST['Nombre'], COD, KEY))){
					$Nombre = openssl_decrypt($_POST['Nombre'], COD, KEY);
				}else{
					$Msg = 'Nombre incorrecto ' . openssl_decrypt($_POST['Nombre'], COD, KEY);
					break;
				}

				if(is_string(openssl_decrypt($_POST['Descripcion'], COD, KEY))){
					$Descripcion = openssl_decrypt($_POST['Descripcion'], COD, KEY);
				}else{
					$Msg = 'Descripcion incorrecta ' . openssl_decrypt($_POST['Descripcion'], COD, KEY);
					break;
				}


				if(is_numeric(openssl_decrypt($_POST['Precio'], COD, KEY))){
					$Precio = openssl_decrypt($_POST['Precio'], COD, KEY);
				}else{
					$Msg = 'Precio incorrecto ' . openssl_decrypt($_POST['Precio'], COD, KEY);
					break;
				}


				if(is_numeric(openssl_decrypt($_POST['Cantidad'], COD, KEY))){
					$Cantidad = openssl_decrypt($_POST['Cantidad'], COD, KEY);
				}else{
					$Msg = 'Cantidad incorrecta ' . openssl_decrypt($_POST['Cantidad'], COD, KEY);
					break;
				}

				if(!isset($_SESSION['Carrito'])){
					$Producto = array(
						'Id' => $Id,
						'Nombre' => $Nombre,
						'Descripcion' => $Descripcion,
						'Cantidad' => $Cantidad,
						'Precio' => $Precio
					);
					$_SESSION['Carrito'][0] = $Producto;
					$Msg = 'Producto agregado al carrito';
				}else{
					$Ids = array_column($_SESSION['Carrito'], 'Id');
					if(in_array($Id, $Ids)){
						echo '<script>alert("El producto ya ha sido seleccionado");</script>';
						$Msg = '';
					}else{
						$Numero = count($_SESSION['Carrito']);

						$Producto = array(
							'Id' => $Id,
							'Nombre' => $Nombre,
							'Descripcion' => $Descripcion,
							'Cantidad' => $Cantidad,
							'Precio' => $Precio
						);

						$_SESSION['Carrito'][$Numero] = $Producto;
						$Msg = 'Producto agregado al carrito';
					}
				}
				//$Msg = print_r($_SESSION, true);
				break;
			
			case 'Eliminar':
				if(is_numeric(openssl_decrypt($_POST['Id'], COD, KEY))){
					$Id = openssl_decrypt($_POST['Id'], COD, KEY);
					foreach ($_SESSION['Carrito'] as $key => $Producto) {
						if($Producto['Id'] == $Id){
							unset($_SESSION['Carrito'][$key]);
							echo '<script>console.log("Elemento eliminado");</script>';
						}
					}
				}
				break;
			default:
				# code...
				break;
		}
	}
?>


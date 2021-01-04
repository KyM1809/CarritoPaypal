
<!DOCTYPE html>
<html>
	<head>
		<title>Carrito</title>
		<?php
			include('php/meta.php');
			include('php/styles.php');
		?>


		<style type="text/css">

			@media screen and (max-width: 800px) {
			    #contenedor{
			        width:100%;
			    }
			}

			@media screen and (max-device-width : 480px) {
			    #sidebar{
			        display:none;
			    }

			    #menu{
			        text-align:center;
			    }
			}

			@media screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : landscape){
			    .entry, .entry-content{
			        font-size:1.2em;
			        line-height:1.5em;
			    }
			}



			.carousel{
				height: 600px;
			}
			.carousel-inner{
				height: 600px;
			}
			.carousel-item{
				height: 600px;
			}

			* {
				box-sizing: border-box;
				padding: 0;
				margin: 0;
			}
			body {
				font-family: sans-serif;
				background: #f1f1f1;
			}
			nav {
				background: #304750;
				padding: 5px 20px;
			}
			ul {
				list-style-type: none;
			}
			a {
				color: white;
				text-decoration: none;
			}
			a:hover {
				text-decoration: underline;
			}
			.logo a:hover {
				text-decoration: none;
			}
			.menu li {
				font-size: 16px;
				padding: 15px 5px;
				white-space: nowrap;
			}
			.logo a,
			#Toggle a {
				font-size: 20px;
			}
			.button.secondary {
				border-bottom: 1px #444 solid;
			}

			.menu {
				display: flex;
				flex-wrap: wrap;
				justify-content: space-between;
				align-items: center;
			}
			#Toggle {
				order: 1;
			}
			.item.button {
				order: 2;
			}
			.item {
				width: 100%;
				text-align: center;
				order: 3;
				display: none;
			}
			.item.active {
				display: block;
			}

			@media all and (min-width: 600px) {
				.menu {
					justify-content: center;
				}
				.logo {
					flex: 1;
				}
				#Toggle {
					flex: 1;
					text-align: right;
				}
				.item.button {
					width: auto;
					order: 1;
					display: block;
				}
				#Toggle {
					order: 2;
				}
				.button.secondary {
					border: 0;
				}
				.button a {
					padding: 7.5px 15px;
					background: teal;
					border: 1px #006d6d solid;
				}
				.button.secondary a {
					background: transparent;
				}
				.button a:hover {
					text-decoration: none;
				}
				.button:not(.secondary) a:hover {
					background: #006d6d;
					border-color: #005959;
				}
				.button.secondary a:hover {
					color: #ddd;
				}
			}
			
			@media all and (min-width: 900px) {
				.item {
					display: block;
					width: auto;
				}
				#Toggle {
					display: none;
				}
				.logo {
					order: 0;
				}
				.item {
					order: 1;
				}
				.button {
					order: 2;
				}
				.menu li {
					padding: 15px 10px;
				}
				.menu li.button {
					padding-right: 0;
				}
			}
			.container-fluid{
				padding-right: 0;
    			padding-left: 0;
				margin-left: 0;
				margin-right: 0;
			}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-expand-md navbar-light bg-light">
			<a href="navbar-brand nav-link" href="index.php">Logo empresa</a>
			<button class="navbar-toggler" data-target="#Nav1" data-toggle="collapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div id="Nav1" class="collapse navbar-collapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="MostrarCarrito.php">Carrito(<?php echo empty($_SESSION['Carrito']) ? 0 : count($_SESSION['Carrito']); ?>)</a>
					</li>
				</ul>
			</div>
		</nav>

		
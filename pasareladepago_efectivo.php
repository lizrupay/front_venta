<!DOCTYPE html>
<html lang="en">
<head>
	<title>MUNDOTEC VENTA</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Little Closet template">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Plugins CSS File -->
	<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">

	<!-- Main CSS File -->
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/checkout.css">
	<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="images\mundotec.png">
</head>

<body>
	<!-- Menu -->
	<div class="super_container">

		<!-- Header -->
		<header class="header">
		</header>
	</div>

	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Home -->
		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div>
						<a class="home_title" href="carritocompra.php">Compra Finalizada</a>
					</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="index.php" style="font-size: 20px;">Inicio</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Cart -->
		<div class="row" style="margin-top: 25px;">

			<div class="col-lg-7" style="margin-left: 50px;">
				<div class="cart-table-container">
				   <div class="product-single-tabs" style="margin-bottom:0px">
						<form action="" method="post" name="pedido" id="pedido" enctype="multipart/form-data">
							<input type="hidden" name="token" value="">
							<input type="hidden" name="id_cliente" id="id_cliente" value="">
							<input type="hidden" name="id_pago_unico" id="id_pago_unico" value="">
							<input type="hidden" name="costo_envio" id="costo_envio" value="0.00">
							<input type="hidden" name="id_mercado_pago" id="id_mercado_pago" value="">
							<input type="hidden" name="url_mercado_pago" id="url_mercado_pago" value="">
								
							<div class="checkout-payment">
								<div id="new-checkout-address" class="show">
									<div class="row">
										<div class="col-md-12" style="text-align: center;">
											<h style="font-size: 30px;">GRUPO VASQUEZ RVC SAC</h>
										</div>
										<div class="col-md-12" style="margin-top: 25px; text-align: center;">
											<img src="images/pagos.jpg">
										</div>
										
										<div class="col-md-12" style="margin-top: 25px; text-align: center;">
											<h style="font-size: 30px;">Muchas gracias por su compra</h>
										</div>
										
					
									</div>					
								</div>
														
								<div class="clearfix" style="margin-top:15px;">
									<a href="index.php" style="border:0px; border-radius:10px; float:left" class="btn btn-primary float-right guardar_pedido">CONTINUAR COMPRANDO</a>														   
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>


		</div>

		&nbsp;

		<footer class="footer" style="background-color:#216af4">
			&nbsp;
        </footer>
	</div>

	<!-- Main JS File -->
	<script src="main.min.js"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap-4.1.2/popper.js"></script>
	<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
	<script src="plugins/greensock/TweenMax.min.js"></script>
	<script src="plugins/greensock/TimelineMax.min.js"></script>
	<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
	<script src="plugins/greensock/animation.gsap.min.js"></script>
	<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="js/cart.js"></script>
</body>
</html>
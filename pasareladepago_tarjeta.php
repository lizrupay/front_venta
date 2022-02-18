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

	<?php
		include 'componentes/seguridad.php'; 
		include 'db/db_model.php'; 
	?>

	<!-- Menu -->
	<div class="super_container">

		<!-- Header -->
		<header class="header">
			<div class="header_overlay">

			</div>
			<div class="header_content d-flex flex-row align-items-center justify-content-start">
				

					<!-- User -->
					<?php include "loginsistemapagar.php"; ?>


			
			</div>
		</header>

		<!-- Captura Datos API -->
		<?php
				// Verificar el detalle a imprimir.
				$pusuario = $gg_pp_codigo_usuario;
				$objDB = new db_model();


				$p_rptJson = $objDB->ventacarrito_buscar_ultimaventa($pusuario);
				$p_itemVenta = json_decode($p_rptJson, true);
				//echo "hoal :" .$p_itemCompra;
				if (isset($p_itemVenta['venta_id']) == null)
				{

					// echo "........... vacia"."<br>";
					$p_itemsVentaDetalle = array();
				}else
				{
					// echo "........... llena"."<br>";
					$p_itemsVentaDetalle = $p_itemVenta['itemsVentadetallecarritoMap'];
				}

				$p_valorVenta = $p_itemVenta['precio_venta']; 
				$p_descuentoVenta = $p_itemVenta['descuento_venta']; 
				$p_subtotalVenta = $p_itemVenta['subtotal_venta']; 
				$p_impuestoVenta = $p_itemVenta['igv_venta']; 
				$p_totalVenta = $p_itemVenta['total_venta']; 




			?>


	</div>

	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Home -->
		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div>
						<a class="home_title" href="carritocompra.php">Carrito De Compras</a>
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
											<h style="font-size: 30px;">Próximamente estara activo el servicio </h>
										</div>

										<div class="col-md-12" style="margin-top: 25px; text-align: center;">
											<h style="font-size: 30px;">Complete Los Datos De Su Tarjeta</h>
										</div>
										
										<div class="col-md-6" style="margin-top: 25px;">  
											<div class="form-group required-field">
												<label>Numero De Tarjeta</label>
												<input type="text" class="form-control" name="tarjeta" id="tarjeta" value="" onkeypress="return soloNumeros(event)" maxlength="16">
											</div>
										</div>

										<div class="col-md-6" style="margin-top: 25px;">  
											<div class="form-group required-field">
												<label>Vencimiento</label>
												<input type="tel" class="form-control" name="vencimiento" id="vencimiento" placeholder="MM/AA" value="" onkeypress="return soloNumeros(event)" maxlength="5">
											</div>
										</div>

										<div class="col-md-6"> 
											<div class="form-group required-field">
												<label>Nombre Del Titular</label>
												<input type="text" class="form-control" name="titular" id="titular" value="" onkeypress="return soloLetras(event)">
											</div>
										</div>

										<div class="col-md-3"> 
											<div class="form-group required-field">
												<label>CVV</label>
												<input type="text" class="form-control" name="cvv" id="cvv" value="" onkeypress="return soloNumeros(event)" maxlength="3">
											</div>
										</div>

										<div class="col-md-3" style="padding-top: 5px;">
											<label>Último 3 dígitos al dorso de la tarjeta</label>
											<img src="images/cvv.png">
										</div>

										<div class="col-md-6"> 
											<div class="form-group required-field">
												<label>DNI</label>
												<input type="text" class="form-control" name="dni" id="dni" value="" onkeypress="return soloNumeros(event)" maxlength="8">
											</div>
										</div>

										<div class="col-md-6"> 
											<div class="form-group required-field">
												<label>Email </label>
												<input type="text" class="form-control" name="email" id="email" value="" onkeypress="return soloLetras(event)">
											</div>
										</div>
									</div>					
								</div>
														
								<div class="clearfix" style="margin-top:15px;">
									<a href="#" style="border:0px; border-radius:10px; float:left" class="btn btn-primary float-right guardar_pedido">FINALIZAR COMPRA</a>														   
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-lg-4" style="margin-left: 50px;">
				<div class="cart-summary" style="background-color:#f2f2f2; border: 1px solid #6F6E6E;">
					<h4 style="color:#00BFFF; text-align: center; font-size: 25px; padding-top: 5px;">DETALLE DE TU COMPRA</h4>



					<table class="table table-totals" style="margin-top: 25px;">
						<tbody>
						<tr>
							<td>
							<b>Valor Venta</b>
							</td>
							<td>S/ <?php echo$p_valorVenta; ?></td>
						</tr>	
						<tr>
							<td>
							<b>Descuento</b>
							</td>
							<td>S/ <?php echo$p_descuentoVenta; ?></td>
						</tr>	
						<tr>
							<td>
							<b>Sub Total</b>
							</td>
							<td>S/ <?php echo$p_subtotalVenta; ?></td>
						</tr>	
						<tr>
							<td>
							<b>Impuesto</b>
							</td>
							<td>S/ <?php echo$p_impuestoVenta; ?></td>
						</tr>																									
						<tr>
							<td>
							<b>Costo de Despacho</b><br>
							(Retiro en Tienda)
							</td>
							<td>S/ 0.00</td>
						</tr>
						<tr>
							<td><b>Monto Final a Pagar</b></td>
							<td><b>S/ <?php echo$p_totalVenta; ?></b></td>
						</tr>
						</tbody>
					</table>


					<button class="button" style="padding-left: 10px; padding-right: 10px; line-height: 30px; margin-left: 175px; background-color: #00BFFF; border: #00BFFF; border-radius: 5px;">
						<a href="carritocompra.php" style="font-size: 18px; color: #FFFFFF;">VOLVER AL CARRITO DE COMPRA</a>
					</button>


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
<!DOCTYPE html>
<html lang="en">
<head>
	<title>CARRITO DE COMPRA</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Little Closet template">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Plugins CSS File -->
	<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">

	<!-- Main CSS File -->
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/cart.css">
	<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">

	<!-- Favicon -->
	<!--<link rel="icon" type="image/x-icon" href="images\mundotec.png"> -->
	<a href="index.php" class="logo" style="margin-left: 50px;"> <img src="images\logo.png" style="width:250px"></a>
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
		$pusuario 			= $gg_pp_codigo_usuario;

		$p_valorVenta 		= "0.0"; 
		$p_descuentoVenta 	= "0.0"; 
		$p_subtotalVenta 	= "0.0";  
		$p_impuestoVenta 	= "0.0";  
		$p_totalVenta 		= "0.0"; 	
		

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
			$p_itemsVentaDetalle 	= $p_itemVenta['itemsVentadetallecarritoMap'];
			$p_valorVenta 		= $p_itemVenta['precio_venta']; 
			$p_descuentoVenta 	= $p_itemVenta['descuento_venta']; 
			$p_subtotalVenta 		= $p_itemVenta['subtotal_venta']; 
			$p_impuestoVenta 		= $p_itemVenta['igv_venta']; 
			$p_totalVenta 		= $p_itemVenta['total_venta']; 		  
		}



	?>	

	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Home -->
		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">
						Carrito De Compras
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
		<div class="cart_section">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="cart_container">
							
							<!-- Cart Bar -->
							<div class="cart_bar">
								<ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
									<li class="mr-auto">Producto</li>
									<li>Precio</li>
									<li>Cantidad</li>
									<li>Total</li>
									<li>Acci&#243n</li>
								</ul>
							</div>

							<?php
								$pnro_item = 0;
								foreach ($p_itemsVentaDetalle as $p_itemVentaDetalle) 
								{
									$pcodigo 	= $p_itemVentaDetalle['venta_id'];    
									$pnro_item  = $pnro_item  + 1; 

							?>
									<!-- Cart Items -->
									<div class="cart_items">
										<ul class="cart_items_list">

											<!-- Cart Item -->
											<li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
												<div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
													<div><div class="product_number"><?php echo $pnro_item; ?></div></div>
													<div><div class="product_image"><img src="productos/<?php echo $p_itemVentaDetalle['subcategoria_id']."/".$p_itemVentaDetalle['producto_id'].".jpg"; ?>" alt=""></div></div>
													<div class="product_name_container">
														<div class="product_name"><?php echo $p_itemVentaDetalle['producto_nombre']; ?></div>
														<div class="product_text">Numero De Parte : <?php echo $p_itemVentaDetalle['producto_id']; ?></div>
													</div>
												</div>
												<div class="product_price product_text"><span>Precio: </span>S/ <?php echo $p_itemVentaDetalle['precio_ventadetalle']; ?></div>
												<div class="product_quantity_container">
													<span class="product_text product_num"><?php echo $p_itemVentaDetalle['cantidad_ventadetalle']; ?></span>

													<!--
													<div class="product_quantity ml-lg-auto mr-lg-auto text-center">
														<span class="product_text product_num"><?php //echo $p_itemVentaDetalle['cantidad_ventadetalle']; ?></span>
														<div class="qty_sub qty_button trans_200 text-center"><span>-</span></div>
														<div class="qty_add qty_button trans_200 text-center"><span>+</span></div>
													</div>
													-->
												</div>
												
												<div class="product_total product_text"><span>Total: </span>S/ <?php echo $p_itemVentaDetalle['total_ventadetalle']; ?></div>
												<div class="boton-aciones">
												<a href="carritocompra.php?token=<?php echo encriptar_parametro("1|1|".$pcodigo); ?>" class="boton-aciones__eliminar">Eliminar</a>
												</div>
											<!-- <div class="product_total product_text"><span>Acci&#243n:</span><button class="btn btn-primary">ELIMINAR</button></div> -->
											</li>


										</ul>
									</div>
							<?php
     

                    			}
                			?>
							<!-- Cart Buttons -->
							<div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
								<div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
								<?php
								if ($p_totalVenta > 0)
								{
								?>
									<div class="button button_clear trans_200"><a href="carritocompra.php">VACIAR CARRITO</a></div>
								<?php
								}
								else
								{
								?>
									<div class="button button_clear trans_200">VACIAR CARRITO</div>
								<?php
								}
								?>									
									
									<div class="button button_continue trans_200"><a href="index.php">CONTINUAR COMPRA</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row cart_extra_row">
					<div class="col-lg-6">
						<div class="cart_extra cart_extra_1">
							<div class="cart_extra_content cart_extra_coupon">
								<div class="shipping">
									<div class="cart_extra_title">Recoger En Tienda</div>
									<ul>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												<input type="radio" id="radio_1" name="shipping_radio" class="shipping_radio" checked>
												<span class="radio_mark"></span>
												<span class="radio_text">Oficina</span>
											</label>
											<div class="shipping_price ml-auto">Gratis</div>
										</li>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												<input type="radio" id="radio_2" name="shipping_radio" class="shipping_radio">
												<span class="radio_mark"></span>
												<span class="radio_text">Tienda</span>
											</label>
											<div class="shipping_price ml-auto">Gratis</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 cart_extra_col">
						<div class="cart_extra cart_extra_2">
							<div class="cart_extra_content cart_extra_total">
								<div class="cart_extra_title">Total Del Carrito</div>

								<ul class="cart_extra_total_list">
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Valor venta</div>
										<div class="cart_extra_total_value ml-auto">S/ <?php echo $p_valorVenta; ?></div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Descuento</div>
										<div class="cart_extra_total_value ml-auto">S/ <?php echo $p_descuentoVenta; ?></div>
									</li>	
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Sub Total</div>
										<div class="cart_extra_total_value ml-auto">S/ <?php echo $p_subtotalVenta; ?></div>
									</li>																	
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Impuesto</div>
										<div class="cart_extra_total_value ml-auto">S/ <?php echo $p_impuestoVenta; ?></div>
									</li>									

									<li class="d-flex flex-row align-items-center justify-content-start" style="margin-top: 25px;">
										<div class="cart_extra_total_title">Total</div>
										<div class="cart_extra_total_value ml-auto">S/ <?php echo $p_totalVenta; ?></div>
									</li>
								</ul>
								<?php
								if ($p_totalVenta > 0)
								{
								?>
									<div class="checkout_button trans_200"><a href="checkout.php">REALIZAR COMPRA</a></div>
								<?php
								}
								else
								{
								?>
									<div class="checkout_button trans_200">REALIZAR COMPRA</div>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		&nbsp;

		<footer class="footer" style="background-color:#216af4">
			&nbsp;
            <div class="container">
                <div class="footer-middle">
                    <div class="row row-sm">
                        <div class="col-md-1 col-lg-3" style="margin-left: 200px;">
                            <div class="widget">
                                <h3 class="widget-title" style="color:white">Acerca de la Empresa</h3>
                                <div class="widget-content">
                                    <ul>
                                        <li><a href="" style="color:white">Sobre Nosotros</a></li> &nbsp;
										<li><a href="" style="color:white">Gesti&#243n Administraci&#243n</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 col-lg-3" style="margin-left: 250px;">
                            <div class="widget">
                                <h3 class="widget-title" style="color:white">Realiza Tu Pago De Forma Segura</h3>
                                <div class="widget-content">
                                   <img src="https://www.datamundo.pe/public/web/assets/images/tarjetas.png" style="width:270px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom" style="display:block; text-align:center; color:white; margin-top: 10px;">
                    <p style="color:white">@ MundoTec 2022 - Todos los derechos reservados</p>
                </div>
            </div>
        </footer>

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
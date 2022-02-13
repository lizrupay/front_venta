<!DOCTYPE html>
<html lang="en">
<head>
	<title>DETALLE DE PRODUCTO</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<meta name="description" content="Little Closet template">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Plugins CSS File -->
	<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">

	<!-- Main CSS File -->
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/flexslider/flexslider.css">
	<link rel="stylesheet" type="text/css" href="styles/product.css">
	<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="images\mundotec.png">
</head>

<body>
<!-- Menu -->
<?php
    include 'componentes/seguridad.php'; 
    include 'db/db_model.php'; 
 
    $p_token  = $_GET["token"];
    //echo $p_token;
    $dato_desencriptado = desencriptar_parametro($p_token);
    $separador = "|";
    $separada = explode($separador, $dato_desencriptado);

    $pusuario           = $separada[0];
	$pcompracarrito     = $separada[1];
    $pcodigo            = $separada[2];
    $pcategoriacodigo   = $separada[3];
    $pcategorianombre   = $separada[4];

  //  $token          = $pusuario."|0|".$pcodigo."|".$pcategoriacodigo."|".$pcategorianombre;

	echo $pusuario."|".$pcompracarrito."|".$pcodigo."|".$pcategoriacodigo."|".$pcategorianombre."<br>";


	if ($pcompracarrito <> "0")
	{
			echo " hay que registrar venta "."<br>";

			//Regristo de carrito de venta
			$pproductoid 			 = $pcodigo;
			$p_itemsDetalleVenta     = array();

			$postDataDetalleVenta    = array(
											'venta' => array(
																'venta_id' => 0),            
											'producto' => array(
																'producto_id' => $pproductoid),
											'cantidad_ventadetalle' => $pcompracarrito,
											'estado' => '1'); 

			$p_itemsDetalleVenta[] = $postDataDetalleVenta;
			
			$postData               = array(


											'cliente' => array(
													'cliente_id' => $pusuario),
											'estado_venta' => '1',

											'itemsVentadetallecarritos' => $p_itemsDetalleVenta
										);      


			$objDB = new db_model();

			$p_rptJson = $objDB->ventacarrito_registrar($postData);


			$p_adicionarVenta = json_decode($p_rptJson, true);

			$p_codigorpt    = $p_adicionarVenta['mensaje_id'];
			$p_mensajerpt   = $p_adicionarVenta['mensaje'];
			
			if ($p_codigorpt == '0')
			{
			$p_codigoproducto     = '';
			$p_cantidad           = '';
			$p_precio             = '';
			$p_mensajerpt            = '¡registro de detalle exitoso!'; 
			}

			echo "mensaje : ".$p_mensajerpt."\n";

	}

	

	$token 			= $pusuario."|0|0|".$pcategoriacodigo."|".$pcategorianombre;
	$tokenCarrito	= $pusuario."|1|".$pcodigo."|".$pcategoriacodigo."|".$pcategorianombre;

    $pagina_origen = "categoria.php?token=".encriptar_parametro($token);

	$objDB              = new db_model();

	$p_rptJson          = $objDB->producto_buscar($pcodigo);

	$p_itemProducto   = json_decode($p_rptJson, true);

?>	

<!-- Menu -->
<div class="super_container">

	<!-- Header -->
	<header class="header">
		<div class="header_overlay">

        </div>
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			

				<!-- User -->
				<?php include "loginsistema.php"; ?>


		
		</div>
	</header>

	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Home -->
		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">
						Detalle Del Producto
					</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="index.php" style="font-size: 20px;">Inicio</a></li>
							<li><a href="<?php echo $pagina_origen; ?>" style="font-size: 20px;"><?php echo $pcategorianombre; ?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Product -->
		<div class="product">
			<div class="container">
				<div class="row">
					
					<!-- Product Image -->
					<div class="col-lg-6">
						<div class="product_image_slider_container">

									<li>
										<img src="productos/<?php echo $p_itemProducto['subcategoria_id']."/".$p_itemProducto['producto_id'].".jpg"; ?>" />
									</li>

							<!--
							<div id="slider" class="flexslider">
								<ul class="slides">
									<li>
										<img src="productos/<?php echo $p_itemProducto['subcategoria_id']."/".$p_itemProducto['producto_id'].".jpg"; ?>" />
									</li>
								</ul>
							</div>
							-->
						</div>
					</div>


					<!-- Product Info -->
					<div class="col-lg-4 product_col">
						<div class="product_info">
							<div class="product_name"><?php echo $p_itemProducto['nombre']; ?></div>
							<div class="product_category">
								<a href="computadoras.html">Categoria</a>			
							</div>
							
							<div class="product_price text-center"><spna>S/. <?php echo $p_itemProducto['precio']; ?></span></div>
							
							<div class="product_text">
								<p><?php echo $p_itemProducto['descripcion']; ?></p>
							</div>
							<div class="product_buttons">
								<div class="text-right d-flex flex-row align-items-start justify-content-start">
									<div class="text-center d-flex flex-column align-items-center justify-content-center">
										<h style="font-size: 25px; color: darkgray;"><?php if ($p_itemProducto['stock'] > 0) { echo "DISPONIBLE"; }else{ echo "SIN STOCK"; }?></h>
									</div>
									<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
										<?php 
											if ($p_itemProducto['stock'] > 0)
											{
                                        ?>
												<a href="producto.php?token=<?php echo encriptar_parametro($tokenCarrito); ?>">
												<div><div><img src="images/cart.svg" class="svg" alt=""><div></div></a></div></div>

										<?php
											}else
											{
                                        ?>
												<div><div><img src="images/cart.svg" class="svg" alt=""><div></div></div></div>

										<?php
                                            }
                                        ?>



									</div>
								</div>
							</div>
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
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/progressbar/progressbar.min.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="plugins/flexslider/jquery.flexslider-min.js"></script>
	<script src="js/product.js"></script>
</div>
</body>
</html>
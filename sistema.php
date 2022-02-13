<!DOCTYPE html>
<html lang="en">

<head>
	<title>INDEX</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Little Closet template">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Plugins CSS File -->
	<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">

	<!-- Main CSS File -->
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/category.css">
	<link rel="stylesheet" type="text/css" href="styles/category_responsive.css">
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
</head>
        
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="images\MUNDOTEC.png">

<body>

<?php 
    include 'componentes/seguridad.php'; 
    include 'db/db_model.php'; 






?>


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

				<!-- Home Slider -->
				<div class="home_slider_container">
					<div class="owl-carousel owl-theme home_slider">

						<!-- Slide -->
						<div class="owl-item">
							<div class="background_image" style="background-image:url(images/fondo.jpg);  height: 1000px;"></div>
							<div class="container fill_height">
								<div class="row fill_height">
									<div class="col fill_height">
										<div class="home_container d-flex flex-column align-items-center justify-content-start">
											<div class="home_content">
												<div class="home_title">BIENVENIDO A MUNDOTEC</div>
												<div class="home_subtitle">TODO LO NUEVO EN PRODUCTOS TECNOL&OacuteGICOS</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>

						<div class="owl-item">
							<div class="background_image" style="background-image:url(images/fondo.jpg)"></div>
							<div class="container fill_height">
								<div class="row fill_height">
									<div class="col fill_height">
										<div class="home_container d-flex flex-column align-items-center justify-content-start">
											<div class="home_content">

											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>

						<div class="owl-item">
							<div class="background_image" style="background-image:url(images/fondo.jpg)"></div>
							<div class="container fill_height">
								<div class="row fill_height">
									<div class="col fill_height">
										<div class="home_container d-flex flex-column align-items-center justify-content-start">
											<div class="home_content">

											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
						
						<div class="owl-item">
							<div class="background_image" style="background-image:url(images/fondo.jpg)"></div>
							<div class="container fill_height">
								<div class="row fill_height">
									<div class="col fill_height">
										<div class="home_container d-flex flex-column align-items-center justify-content-start">
											<div class="home_content">

											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div>

				<div class="home_slider_nav home_slider_nav_prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
				<div class="home_slider_nav home_slider_nav_next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>

				<!-- Home Slider B -->
				<div class="home_slider_dots_container">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="home_slider_dots">
									<ul id="home_slider_custom_dots" class="home_slider_custom_dots d-flex flex-row align-items-center justify-content-center">
										<li class="home_slider_custom_dot active">01</li>
										<li class="home_slider_custom_dot">02</li>
										<li class="home_slider_custom_dot">03</li>
										<li class="home_slider_custom_dot">04</li>
									</ul>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>




			<!-- Productos -->
			<div class="products">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 offset-lg-3">
							<div class="section_title text-center" style="font-size: 50px;"><h>CATEGORIAS</h></div>
						</div>
					</div>

					<div class="row products_row">

						<?php
							$p_campo_dato = "Partes PC";
							$objDB = new db_model();

							$p_rptJson = $objDB->categoria_listar();

							if (isset($p_rptJson) == null)
							{
								$p_itemsCategoria= array();
							}else
							{
								$p_itemsCategoria = json_decode($p_rptJson, true);
							}
		
							
							$pusuario = "9"; //$gg_pp_codigo_usuario;

							foreach ($p_itemsCategoria as $p_itemCategoria) 
							{
								$pcategoriacodigo = $p_itemCategoria['categoria_id'];  

								  
								$pcategorianombre = $p_itemCategoria['descripcion']; 
								$pcompracarrito	  = "0"; 
								$pproductoid	  = "0"; 

								$token = $pusuario."|".$pcompracarrito."|".$pproductoid."|".$pcategoriacodigo."|".$pcategorianombre;
													

						?>

								<!-- Producto -->
								<div class="col-xl-4 col-md-6">
									<div class="product">
										<div class="product_image"><img src="categorias/<?php echo $pcategoriacodigo; ?>.jpg" alt="" style="vertical-align: middle;"></div>
										<div class="product_content">
											<ul class="align-items-start justify-content-center">
												<li class="active" style="text-align: center;"><a href="categoria.php?token=<?php echo encriptar_parametro($token); ?>"><h2><?php echo $pcategorianombre; ?></h2></a></li>
												<!-- <li class="active" style="text-align: center;"><a href="partespc.php"><h2>Partes De PC</h2></a></li> -->
											</ul>
										</div>
									</div>
								</div>

						<?php
                        	}

               			?>
		

					</div>
				</div>
			</div>
		</footer>

		<footer class="footer" style="background-color:#216af4">
            <div class="container">
                <div class="footer-middle">
                    <div class="row row-sm">
                        <div class="col-md-1 col-lg-3" style="margin-left: 200px;">
                            <div class="widget">
                                <h3 class="widget-title" style="color:white">Acerca de la Empresa</h3>
                                <div class="widget-content">
                                    <ul>
                                        <li><a href="" style="color:white">Sobre Nosotros</a></li> &nbsp;
										<li><a href="http://172.96.143.27/tecnomark-main/index.php" style="color:white">Gesti&#243n Administraci&#243n</a></li>
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
                <div class="footer-bottom" style="display:block;text-align:center;color:white">
                    <p style="color:white">@ MundoTec 2022 - Todos los derechos reservados</p>
                </div>
            </div>
        </footer>

    <!-- Main JS File -->
    <script src="https://www.datamundo.pe/public/web/assets/js/main.min.js"></script>

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
	<script src="js/custom.js"></script>
    
   </body>
   </html>
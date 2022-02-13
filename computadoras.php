<!DOCTYPE html>
<html lang="en">
<head>
<title>Category</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Little Closet template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/category.css">
<link rel="stylesheet" type="text/css" href="styles/category_responsive.css">
</head>
<body>

<!-- Menu -->
<?php include 'componentes/seguridad.php'; ?> 
<?php include 'db/db_model.php'; ?>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="header_overlay"></div>
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			
			<a href="https://www.datamundo.pe" class="logo">
                            <img src="https://www.datamundo.pe/public/web/assets/images/logo_nuevo.png" style="width:250px">
                        </a>
			<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
				<!-- Search -->
				<div class="header_search">
					<form action="#" id="header_search_form">
						<input type="text" class="search_input" placeholder="Search Item" required="required">
						<button class="header_search_button"><img src="images/search.png" alt=""></button>
					</form>
				</div>
				<!-- Cart -->
				<div class="cart"><a href="carritocompra.php"><div><img class="svg" src="images/cart.svg" alt=""></div></a></div>
				
			</div>
		</div>
	</header>

	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Home -->

		<div class="home">
                <div class="home_container d-flex flex-column align-items-center justify-content-end">
                    <div class="home_content text-center">
                        <div class="home_title">Computadoras</div>
                        <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                            <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                                <li><a href="index.php">Inicio</a></li>
				
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

		<!-- Products -->

		
				<div class="row products_row products_container grid">
					

                <?php
                        $p_campo_dato = "Computadores";
                        $objDB = new db_model();

                        $p_rptJson = $objDB->producto_listar_porcategoria($p_campo_dato);

                        if (isset($p_rptJson) == null)
                        {
                          $p_itemsProducto= array();
                        }else
                        {
    
                          $p_itemsProducto = json_decode($p_rptJson, true);
                        }
    
                        
    
                        $pusuario = "1"; //$gg_pp_codigo_usuario;

                        foreach ($p_itemsProducto as $p_itemProducto) 
                        {
                            $pcodigo = $p_itemProducto['producto_id'];  

                            $pcategoriacodigo = $p_itemProducto['categoria_id'];   
                            $pcategorianombre = $p_itemProducto['nombre_categoria'];  

                            $token = $pusuario."|".$pcodigo."|".$pcategoriacodigo."|".$pcategorianombre;
                            

                ?>


                            <!-- Product -->
                            <div class="col-xl-4 col-md-6 grid-item new">
                                <div class="product">
                                    <div class="product_image"><img src="productos/<?php echo $p_itemProducto['subcategoria_id']."/".$p_itemProducto['producto_id'].".jpg"; ?>" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                            <div>
                                                <div>
                                                    <div class="product_name"><a href="producto.php?token=<?php echo encriptar_parametro($token); ?>"><?php echo $p_itemProducto['nombre']; ?></a></div>
                                                    <div class="product_category">In <a href="#"><?php echo $p_itemProducto['nombre_subcategora']; ?></a></div>
                                                </div>
                                            </div>
                                            <div class="ml-auto text-right">
                                                <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                <div class="product_price text-right">S/.<span><?php echo $p_itemProducto['precio']; ?></span></div>
                                            </div>
                                        </div>
                                        <div class="product_buttons">
                                            <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                                    <div><div><img src="images/heart_2.svg" class="svg" alt=""><div>+</div></div></div>
                                                </div>
                                                <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                    <div><div><img src="images/cart.svg" class="svg" alt=""><div>+</div></div></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                <?php
                        }

                ?>

            </div>



				<div class="row page_nav_row">
					<div class="col">
						<div class="page_nav">
							<ul class="d-flex flex-row align-items-start justify-content-center">
								<li class="active"><a href="#">01</a></li>
								<li><a href="#">02</a></li>
								<li><a href="#">03</a></li>
								<li><a href="#">04</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		
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
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/Isotope/fitcolumns.js"></script>
<script src="js/category.js"></script>
</body>
</html>
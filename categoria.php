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
    $pproductoid        = $separada[2];
    $pcategoriacodigo   = $separada[3];
    $pcategorianombre   = $separada[4];
 
    // $token = $pusuario."|".$pcompracarrito."|".$pproductoid."|".$pcodigocategoria."|".$pcategorianombre;

    echo $pusuario."|".$pcompracarrito."|".$pproductoid."|".$pcategoriacodigo."|".$pcategorianombre."<br>";

    if ($pcompracarrito <> "0")
    {
        echo " hay que registrar venta "."<br>";

        //Regristo de carrito de venta

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
                <div class="home_container d-flex flex-column align-items-center justify-content-end">
                    <div class="home_content text-center">
                        <div class="home_title"><?php echo $pcategorianombre; ?></div>
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
                        $p_campo_dato = $pcategorianombre;
                        $objDB = new db_model();

                        $p_rptJson = $objDB->producto_listar_porcategoria($p_campo_dato);

                        if (isset($p_rptJson) == null)
                        {
                          $p_itemsProducto= array();
                        }else
                        {
    
                          $p_itemsProducto = json_decode($p_rptJson, true);
                        }
    
                        
                       // $pusuario = "1"; //$gg_pp_codigo_usuario;

                        foreach ($p_itemsProducto as $p_itemProducto) 
                        {
                            $pcodigo = $p_itemProducto['producto_id'];  

                            $pcategoriacodigo = $p_itemProducto['categoria_id'];   
                            $pcategorianombre = $p_itemProducto['nombre_categoria'];  

                            $token          = $pusuario."|0|".$pcodigo."|".$pcategoriacodigo."|".$pcategorianombre;

                            $tokenCarrito   = $pusuario."|1|".$pcodigo."|".$pcategoriacodigo."|".$pcategorianombre;
                                            

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
                                                    <h style="font-size: 25px; color: darkgray;">Stock : <?php echo $p_itemProducto['stock']; ?></h>
                                                </div>

                                                <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                    <?php 
                                                        if ($p_itemProducto['stock'] > 0)
                                                        {
                                                    ?>
                                                            <a href="categoria.php?token=<?php echo encriptar_parametro($tokenCarrito); ?>">
                                                            <div><div><img src="images/cart.svg" class="svg" alt=""><div>+</div></a></div></div>
                                                    <?php
                                                        }else
                                                        {
                                                    ?>
                                                            <div><div><img src="images/cart.svg" class="svg" alt=""><div>+</div></div></div>

                                                    <?php
                                                        }
                                                    ?>

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
<!DOCTYPE html>
<html lang="en">
<head>
	<title>INICIAR SESIÓN</title>
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
<?php
    include 'componentes/seguridad.php'; 
    include 'db/db_model.php'; 


	if (isset($_SESSION['p_codigorpt_login']) == null)
	{

	  $p_codigorpt_login 	= '';
	  $p_mensajerpt_login 	= '';		
	  $p_codigorpt 			= '';
	  $p_mensajerpt 		=  '';


	  $p_email_login 		= '';
	  $p_clave_login		= '';			
	  $p_nombre 			= '';
	  $p_apellido 			= '';
	  $p_usuario		  	= '';
	  $p_clave				= '';
	  $p_claveconfirmacion	= '';
	  $p_telefono 			= '';
	  $p_correo 			= '';
	  $p_direccion 			= '';
	  $p_num_doc 			= '';
	  $p_estado 			= '';
	  $p_codigotipodocumento = '';


	}
	else
	{

	  $p_codigorpt_login 	= $_SESSION['p_codigorpt_login'];
	  $p_mensajerpt_login 	= $_SESSION['p_mensajerpt_login'];  		
	  $p_codigorpt 			= $_SESSION['p_codigorpt'];
	  $p_mensajerpt 		= $_SESSION['p_mensajerpt'];    

	  $p_email_login 		= $_SESSION['p_email_login'];
	  $p_clave_login		= $_SESSION['p_clave_login'];			
	  $p_nombre 			= $_SESSION['p_nombre'];
	  $p_apellido 			= $_SESSION['p_apellido'];
	  $p_usuario		  	= $_SESSION['p_usuario'];
	  $p_clave				= $_SESSION['p_clave'];
	  $p_claveconfirmacion	= $_SESSION['p_claveconfirmacion'];
	  $p_telefono 			= $_SESSION['p_telefono'];
	  $p_correo 			= $_SESSION['p_correo'];
	  $p_direccion 			= $_SESSION['p_direccion'];
	  $p_num_doc 			= $_SESSION['p_num_doc'];
	  $p_estado 			= $_SESSION['p_estado'];
	  $p_codigotipodocumento = $_SESSION['p_codigotipodocumento']; 
	  


	}


?>

<!-- Menu -->
<div class="super_container">

	<!-- Header -->
	<header class="header">
	</header>

	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Home -->
		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home">
					<div class="home_container d-flex flex-column align-items-center justify-content-end">
						<div class="home_content text-center">
							<a class="home_title" href="index.php">Inicio</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<main class="main">
		<div class="container" style="margin-top: 50px;">
			<div class="row">
				<div class="col-md-6">
					<div class="heading">
						<h2 class="title" style="text-align: center;">Iniciar Sesión</h2>
						<p style="text-align: center;">Si ya tiene una cuenta, puede iniciar sesión.</p>
					</div>

					<form role="form" method="POST" action="login.php" style="margin-top: 25px;">
						
							<div class="form-group">
								<label for="example-email" style="color:#6b717e">Email</label>
								<input type="text"  class="form-control form-control-line" name="email_login" id="email_login" value="<?php echo $p_email_login; ?>">	
							</div>
							<div class="form-group">
								<label for="example-password" style="color:#6b717e">Contraseña</label>
								<input id="password_login" type="password" name="password_login" class="form-control form-control-line">
								
							</div>

							<div class="form-group">
								  	<div>
											<?php 	if ($p_codigorpt_login <> "" )
													{  
														if ($p_codigorpt_login == '0')
														{
											?>
															<div class="mensaje-exitoso">
															<i class="fas fa-check-square"></i>
																<?php  print_r($p_mensajerpt_login);  ?>
															</div>
											<?php 
														}else
														{
											?>
															<div class="mensaje-alerta">
																<i class="fas fa-exclamation-triangle"></i>
																<?php  print_r($p_mensajerpt_login);  ?>
															</div>              
											<?php
														}
													}
											?>
									</div>
								</div>							

							<div class="form-footer">
								<!-- <button type="submit" class="btn btn-primary" style="background-color: #00BFFF; border: #00BFFF; border-radius: 5px; margin-left: 200px;">INICIAR SESIÓN</button>  -->
								<input class="btn btn-primary" style="background-color: #00BFFF; border: #00BFFF; border-radius: 5px; margin-left: 200px;" type="submit" name="boton_iniciarsesion" id="boton_iniciarsesion"  value="INICIAR SESIÓN" />
							</div>
							<input type="hidden" name="token" value="">
					</form>
				</div>

				<div class="col-md-6">
					<div class="heading">
						<h2 class="title" style="text-align: center;">Crear Cuenta</h2>
						<p>Debe tener una cuenta con nosotros para poder realizar alguna compra.</p>
					</div>

						<form role="form" method="POST" action="login.php" style="margin-top: 25px;">
							<input type="hidden" name="token" value="">
								<div class="form-group">
									<label for="nombres" class="control-label" style="color:#6b717e">Nombres</label>
									<div >
										<input id="nombres" type="text" class="form-control" name="nombres" value="<?php echo $p_nombre; ?>" onkeypress="return soloLetras(event)">
									</div>
								</div>

								<div class="form-group">
									<label for="apellidos" class="control-label" style="color:#6b717e">Apellidos</label>
									<div >
										<input id="apellidos" type="text" class="form-control" name="apellidos" value="<?php echo $p_apellido; ?>" onkeypress="return soloLetras(event)">
									</div>
								</div>

								<div class="form-group">
									<label for="TipoDocumento" class="control-label" style="color:#6b717e">Tipo Documento</label>
									<div >
										
											<!--<input id="apellidos" type="text" class="form-control" name="apellidos" value="" onkeypress="return soloLetras(event)"> -->

											<select name="lista_tipodocumento" id="lista_tipodocumento" class="form-control" >

												<?php
													$objDBLis = new db_model();
													$p_rptJson = $objDBLis->tipodoc_listar();

													$p_itemsTipodoc = json_decode($p_rptJson, true);

													foreach ($p_itemsTipodoc as $p_itemTipodoc) 
													{
														$p_lineaLista = "<option value=".$p_itemTipodoc['tipodocumento_id'].">".$p_itemTipodoc['descripcion']."</option>";
														if ($p_codigotipodocumento == $p_itemTipodoc['tipodocumento_id'] )
														{
															$p_lineaLista = "<option value=".$p_itemTipodoc['tipodocumento_id']." selected >".$p_itemTipodoc['descripcion']."</option>";
														}
														echo $p_lineaLista;
													}
												?>
											</select>


									</div>
								</div>

								<div class="form-group">
									<label for="dni" class="control-label" style="color:#6b717e">Nro. Documento</label>
									<div >
										<input id="nrodocumento" type="number" class="form-control" name="nrodocumento" value="<?php echo $p_num_doc; ?>" onkeypress="return soloNumeros(event)" maxlength="8">
									</div>
								</div>

								<div class="form-group">
									<label for="direccion" class="control-label" style="color:#6b717e">Dirección</label>
									<div >
										<input id="direccion" type="text" class="form-control" name="direccion" value="<?php echo $p_direccion; ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="telefono" class="control-label" style="color:#6b717e">Telefóno</label>
									<div >
										<input id="telefono" type="text" class="form-control" name="telefono" value="<?php echo $p_telefono; ?>">
									</div>
								</div>								



								<div class="form-group">
									<label for="email" class="control-label" style="color:#6b717e">Email</label>
									<div >
										<input id="email" type="email" class="form-control" name="email" value="<?php echo $p_correo; ?>">
									</div>
								</div>
                                
								<div class="form-group">
									<label for="password" class="control-label" style="color:#6b717e">Clave</label>
									<div >
										<input id="password" type="password" class="form-control" name="password" value="<?php echo $p_clave; ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="password_confirmation" class="control-label" style="color:#6b717e">Confirmar Clave</label>
									<div>
										<input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="<?php echo $p_claveconfirmacion; ?>">
									</div>
								</div>
								
		  						<div class="form-group">
								  	<div>
											<?php 	if ($p_codigorpt <> "" )
													{  
														if ($p_codigorpt == '0')
														{
														?>
															<div class="mensaje-exitoso">
															<i class="fas fa-check-square"></i>
																<?php  print_r($p_mensajerpt);  ?>
															</div>
														<?php 
														}else
														{
														?>
															<div class="mensaje-alerta">
																<i class="fas fa-exclamation-triangle"></i>
																<?php  print_r($p_mensajerpt);  ?>
															</div>              
														<?php
														}
													}
											?>
									</div>
								</div>

								<div class="form-footer">
								<!--	<button type="submit" name="boton_crearcuenta" id="boton_crearcuenta"  class="btn btn-primary" style="background-color: #00BFFF; border: #00BFFF; border-radius: 5px; margin-left: 200px;">CREAR CUENTA</button>		-->
									<input class="btn btn-primary" style="background-color: #00BFFF; border: #00BFFF; border-radius: 5px; margin-left: 200px;" type="submit" name="boton_crearcuenta" id="boton_crearcuenta"  value="CREAR CUENTA" />
								</div>
						</form>
					</div>
				</div>
		</div>
	</main>

	&nbsp;
	&nbsp;

	<footer class="footer" style="background-color:#216af4">
        &nbsp;
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
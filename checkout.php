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
      // Verificar el detalle a imprimir.
	  $pusuario = "9";
      $objDB = new db_model();

      $p_rptJson = $objDB->cliente_buscar($pusuario);


      $p_editarCliente = json_decode($p_rptJson, true);
      
      $p_codigo              = $p_editarCliente['cliente_id'];
      $p_nombre 		         = $p_editarCliente['nombres'];
      $p_apellido 		       = $p_editarCliente['apellidos'];
      $p_usuario		         = $p_editarCliente['usuario'];
      $p_clave			         = $p_editarCliente['clave'];
      $p_telefono            = $p_editarCliente['telefono'];
      $p_correo              = $p_editarCliente['correo'];
      $p_direccion           = $p_editarCliente['direccion'];
      $p_num_doc             = $p_editarCliente['num_doc'];
      $p_estado              = $p_editarCliente['estado'];
      $p_codigotipodocumento = $p_editarCliente['tipodocumento_id']; 
     



?>

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
						<a class="home_title" href="carritocompra.php">Pasarela De Pago</a>
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
						<form action="pasareladepago.php" method="post" name="pedido" id="pedido" enctype="multipart/form-data">
							<input type="hidden" name="token" value="">
							<input type="hidden" name="id_cliente" id="id_cliente" value="">
							<input type="hidden" name="id_pago_unico" id="id_pago_unico" value="">
							<input type="hidden" name="costo_envio" id="costo_envio" value="0.00">
							<input type="hidden" name="id_mercado_pago" id="id_mercado_pago" value="">
							<input type="hidden" name="url_mercado_pago" id="url_mercado_pago" value="">
																			  	   
						<div class="checkout-payment">
							<div id="new-checkout-address" class="show">
								<div class="row">				
									<div class="col-md-6">  
										<div class="form-group required-field">
											<label>Nombres</label>
											<input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $p_editarCliente['nombres']; ?>" onkeypress="return soloLetras(event)">
										</div>
									</div>

									<div class="col-md-6"> 
										<div class="form-group required-field">
											<label>Apellidos </label>
											<input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $p_editarCliente['apellidos']; ?>" onkeypress="return soloLetras(event)">
										</div>
									</div>

									<div class="col-md-6">  
										<div class="form-group required-field">
											<label>Tipo Documento</label>

											<select class="form-control" id="tipodocumento" name="tipodocumento"> 

													<?php
														$objDBLis = new db_model();
														$p_rptJson = $objDBLis->tipodoc_listar();

														$p_itemsTipodoc = json_decode($p_rptJson, true);

														foreach ($p_itemsTipodoc as $p_itemTipodoc) 
														{
															$p_lineaLista = "<option value=".$p_itemTipodoc['tipodocumento_id'].">".$p_itemTipodoc['descripcion']."</option>";
															if ($p_editarCliente['tipodocumento_id'] == $p_itemTipodoc['tipodocumento_id'] )
															{
																$p_lineaLista = "<option value=".$p_itemTipodoc['tipodocumento_id']." selected >".$p_itemTipodoc['descripcion']."</option>";
															}
															echo $p_lineaLista;
														}
													?>

											</select>
											


										</div>
									</div>

									<div class="col-md-6"> 
										<div class="form-group required-field">
											<label>Número de Documento</label>
											<input type="text" class="form-control" name="nrodocumento" id="nrodocumento" value="<?php echo $p_editarCliente['num_doc']; ?>" onkeypress="return soloNumeros(event)" maxlength="8">
										</div>
									</div>

									<div class="col-md-6">  
										<div class="form-group required-field">
											<label>Email</label>
											<input type="text" class="form-control" name="email" id="email" value="<?php echo $p_editarCliente['correo']; ?>">
										</div>
									</div>

									<div class="col-md-6"> 
										<div class="form-group required-field">
											<label>Número de Teléfono</label>
											<input type="text" class="form-control" name="nrotelefono" id="nrotelefono" value="<?php echo $p_editarCliente['telefono']; ?>" onkeypress="return soloNumeros(event)" maxlength="9">
										</div>
									</div>


									<div class="col-md-6">  
										<div class="form-group required-field">
											<label>Dirección Cliente</label>
											<input type="text" class="form-control" name="direccioncliente" id="direccioncliente" value="<?php echo $p_editarCliente['direccion']; ?>">
										</div>
									</div>

									<div class="col-md-6"> 
										<div class="form-group required-field">
											<label>Dirección Entrega</label>
											<input type="text" class="form-control" name="direccionentrega" id="direccionentrega" value="<?php echo $p_editarCliente['direccion']; ?>">
										</div>
									</div>

				
								</div>					
							</div>

							<hr style="margin-top:15px; margin-bottom: 25px;">
								<b>MÉTODO DE PAGO</b><br><br>
								<div class="col-md-12"> 
									<div class="form-group">
									   <label>
											<table>
												<tbody> 
													<tr>
														<td valign="top">  
															<input name="pago" id="pago"  type="radio" value="pagotransferencia" checked style="position: relative;top: 0;left: 0;height: 25px;width: 25px;background-color: #eee;float:left">
														</td>
														<td>
															<div style="float: left;padding-left:10px">
																<b>TRANSFERENCIA BANCARIA</b><br>
																	Puedes generar la compra mediante deposito o transferencia a nuestras cuentas bancarias oficiales en soles:<br><br>
																	<div class="row" style="padding:0px">
																		<div class="col-md-3" style="padding-bottom:8px">
																			<b>BCP</b>
																		</div>
																		<div class="col-md-9" style="padding-bottom:8px">
																			SOLES   191-90345131-0-06<br>
																			CCI     00219119034513911452
																		</div>
																		<div class="col-md-3" style="padding-bottom:8px">
																			<b>INTERBANK</b>
																		</div>
																		<div class="col-md-9" style="padding-bottom:8px">
																			SOLES   488-3002201752<br>
																			CCI     003-488-003002201752-46
																		</div>
																		<div class="col-md-3" style="padding-bottom:8px">
																			<b>BBVA</b>
																		</div>
																		<div class="col-md-9" style="padding-bottom:8px">
																			SOLES   00-11017-502003027-0575<br>
																			CCI     011175000-20030-270575
																		</div>
																	</div><br>
																	Tu pedido no se procesará hasta que se haya recibido el importe en nuestra cuenta.
															</div>
														</td>
													</tr>
										 		</tbody>
											</table>
										</label>
									</div>				
								</div>

								<div class="col-md-12"> 
									<div class="form-group">
										<label>
											<table>
												<tbody>
													<tr>
														<td valign="top">     
															<input name="pago" id="pago"  type="radio" value="pagotarjeta" style="position: relative;top: 0;left: 0;height: 25px;width: 25px;background-color: #eee;float:left">
														</td>
														<td>
															<div style="float: left;padding-left:10px">
																<b>PAGO CON TARJETAS - PRÓXIMAMENTE</b><br>
																Recuerda que la compra con tarjeta de crédito o débito, tiene un recargo del 5%.<br><br>
																Paga con las siguientes tarjetas de crédito <br>
																<img src="images/pagos.jpg">
															</div>
														</td>
													</tr>
										 		</tbody>
											</table>
										</label>
									</div>
								</div>
														
								<div class="clearfix">

								<!--	<a href="pasareladepago.php" style="border:0px; border-radius:10px; float:left" class="btn btn-primary float-right guardar_pedido">FINALIZAR COMPRA</a>	-->
									<input style="border:0px; border-radius:10px; float:left" class="btn btn-primary float-right guardar_pedido" type="submit" name="boton_guardar" id="" value="FINALIZAR COMPRA" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-lg-4" style="margin-left: 50px;">
				<div class="cart-summary" style="background-color:#f2f2f2; border: 1px solid #6F6E6E;">
					<h4 style="color:#00BFFF; text-align: center; font-size: 25px; padding-top: 5px;">RESUMEN DE COMPRA</h4>

					<table class="table table-totals">
						<tbody>
							<tr>
								<td style="font-size:15px; padding-top:20px">Productos (1)</td>
								<td style="color:#FF3349; padding-top:20px; font-size:15px"><b> S/ 599.00</b></td>
							</tr>
						</tbody>
					</table>
					
					<table class="table table-totals">
						<tbody>
							<tr>
								<td>
									<img src="images/1.jpg" style="max-width:100px; width:100px; height: auto;">
								</td>
								<td>
									<b>TRUST RESTO GAMING CHAIR GXT 707 GREY - PESO 23 KG - RESPALDO ERGONOMICO - GIRATORIA 360° - 5 RUEDAS - MULTIDIRECCIONALES- CILINDRO ELEVADOR CLASE 4 - CUERO DE PU</b>
									<br>
										1 Unidad
									<br>
										S/599.00
								</td>
							</tr>
						</tbody>
					</table>

					<button class="button" style="padding-left: 10px; padding-right: 10px; line-height: 30px; margin-left: 175px; background-color: #00BFFF; border: #00BFFF; border-radius: 5px;">
						<a href="carritocompra.php" style="font-size: 18px; color: #FFFFFF;">VOLVER AL CARRITO DE COMPRA</a>
					</button>

					<table class="table table-totals" style="margin-top: 25px;">
						<tbody>
						<tr>
							<td>
							<b>Costo de Despacho</b><br>
							(Retiro en Tienda)
							</td>
							<td>S/ 0.00</td>
						</tr>
						<tr>
							<td><b>Monto Final a Pagar</b></td>
							<td><b>S/ 599.00</b></td>
						</tr>
						</tbody>
					</table>
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
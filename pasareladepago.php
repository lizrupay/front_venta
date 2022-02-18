<?php

			$p_formapago  = stripslashes($_POST['pago']);

			$p_nombres  = stripslashes($_POST['nombres']);
			$p_apellidos  = stripslashes($_POST['apellidos']);
			$p_tipodocumento  = stripslashes($_POST['tipodocumento']);
			$p_nrodocumento  = stripslashes($_POST['nrodocumento']);
			$p_email  = stripslashes($_POST['email']);
			$p_nrotelefono  = stripslashes($_POST['nrotelefono']);
			$p_direccioncliente  = stripslashes($_POST['direccioncliente']);
			$p_direccionentrega  = stripslashes($_POST['direccionentrega']);

			
			if ($p_formapago == "pagotransferencia")
			{

				include "pasareladepago_efectivo.php";
			}else
			{
				include "pasareladepago_tarjeta.php";
			}


?>


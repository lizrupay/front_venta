<?php

			$p_formapago  = stripslashes($_POST['pago']);

			echo "la forma de pago es:".$p_formapago ."<br>";
			if ($p_formapago == "pagotransferencia")
			{

				include "pasareladepago_efectivo.php";
			}else
			{
				include "pasareladepago_tarjeta.php";
			}


?>


<?php

    function checkLogin()
    {
		
      
            include 'db/db_model_login.php';

      
		    if($_POST){
      			$_SESSION['username']=stripslashes($_POST["email_login"]);
      			$_SESSION['passwort']=stripslashes($_POST["password_login"]); 
      			
      			      			
    		} 
        

    		$username = stripslashes($_POST["email_login"]);
    		$passwort = stripslashes($_POST["password_login"]); 


            //Consulta este lo puede jalar de alguna forma el cliente
            $postData = array(

            'usuario' => $username,
            'clave' => $passwort

            ); 

            // echo "dato json".json_encode($postData)."<br>";
            
            $objDB = new db_model_login();


            $p_rptJson = $objDB->cliente_validarlogin($postData);



            $p_usuarioLogin = json_decode($p_rptJson, true);

            if (isset($p_usuarioLogin['cliente_id']) == null)
            {

                  //  echo "MALLLLLL"."<br>";

                    session_start();
                    // Error en la validacion
                    $_SESSION['p_codigorpt_login']      = $p_usuarioLogin['mensaje_id'];
                    $_SESSION['p_mensajerpt_login']     = $p_usuarioLogin['mensaje'];  

                    $_SESSION['p_codigorpt']            = '';
                    $_SESSION['p_mensajerpt']           = '';

                    $_SESSION['cliente_id']             = "";
                    $_SESSION['cliente_nombreApellido'] = "";
                    $_SESSION['cliente_nombrePerfil']   = "";

                    $_SESSION['tiempo_inicio']  = time();    
                    
                    
                    $_SESSION['p_email_login']          = $username;
                    $_SESSION['p_clave_login']          = $passwort;
                    $_SESSION['p_nombre']               = '';
                    $_SESSION['p_apellido']             = '';
                    $_SESSION['p_codigotipodocumento']  = '';
                    $_SESSION['p_num_doc']              = '';
                    $_SESSION['p_direccion']            = '';
                    $_SESSION['p_telefono']             = '';
        
                    $_SESSION['p_usuario']              = '';
                    $_SESSION['p_correo']               = '';		
                    $_SESSION['p_clave']                = '';
                    $_SESSION['p_claveconfirmacion']    = '';

                    $_SESSION['p_estado']               = '';



            }else
            {
                    // Usuario logeado correctamente

               //     echo "BIENNN"."<br>";

                    session_start();


                    $_SESSION['p_codigorpt_login']      = '0';
                    $_SESSION['p_mensajerpt_login']     = '';

                    $_SESSION['p_codigorpt']            = '0';
                    $_SESSION['p_mensajerpt']           = '';                    

                    $_SESSION['cliente_id']             = $p_usuarioLogin['cliente_id'];
                    $_SESSION['cliente_nombreApellido'] = $p_usuarioLogin['nombres']." ".$p_usuarioLogin['apellidos'];
                    $_SESSION['cliente_nombrePerfil']   = "Cliente";

                    $_SESSION['tiempo_inicio']  = time();

            }
	
	}
			

    function CrearLogin()
    {
		
      
            include 'db/db_model_login.php';

      
		    if($_POST){
      			$_SESSION['username']=stripslashes($_POST["email"]);
      			$_SESSION['passwort']=stripslashes($_POST["password"]); 
      			
      			      			
    		} 
        

			$p_nombre 		          	= stripslashes($_POST['nombres']);
			$p_apellido 		      	= stripslashes($_POST['apellidos']);
			$p_codigotipodocumento 		= stripslashes($_POST['lista_tipodocumento']);
			$p_num_doc             		= stripslashes($_POST['nrodocumento']);
			$p_direccion           		= stripslashes($_POST['direccion']);
			$p_telefono            		= stripslashes($_POST['telefono']);

			$p_usuario		         	= stripslashes($_POST['email']);
			$p_correo              		= stripslashes($_POST['email']);			
			$p_clave			        = stripslashes($_POST['password']);
			$p_claveconfirmacion        = stripslashes($_POST['password_confirmation']);
            $_SESSION['p_estado']               = '';

			$p_estado              		= '1';


			if ($p_clave == $p_claveconfirmacion )
			{
                // Si la confirmación de clave es similar a ingresara se registra el usuario
			
				// Adicionar el registro
				
				$postData = array(
					'cliente_id' => '',
					'nombres' => $p_nombre,
					'apellidos' => $p_apellido,
					'usuario' => $p_usuario,
					'clave' => $p_clave,
					'telefono' => $p_telefono,
					'correo' => $p_correo,
					'direccion' => $p_direccion,
					'num_doc' => $p_num_doc,
					'estado' => $p_estado,
					'tipodocumento' => array(
										'tipodocumento_id' => $p_codigotipodocumento)

					);          
					


				$objDB = new db_model_login();

				$p_rptJson = $objDB->cliente_registrar($postData);


				$p_adicionarCliente = json_decode($p_rptJson, true);

				$p_codigorpt    = $p_adicionarCliente['mensaje_id'];
				$p_mensajerpt   = $p_adicionarCliente['mensaje'];
				$p_mensaje 		= $p_mensajerpt;


				if ($p_codigorpt == 0)
				{
                    // Tomar la información de usuario registrado
					
                    $postData = array(

                        'usuario' => $p_usuario,
                        'clave' => $p_clave
            
                        ); 

                    $p_rptJson = $objDB->cliente_validarlogin($postData);

                    $p_usuarioLogin = json_decode($p_rptJson, true);

                    if (isset($p_usuarioLogin['cliente_id']) <> null)
                    {
 
                        session_start();


                        $_SESSION['p_codigorpt_login']      = '';
                        $_SESSION['p_mensajerpt_login']     = '';
    
                        $_SESSION['p_codigorpt']            = '0';
                        $_SESSION['p_mensajerpt']           = '';   

                        
    
                        $_SESSION['cliente_id']             = $p_usuarioLogin['cliente_id'];
                        $_SESSION['cliente_nombreApellido'] = $p_usuarioLogin['nombres']." ".$p_usuarioLogin['apellidos'];
                        $_SESSION['cliente_nombrePerfil']   = "Cliente";
    
                        $_SESSION['tiempo_inicio']  = time();                         
                    }                
                    
				}else
                {
                    session_start();
                    // Error el momento de registrar la informacion del cliente
                    $_SESSION['p_codigorpt_login']      = '';
                    $_SESSION['p_mensajerpt_login']     = '';

                    $_SESSION['p_codigorpt']            = $p_codigorpt;
                    $_SESSION['p_mensajerpt']           = $p_mensajerpt ;   
    
                    $_SESSION['cliente_id']     = "";
                    $_SESSION['cliente_nombreApellido'] = "";
                    $_SESSION['cliente_nombrePerfil']   = "";
    
                    $_SESSION['tiempo_inicio']  = time();  
                    
                    
                    $_SESSION['p_email_login']          = '';
                    $_SESSION['p_clave_login']          = '';
                    $_SESSION['p_nombre']               = $p_nombre;
                    $_SESSION['p_apellido']             = $p_apellido;
                    $_SESSION['p_codigotipodocumento']  = $p_codigotipodocumento;
                    $_SESSION['p_num_doc']              = $p_num_doc;
                    $_SESSION['p_direccion']            = $p_direccion;
                    $_SESSION['p_telefono']             = $p_telefono;
        
                    $_SESSION['p_usuario']              = $p_usuario;
                    $_SESSION['p_correo']               = $p_correo;		
                    $_SESSION['p_clave']                = $p_clave;
                    $_SESSION['p_claveconfirmacion']    = $p_claveconfirmacion;
                    $_SESSION['p_estado']               = '1';



                }
			}
			else
			{

                session_start();
                // Error en la confirmacion de la clave al registrar
     
                $_SESSION['p_codigorpt_login']      = '';
                $_SESSION['p_mensajerpt_login']     = '';

                $_SESSION['p_codigorpt']            = '9';
                $_SESSION['p_mensajerpt']           = '¡ Confirmación de clave no es similar a su clave !'; 


                $_SESSION['p_codigorpt_login']      = $p_usuarioLogin['mensaje_id'];
                $_SESSION['p_mensajerpt_login']     = $p_usuarioLogin['mensaje'];

                $_SESSION['p_codigorpt']            = '0';
                $_SESSION['p_mensajerpt']           = '';                

                $_SESSION['cliente_id']     = "";
                $_SESSION['cliente_nombreApellido'] = "";
                $_SESSION['cliente_nombrePerfil']   = "";

                $_SESSION['tiempo_inicio']  = time();   

                $_SESSION['p_email_login']          = '';
                $_SESSION['p_clave_login']          = '';
                $_SESSION['p_nombre']               = $p_nombre;
                $_SESSION['p_apellido']             = $p_apellido;
                $_SESSION['p_codigotipodocumento']  = $p_codigotipodocumento;
                $_SESSION['p_num_doc']              = $p_num_doc;
                $_SESSION['p_direccion']            = $p_direccion;
                $_SESSION['p_telefono']             = $p_telefono;
    
                $_SESSION['p_usuario']              = $p_usuario;
                $_SESSION['p_correo']               = $p_correo;		
                $_SESSION['p_clave']                = $p_clave;
                $_SESSION['p_claveconfirmacion']    = $p_claveconfirmacion; 
                $_SESSION['p_estado']               = '1';               

			}


	}

	function getRealIP()
	{
	   
	   if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
	   {
	      $client_ip =
	         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
	            $_SERVER['REMOTE_ADDR']
	            :
	            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
	               $_ENV['REMOTE_ADDR']
	               :
	               "unknown" );
	   
	      // los proxys van añadiendo al final de esta cabecera
	      // las direcciones ip que van "ocultando". Para localizar la ip real
	      // del usuario se comienza a mirar por el principio hasta encontrar
	      // una dirección ip que no sea del rango privado. En caso de no
	      // encontrarse ninguna se toma como valor el REMOTE_ADDR
	   
	      $entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);
	   
	      reset($entries);
	      while (list(, $entry) = each($entries))
	      {
	         $entry = trim($entry);
	         if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
	         {
	            // http://www.faqs.org/rfcs/rfc1918.html
	            $private_ip = array(
	                  '/^0\./',
	                  '/^127\.0\.0\.1/',
	                  '/^192\.168\..*/',
	                  '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
	                  '/^10\..*/');
	   
	            $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
	   
	            if ($client_ip != $found_ip)
	            {
	               $client_ip = $found_ip;
	               break;
	            }
	         }
	      }
	   }
	   else
	   {
	      $client_ip =
	         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
	            $_SERVER['REMOTE_ADDR']
	            :
	            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
	               $_ENV['REMOTE_ADDR']
	               :
	               "unknown" );
	   }
	   
	   return $client_ip;
	   
	}
				
	?>


	<?php
		//$ipcliente = getRealIP();
		
   // $pboton = isset($_POST['btn_ingresa']) ? $_POST['btn_ingresa'] : '';
   
	$pboton_crear = isset($_POST['boton_crearcuenta']) ? $_POST['boton_crearcuenta'] : '';
	$pboton_login = isset($_POST['boton_iniciarsesion']) ? $_POST['boton_iniciarsesion'] : '';    

    echo "boton login : ".$pboton_login."boton crear :".$pboton_crear;

    If ($pboton_login)
	{

     // echo "inicio verificacion de login"."<br>";
      // Presiono iniciar sesión.hay que verificar.
			checkLogin(); 
     
								
	}else
    {
        If ($pboton_crear)
        {

                CrearLogin(); 
         
                                    
        }
    }

    
    
    if (isset($_SESSION['p_codigorpt']) == null)
    {
      //echo "primera vez Index.php"."<br>";
      include 'registro.php';
    }else
    {

      // echo "ya ingresoo enter codigo de error".$_SESSION['mensaje_id']." y mensaje es : ".$_SESSION['mensaje'] ."<br>";
        if ($_SESSION['p_codigorpt_login']=="0")
        {
        //  echo "bien  inicio";

         // echo "llamar a sistema"."<br>";
         include 'index.php';

        }else
        {
         // echo "codiog rpt no es 0";
          //include 'login.html';
          include 'registro.php';
        
        }	 
    }


?>
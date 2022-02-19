
<?php
	
	//esto se usa en todas las ventanas

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if(!isset($_SESSION['cliente_id'])) 
    { 
        //session_start(); 
        //echo " no existe sesion";

        $gg_pp_mensaje_id_error               =   '';
        $gg_pp_mensaje_error              =   '';

        $gg_pp_codigo_usuario             =   '';
        $gg_pp_nombreapellido_usuario =   '';
        $gg_pp_nombreperfil    =   '';

        

    }else
    { 

        //echo "se lee datos";

            $gg_pp_mensaje_id_error       =  $_SESSION['p_codigorpt_login'];
            $gg_pp_mensaje_error          =  $_SESSION['p_mensajerpt_login'];
        


            $gg_pp_codigo_usuario          =  $_SESSION['cliente_id'];
            $gg_pp_nombreapellido_usuario  =  $_SESSION['cliente_nombreApellido'];
            $gg_pp_nombreperfil            =  $_SESSION['cliente_nombrePerfil'];

            $_SESSION['p_codigorpt_login']        =   $gg_pp_mensaje_error;
            $_SESSION['p_mensajerpt_login']     =   $gg_pp_mensaje_id_error;

            $_SESSION['cliente_id']             =   $gg_pp_codigo_usuario;
            $_SESSION['cliente_nombreApellido'] =   $gg_pp_nombreapellido_usuario;
            $_SESSION['cliente_nombrePerfil']   =   $gg_pp_nombreperfil;


            
            
            //se obtiene el tiempo

            $inactivo = 360000000;
            //$inactivo = 6;

            if(isset($_SESSION['tiempo_inicio']) ) {
                $vida_session = time() - $_SESSION['tiempo_inicio'];
                if($vida_session > $inactivo)
                {
                    //session_destroy();
                    //header("Location: index.php");
                    
                    
                    /*
                    $pusuario =  '';
                    $pperfil  = '';
                    $pnperfil = '';
                    $plogin   = '';
                    $panexo   = '';


                    $_SESSION['mont_nombreusuario'] 	= $pusuario;
                    $_SESSION['mont_perfil']			= $pperfil;
                    $_SESSION['mont_nombreperfil']	    = $pnperfil;
                    $_SESSION['mont_login']			    = $plogin;
                    $_SESSION['mont_anexo'] 			= $panexo;
                    

                    header("Location: img_cerrar_session.php");
                    */


                }
            }

            $_SESSION['tiempo_inicio'] = time();

        }




?>

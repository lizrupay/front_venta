<?php
class api_model_venta{



		//-------- Tabla Ventas      --------
		//--------------------------------------------------	

    
    public function venta_buscar($p_codigo){

  
	
        $datojson = json_encode("");

        $rludato = 'http://172.96.143.27:8085/proyecto/tecnomarket/venta/buscar/'.$p_codigo;

        $curl = curl_init($rludato);
        


        curl_setopt_array($curl, array(
            // Indicar que vamos a hacer una petición POST
            CURLOPT_CUSTOMREQUEST => "GET",
            // Justo aquí ponemos los datos dentro del cuerpo
            CURLOPT_POSTFIELDS => $datojson,
            // Encabezados
            //CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($datojson), // Abajo podríamos agregar más encabezados
                'Personalizado: ¡Hola mundo!', # Un encabezado personalizado
            ),
            # indicar que regrese los datos, no que los imprima directamente
            CURLOPT_RETURNTRANSFER => true,
        ));


        # Hora de hacer la petición
        $resultado = curl_exec($curl);
        # Vemos si el código es 200, es decir, HTTP_OK
        $codigoRespuesta = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $arrayR = $resultado;
       

       

		return $arrayR;

    }  
    

    public function venta_editar($p_info_json){

  
        $p_codigo = $p_info_json['venta_id'];
        $datojson = json_encode($p_info_json);

        $rludato = 'http://172.96.143.27:8085/proyecto/tecnomarket/venta/editar/'.$p_codigo;


        $curl = curl_init($rludato);
        


        curl_setopt_array($curl, array(
            // Indicar que vamos a hacer una petición POST
            CURLOPT_CUSTOMREQUEST => "PUT",
            // Justo aquí ponemos los datos dentro del cuerpo
            CURLOPT_POSTFIELDS => $datojson,
            // Encabezados
            //CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($datojson), // Abajo podríamos agregar más encabezados
                'Personalizado: ¡Hola mundo!', # Un encabezado personalizado
            ),
            # indicar que regrese los datos, no que los imprima directamente
            CURLOPT_RETURNTRANSFER => true,
        ));


        # Hora de hacer la petición
        $resultado = curl_exec($curl);
        # Vemos si el código es 200, es decir, HTTP_OK
        $codigoRespuesta = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $arrayR = $resultado;
       

        $respuestaDecodificada = json_decode($arrayR);

       
      //  print_r("codigo de respuesta".$codigoRespuesta);
       // print_r("json de respuesta".$respuestaDecodificada);
       



		return $arrayR;

    }


    public function venta_registrar($p_info_json){

  
	
        $rludato = 'http://172.96.143.27:8085/proyecto/tecnomarket/venta/registrar';


        $curl = curl_init($rludato);
        $datojson = json_encode($p_info_json);


        curl_setopt_array($curl, array(
            // Indicar que vamos a hacer una petición POST
            CURLOPT_CUSTOMREQUEST => "POST",
            // Justo aquí ponemos los datos dentro del cuerpo
            CURLOPT_POSTFIELDS => $datojson,
            // Encabezados
            //CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($datojson), // Abajo podríamos agregar más encabezados
                'Personalizado: ¡Hola mundo!', # Un encabezado personalizado
            ),
            # indicar que regrese los datos, no que los imprima directamente
            CURLOPT_RETURNTRANSFER => true,
        ));


        # Hora de hacer la petición
        $resultado = curl_exec($curl);
        # Vemos si el código es 200, es decir, HTTP_OK
        $codigoRespuesta = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $arrayR = $resultado;
       

        $respuestaDecodificada = json_decode($arrayR);

       
      //  print_r("codigo de respuesta".$codigoRespuesta);
       // print_r("json de respuesta".$respuestaDecodificada);
 
		return $arrayR;

    }

    public function venta_listar(){

        $rludato = 'http://172.96.143.27:8085/proyecto/tecnomarket/venta/listar';

		$url = str_replace(' ', '%20', $rludato);
        $url = str_replace('"', '', $url);
        $url = str_replace("'", '', $url);
		$url_new = rawurlencode($rludato);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
		$arrayR = $response; //json_decode($response, true);
		
		/*
		$pcadena = " >> url >> ".$url."\r\n";
		$pcadena = $pcadena." >> urlnew >> ".$url_new."\r\n";
		$pcadena = $pcadena." >> rpta >> ".$arrayR;
		
		Sp_GuardarLogAGI($pcadena);	
		*/
		return $arrayR;

    }    




    public function venta_listar_pordescripcion($p_campo_dato){

  
	
        $rludato = 'http://172.96.143.27:8085/proyecto/tecnomarket/venta/listar_descripcion/'.$p_campo_dato;

		$url = str_replace(' ', '%20', $rludato);
        $url = str_replace('"', '', $url);
        $url = str_replace("'", '', $url);
		$url_new = rawurlencode($rludato);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
		$arrayR = $response; //json_decode($response, true);
		
		/*
		$pcadena = " >> url >> ".$url."\r\n";
		$pcadena = $pcadena." >> urlnew >> ".$url_new."\r\n";
		$pcadena = $pcadena." >> rpta >> ".$arrayR;
		
		Sp_GuardarLogAGI($pcadena);	
		*/
		return $arrayR;

    }        


}

?>
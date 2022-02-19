<?php


include 'dbapi/api_model_cliente_login.php'; 


//include 'dbmysql/mysql_model.php'; 

class db_model_login
{

        
        private $db_model   = 'API';  // tenemos  API - DBMYSQL  - DBSQLSERVER


        public function __construct() {
            $this->db_model = 'API';
          //  $this->db_model = 'DBMYSQL';
        }


		//-------- Tabla cliente       --------
		//--------------------------------------------------		

        public function cliente_buscar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_cliente_login();

                $p_rptJson = $objapi->cliente_buscar($p_codigo);


			}else
			{

                
              //  $objmysql = new mysql_model();

              //  $p_rptJson = $objmysql->cliente_buscar($p_codigo);

				$p_rptJson = null;
			}
			
			return $p_rptJson;
			
		}    


		


        public function cliente_validarlogin($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_cliente_login();

                $p_rptJson = $objapi->cliente_validarlogin($postData);


			}else
			{

                
              //  $objmysql = new mysql_model();

              //  $p_rptJson = $objmysql->cliente_validarlogin($postData);

			  $p_rptJson = null;


			}
			
			return $p_rptJson;
			
		}           
        
        public function cliente_editar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_cliente_login();

                $p_rptJson = $objapi->cliente_editar($postData);


			}else
			{

                
              //  $objmysql = new mysql_model();

              //  $p_rptJson = $objmysql->cliente_editar($postData);
			  $p_rptJson = null;


			}
			
			return $p_rptJson;
			
		}  
        
        
        public function cliente_registrar($postData)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_cliente_login();

                $p_rptJson = $objapi->cliente_registrar($postData);


			}else
			{

                
               // $objmysql = new mysql_model();

               // $p_rptJson = $objmysql->cliente_registrar($postData);

			   $p_rptJson = null;

			}
			
			return $p_rptJson;
			
		}   

		
        public function cliente_eliminar($p_codigo)
		{

           // echo "el modelo a trabajae es : ".$this->db_model;
            $p_rptJson = null;
			if ($this->db_model =='API')
			{		
                
                $objapi = new api_model_cliente_login();

                $p_rptJson = $objapi->cliente_eliminar($p_codigo);


			}else
			{

                
              //  $objmysql = new mysql_model();

              //  $p_rptJson = $objmysql->cliente_eliminar($p_codigo);
			  $p_rptJson = null;	

			}
			
			return $p_rptJson;
			
		}          
				 		
				 		

}

?>
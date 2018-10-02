<?php

	class Facultad_API {    
	    public function API(){
	        header('Content-Type: application/JSON');                

			$headers = apache_request_headers();	        

			if(Config::$AUTHORIZATION_REQUIRED) {
				if(!isset($headers['Authorization']) || ($headers['Authorization'] != Config::$API_KEY)) {
					$alumno = new Alumno();
					$alumno->response(Config::$STATUS_CODE_NO_AUTORIZADO, Config::$STATUS_ERROR, Config::$ERROR_MSG_STATUS_NO_AUTORIZADO);
					die;
				} 
			} 


	        $metodo = $_SERVER['REQUEST_METHOD'];

	        switch ($metodo) {
		        case 'GET':
		            	// Consultar
		            	$alumno = new Alumno();
		            	$alumno->getAlumnos();
		            break;     
		        case 'POST':
		            	echo 'POST';	// Insertar
		            break;                
		        case 'PUT':
		            	echo 'PUT';		// Update
		            break;      
		        case 'DELETE':
		            	echo 'DELETE';	// Borrar
		            break;
		        default:
		            	echo 'Método no válido.';
		            break;
	        }
	    }	    
	}	

?>
<?php

	class Facultad_API {    
	    public function API(){
	        header('Content-Type: application/JSON');                

	        $metodo = $_SERVER['REQUEST_METHOD'];

	        switch ($metodo) {
		        case 'GET':
		            	echo 'GET';		// Consultar
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
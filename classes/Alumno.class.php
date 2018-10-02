<?php

	class Alumno {		
		public function __construct() {}


		public function getAlumno($id = 0) {
			$db = new Db();
			$sSQL = "SELECT A.id, A.nombre, A.fecha_nacimiento, A.domicilio, C.nombre AS Carrera FROM alumno A INNER JOIN carrera C ON A.carrera_esta_estudiando = C.id WHERE A.id=". $db->escapa($id) .";";
			$db->consulta($sSQL);
			$resultset = $db->getResultset();
			$alumno = $resultset->fetch_all(MYSQLI_ASSOC); 
			$db->cierra();

			return $alumno;
		}


		public function getTodosAlumnos() {
			$db = new Db();
			$sSQL = "SELECT A.id, A.nombre, A.fecha_nacimiento, A.domicilio, C.nombre AS Carrera FROM alumno A INNER JOIN carrera C ON A.carrera_esta_estudiando = C.id WHERE 1;";
			$db->consulta($sSQL);
			$resultset = $db->getResultset();
			$alumnos = $resultset->fetch_all(MYSQLI_ASSOC); 
			$db->cierra();

			return $alumnos;
		}


		public function getAlumnos() {
		   if($_GET['action']=='alumno'){         
		        if(isset($_GET['id'])){
		        	// Muestra 1 alumno.
		            $response = $this->getAlumno($_GET['id']);
		            echo PHP_EOL .'['. PHP_EOL . json_encode(array_map("utf8_encode", $response[0]), JSON_PRETTY_PRINT) . PHP_EOL .']'. PHP_EOL;
		        }else{ 
		        	// Muestra todos los alumnos                   
		            $response = $this->getTodosAlumnos();              
		            $numeroAlumnos = count($response);

	            	echo PHP_EOL .'['. PHP_EOL;

		            $separador = '';

		            for($i=0; $i<$numeroAlumnos; $i++) {
		            	echo $separador . json_encode(array_map("utf8_encode", $response[$i]), JSON_PRETTY_PRINT);
		            	$separador = ','. PHP_EOL;
		            }

	            	echo PHP_EOL .']'. PHP_EOL;
		        }			
			}else{
				$this->response(Config::$STATUS_CODE_SOLICITUD_INCORRECTA, Config::$STATUS_ERROR, Config::$ERROR_MSG_STATUS_SOLICITUD_INCORRECTA);
     		} 
		}


		function response($code = 200, $status = "", $message = "") {
			http_response_code($code);

			if(!empty($status) && !empty($message) ){
				$response = array("status" => $status ,"message"=>$message);  
				echo json_encode($response, JSON_PRETTY_PRINT);    
			}            
		}  		
	}

?>
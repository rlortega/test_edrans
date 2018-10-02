<?php

	/* *
	 * Clase Db
	 * 
	 * Se encarga de hacer las operaciones relacionadas con las consultas a la base de datos para que allí donde se implemente el código sea más legible, homogéneo, mantenible y seguro.
	 *
	 * 
	 * @author Roberto L. Ortega F. < roberto.ortega@eurona.net >
	 */
 

	class Db {
		private $_conn;
		private $_resultset;
		
		public function __construct() {
			$this->_conn = new mysqli(Config::$DB_SERVER, Config::$DB_USERNAME, Config::$DB_PASSWORD, Config::$DB_DATABASE);
		}
		
		public function ejecuta($sSQL) {
			$lastID = null;
			
			if ($this->_conn->query($sSQL) === TRUE) {
				$lastID = $this->_conn->insert_id;

				if(!IS_NULL($lastID)) {
					return $lastID;
				}
			} else {
				echo $sSQL ."<br />";
				die("ERROR EN LA CONSULTA.". mysqli_error($this->_conn));
			}			
		}
		
		public function consulta($sSQL) {
			if(!($this->_resultset = mysqli_query($this->_conn, $sSQL))) {
				echo mysqli_error($this->_conn);
			}
		}
		
		public function escapa($cad) {
			return mysqli_real_escape_string($this->_conn, $cad);
		}
		
		public function getNumeroFilas() {
			return mysqli_num_rows($this->_resultset);
		}
		
		public function getValue($campo) {
			if(!($row = mysqli_fetch_assoc($this->_resultset))) {
				return false;
			} else {
				if(array_key_exists($campo, $row)) {
					return $row[$campo];
				} else {
					print_r($row);
					echo "<hr />";
				}
			}
		}

		public function getResultset() {
			return $this->_resultset;
		}
		
		public function cierra() {
			if(!IS_NULL($this->_resultset)) {
				mysqli_free_result($this->_resultset);
			}

			mysqli_close($this->_conn);
		}
	}

?>
<?php

	class Config {
		static $DB_SERVER = 'localhost';
		static $DB_USERNAME = 'root';
		static $DB_PASSWORD = '';
		static $DB_DATABASE = 'edrans';

		static $AUTHORIZATION_REQUIRED = false;
		static $API_KEY = '785017fb477ee7ba6cf2a4ac3957ee72';

		static $STATUS_CORRECTO = 'success';		
		static $STATUS_ERROR = 'error';		

		static $STATUS_CODE_CORRECTO = '200';		
		static $STATUS_CODE_SOLICITUD_INCORRECTA = '400';		
		static $STATUS_CODE_NO_AUTORIZADO = '401';		

		static $ERROR_MSG_STATUS_SOLICITUD_INCORRECTA = 'Parámetros no válidos';		
		static $ERROR_MSG_STATUS_NO_AUTORIZADO = 'Operación no autorizada';		
	}

?>
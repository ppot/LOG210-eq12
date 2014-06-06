<?php
	class Connection {
		private static $connection;
		private static $hostname = "localhost";
		private static $username = "root";
		private static $password = "root";
		private static $database_name = "log210";

		public function __construct() {}

		public static function disconnect() { //Méthode qui sera appelée à la fin de chaque interaction avec la base de donnée.
			if(isset(self::$connection)) {
				mysqli_close(self::$connection);
				self::$connection = null;
			}
		}

		public static function getConnection() { //Méthode qui va effectuer une connection avec la base de donnée.
			if(!isset(self::$connection)){
				self::$connection = mysqli_connect(self::$hostname, self::$username, self::$password, self::$database_name);

				if(mysqli_connect_error()) {
					trigger_error("Failed to conencto to MySQL: " . mysqli_connect_error(), E_USER_ERROR);
				}
			}

			return self::$connection;
		}
	}
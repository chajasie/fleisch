<?php
	class DB{
		
		//Klassen Variablen
		private $sql_server;
		private $sql_db;
		private $sql_benutzer;
		private $sql_passwort;
		private $sql_connection;
		
		//Konstruktor - stellt verbindung zum Sql-Server her
		function __construct($sql_server, $sql_db, $sql_benutzer, $sql_passwort){
			$this->sql_server = $sql_server;
			$this->sql_db = $sql_db;
			$this->sql_benutzer = $sql_benutzer;
			$this->sql_passwort = $sql_passwort;
			$this->connect();
		}
		
		
		//Funktion - stellt verbindung zum Sql-Server her
		function connect(){
			$connect_error = "";
			if (!$link = mysql_connect($this->sql_server, $this->sql_benutzer, $this->sql_passwort)) {
				$connect_error = 'Es konnte keine Verbindung zum MYSQL Server hergestellt werden.';
			}

			if (!mysql_select_db($this->sql_db, $link)) {
				$connect_error = 'Datenbank existiert nicht';
			}
			if(!$connect_error) $this->sql_connection = $link;
		}
		
		//Select Befehle
		function select($sql_befehl = ""){
			$select_result = array();
			
			$select_error = "";
			//stelle verbindung her
			$link = $this->getConnection();
			
			//Führe den Befehl aus
			if($sql_befehl == ""){
				$select_error = "Befehl Parameter ist leer.";
			}else{
				$result = mysql_query($sql_befehl, $link);
			}
			$counter = 0;
			while ($row = mysql_fetch_assoc($result)) {
				$select_result[$counter] = $row;
				$counter++;
			}
			
			return $select_result;	
		}
		//Input Function
		function input($table = "", $inputArray = array()){
			if(empty($inputArray) || $table === "") return false;
			
			// Create connection
			$link = $this->getConnection();
			if($this->select('select 1 from `' . $table . '` LIMIT 1') === false) return false;
			
			$keys   = implode(",", array_keys($inputArray));
			$values = implode("','", $inputArray);
			
			$sql_befehl = "INSERT INTO " . $table . " (" . $keys .") VALUES ('" . $values . "')";
			
			if (mysql_query($sql_befehl, $link) === true) return true;
			return false;
		}
		
		//GET Functions
		function getConnection(){
			if ($this->sql_connection) return $this->sql_connection;
			return NULL;
		}
	}
	
?>
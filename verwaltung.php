<?php
	class VERWALTUNG{
		
		private $db;
		private $allUsers;
		
		function __construct($db){
			$this->db = $db;
			$this->setAllUsers();
		}
		
		/* Einkäufe Verwaltung */
		//Add Function
		function addNewRecord($inputArray = array()){
			if(empty($inputArray)) return false;
			$this->db->input("log", $inputArray);
			
			return true;
		}
		
		function getAllRecordsofUser($benutzerName = ""){
			
			if($benutzerName === "") return false;
			$benutzer = $this->getUserfromName($benutzerName);
			$sql_befehl = "Select * from log WHERE benutzer='" . $benutzer['id'] . "' AND aktiv=1";
			
			return $this->db->select($sql_befehl);
		}
		
		/*Benutzer verwaltung*/
		//SET Functions
		function setAllUsers(){
			$sql_befehl = "Select * from benutzer";
			$this->allUsers = $this->db->select($sql_befehl);
		}

		//GET Functions
		function getUserfromName($name){
			$sql_befehl = "Select * from benutzer WHERE name='" . $name . "' AND aktiv=1";
			return $this->db->select($sql_befehl)[0];
		}
		
		function getDB(){
			return $this->db;
		}
		
		function getAllUsers(){
			return $this->allUsers;
		}
	}
?>
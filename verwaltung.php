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
			$lastId = $this->db->input("log", $inputArray);
			
			return $lastId;
		}
		
		function getAllRecordsofUser($benutzerName = "", $limit = 4){
			
			if($benutzerName === "") return false;
			$benutzer = $this->getUserfromName($benutzerName);
			$sql_befehl = "Select * from log WHERE benutzer='" . $benutzer['id'] . "' AND aktiv=1 ORDER BY Id DESC";
			if($limit > 0) $sql_befehl .= " Limit " . $limit;
			
			return $this->db->select($sql_befehl);
		}
		
		function payedFor($lastLogId, $foodId){
			if(empty($lastLogId) || empty($foodId)) return false;
			$foodGroupId = $this->getFoodGroup($foodId);
			$inputArray['id'] = $lastLogId;
			$inputArray['bezahlt_fuer'] = $foodGroupId;
			$inputArray['ist_gruppe'] = 1; //wird momentan immer auf 1 gesetzt.
			$this->db->input("bezahlt", $inputArray);
		
			return true;
		}
		
		function getExpenses($benutzer = ""){
			if(empty($benutzer)) return false;
			$expenses = 0;
			$log = $this->getAllRecordsofUser($benutzer, 0);
			
			foreach ($log as $essen ) {
				$expenses += $essen['preis'];
			}
			return $expenses;
		}
		
		/* Essen Verwaltung */
		function getFoodFromId($foodId = ""){
			if($foodId === "") return false;
			$sql_befehl = "Select * from essen WHERE id='" . $foodId. "'";
			
			return $this->db->select($sql_befehl)[0]['name'];
		}
		
		function getFoodGroup($foodId){
			if(empty($foodId)) return false;
			$sql_befehl = "Select * from essen WHERE id='" . $foodId. "'";
			
			return $this->db->select($sql_befehl)[0]['gruppe'];
			
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
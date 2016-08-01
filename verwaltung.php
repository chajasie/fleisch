<?php
	class VERWALTUNG{
		
		private $db;
		private $allUsers;
		private $activeUser;
		
		function __construct($db){
			$this->db = $db;
			$this->setAllUsers();
			if($_SESSION['loggedin'] === 1) $this->activeUser = $this->getUserfromName($_SESSION['benutzer']);
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
			$log = $this->getAllRecordsofUser($this->activeUser['name'], 0);
			
			foreach ($log as $essen ) {
				if($essen['aktion'] == 1 || $essen['aktion'] == 2 )
				$expenses += $essen['preis'];
			}
			return $expenses;
		}
		
		function getExpensesFromFoodGroup($foodGroup = 0){
			if($foodGroup === 0) return false;
			$sql_befehl = "Select * from log WHERE aktion='" . $foodGroup. "' and benutzer ='" . $this->activeUser['id']. "'";
			$log = $this->db->select($sql_befehl);
			$expenses = 0;
			
			foreach ($log as $aktion ) {
				$expenses += $aktion['preis'];
			}
			return $expenses;
		}
		
		
		/* Aktion Verwaltung */
		function getFoodFromId($aktionId = ""){
			if($aktionId === "") return false;
			$sql_befehl = "Select * from aktion WHERE id='" . $aktionId. "'";
			
			return $this->db->select($sql_befehl)[0]['aktion'];
		}
		
		function getFoodGroup($aktionId){
			if(empty($aktionId)) return false;
			$sql_befehl = "Select * from essen WHERE id='" . $aktionId. "'";
			
			return $this->db->select($sql_befehl)[0]['gruppe'];
			
		}
		
		function getAllFoodofGroup($foodGroup = 0){
			//gibt einen array mit allen food ids zurück
			if($foodGroup === 0) return false;
			
			$sql_befehl = "Select * from essen WHERE gruppe='" . $foodGroup. "'";
			return $this->db->select($sql_befehl);
		}
		
		/*Benutzer verwaltung*/
		//SET Functions
		function setAllUsers(){
			$sql_befehl = "Select * from benutzer";
			$this->allUsers = $this->db->select($sql_befehl);
		}
		
		function loginUser($benutzerName){
			$benutzer = $this->getUserfromName($_POST['benutzername']);
			if(!empty($benutzer)){
				//Einloggen
				if($benutzer['passwort'] === $_POST['passwort']){
					$_SESSION['loggedin'] = 1;
					$_SESSION['benutzer'] = $benutzerName;
					$this->activeUser=$benutzer;
				}
			}
		}
		
		function logoutUser(){
			unset($_SESSION['loggedin']);
			unset($_SESSION['benutzer']);
			
			$this->activeUser="";
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
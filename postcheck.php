<?php
	if(isset($_POST['login_submit'])){
		//ein wenig unsicher
		$verwaltung->loginUser($_POST['benutzername']);
	}
	if(isset($_POST['input_submit'])){
		$benutzer = $verwaltung->getUserfromName($_SESSION['benutzer']);
		if(!empty($benutzer) && $_POST['log_preis'] > 0){
			$inputArray = array();
			
			$inputArray['benutzer'] = $benutzer['id'];
			$inputArray['aktion'] = $_POST['log_aktion'];
			$inputArray['preis'] = $_POST['log_preis'];
			
			
			$lastId = $verwaltung->addNewRecord($inputArray);
			
			//Für welche Gruppe wurde es bezahlt?
			$verwaltung->payedFor($lastId, $inputArray['bezeichnung']);
		}
	}
	
	//Logout
	if (isset($_GET['logout'])){
		$verwaltung->logoutUser();
	}
?>
<?php
	if(isset($_POST['login_submit'])){
		//ein wenig unsicher
		$benutzer = $verwaltung->getUserfromName($_POST['benutzername']);
		if(!empty($benutzer)){
			//Einloggen
			if($benutzer['passwort'] === $_POST['passwort']){
				$_SESSION['loggedin'] = 1;
				$_SESSION['benutzer'] = $benutzer['name'];
			}
		}
	}
	if(isset($_POST['input_submit'])){
		$benutzer = $verwaltung->getUserfromName($_SESSION['benutzer']);
		if(!empty($benutzer)){
			$inputArray = array();
			
			$inputArray['benutzer'] = $benutzer['id'];
			$inputArray['bezeichnung'] = $_POST['log_bezeichnung'];
			$inputArray['preis'] = $_POST['log_preis'];

			$verwaltung->addNewRecord($inputArray);
		}
	}
	
	//Logout
	if (isset($_GET['logout'])){
		unset($_SESSION['loggedin']);
	}
?>
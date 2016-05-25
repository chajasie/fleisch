<?php
	if(isset($_POST['submit'])){
		//ein wenig unsicher
		$benutzer = $verwaltung->getUserfromName($_POST['benutzername']);
		if(!empty($benutzer)){
			//Einloggen
			if($benutzer['passwort'] === $_POST['passwort']){
				$_SESSION['loggedin'] = 1;
			}
		}
	}
	
	//Logout
	if (isset($_GET['logout'])){
		unset($_SESSION['loggedin']);
	}
?>
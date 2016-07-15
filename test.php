<?php
	include("db.php");
	include("verwaltung.php");
	include("init.php");
	include("functions.php");
	include("postcheck.php");
	
	
	$inputArray = array();
	/*$inputArray['name'] = "Peter";
	$inputArray['passwort'] = "123456";
	
	$inputArray['bezeichnung'] = "fleisch";
	$inputArray['preis'] = "60.50";
	*/
	
	var_dump($verwaltung->getFoodFromId(1));
	//var_dump($db->input("log", $inputArray));
	
	//var_dump($verwaltung->getAllUsers());
?>
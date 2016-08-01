<?php
	//MYSQL Data
	define('SQL_SERVER', '127.0.0.1');
	define('SQL_DATABASE', 'fleisch');
	define('SQL_BENUTZER', 'root');
	define('SQL_PASSWORT', '');
	
	$db = new DB(SQL_SERVER, SQL_DATABASE, SQL_BENUTZER, SQL_PASSWORT);
	$verwaltung = new VERWALTUNG($db);
	
	//Fleisch und Vegigruppe - könnte man noch durch sql abfrage ergänzen
	define('FLEISCHGRUPPE', 1);
	define('VEGIGRUPPE', 2);
?>
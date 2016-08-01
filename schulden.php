<h1>Schulden</h1>
<?php
	$ausgaben = $verwaltung->getExpenses($_SESSION['benutzer']);
	echo "Du hast <b>" . $ausgaben . " Fr.-</b> ausgegeben!";
	echo $verwaltung->getExpensesFromFoodGroup(FLEISCHGRUPPE);
	
	
?>
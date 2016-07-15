<?php
	function zeichne_html_benutzer_block( $alt="Roni", $img_src = "img/roni.png", $class = "col-md-2 col-xs-6 text-xs-center benutzer-bild" ){
		$html_benutzer_block = '<div class="' .  $class . '">' .
							   '<a href="#loginform" alt="' . $alt . '">' .
                               '<img src="' . $img_src . '" alt="' . $alt . '" class="img-circle"></a>' .
							   '</div>';
							   
		return $html_benutzer_block;
	}
	
	function zeichne_html_log_block( $verwaltung ){
		
		$logData = $verwaltung->getAllRecordsofUser($_SESSION["benutzer"]);
		$html_log_block  = "<table class='table table-striped'><thead><tr><th>Bezeichnung</th><th>Preis</th></tr></thead><tbody>";
		for($i=0;$i<count($logData);$i++){
			$html_log_block .= "<tr><td>" . $verwaltung->getFoodFromId($logData[$i]['bezeichnung']) . "</td><td>" . $logData[$i]['preis'] . "</td></tr>";
		}
		$html_log_block .= "</tbody></table>";
							   
		return $html_log_block;
	}
?>
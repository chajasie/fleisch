<?php
	function zeichne_html_benutzer_block( $alt="Roni", $img_src = "img/roni.png", $class = "col-md-2 col-xs-6 text-xs-center benutzer-bild" ){
		$html_benutzer_block = '<div class="' .  $class . '">' .
							   '<a href="#loginform" alt="' . $alt . '">' .
                               '<img src="' . $img_src . '" alt="' . $alt . '" class="img-circle"></a>' .
							   '</div>';
							   
		return $html_benutzer_block;
	}
?>
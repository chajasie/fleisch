<div id="benutzer_schnell-login" class="row">
	<div class="title text-xs-center">
		<h1>Fleisch Verwaltung</h1>
		<h3>Login</h3>
	</div>
	
	<?php
		//alle Benutzer-Bilder zeichnen
		$allUsers = $verwaltung->getAllUsers();
		$first = 1;
		foreach($allUsers as $user){
			$class = "";
			if($first === 1){
				$first = 0;
				$class = "col-md-offset-1 col-md-2 col-xs-6 text-xs-center benutzer-bild";
			}
			//tmp Daten, für besseren Lesefluss
			$alt = $user['name'];
			$img_src = $user['bild'];
			
			if($class == ""){
				echo zeichne_html_benutzer_block($alt, $img_src);
			}else{
				echo zeichne_html_benutzer_block($alt, $img_src, $class);
			}
			
		}
	?>
	
</div>


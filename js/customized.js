 $(document).ready(function() {
	 
	 //Benutzerbild wurde angeklickt
	$( ".benutzer-bild a" ).click(function() {
		benutzername = $(this).attr("alt");
		$( "#benutzername" ).val(benutzername);
	});
	
 });
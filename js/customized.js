 $(document).ready(function() {
	 
	 //Benutzerbild wurde angeklickt
	$( ".benutzer-bild a" ).click(function() {
		benutzername = $(this).attr("alt");
		$( "#benutzername" ).val(benutzername);
	});
	
	
	//Cube Rotation
	
	$("#cube").on("swiperight",function(){
	  calcRotation(0);
	});
	
	$("#cube").on("swipeleft",function(){
	  calcRotation(90);
	});
	
	function calcRotation(rot){
           $("#cube").css("transform", "rotateY(-" + rot + "deg)");
    }
	
 });
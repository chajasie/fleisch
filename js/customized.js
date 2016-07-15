 $(document).ready(function() {
	 window.rotation = 0;
	 //Benutzerbild wurde angeklickt
	$( ".benutzer-bild a" ).click(function() {
		benutzername = $(this).attr("alt");
		$( "#benutzername" ).val(benutzername);
	});
	
	
	//Cube Rotation
	
	$("#cube").on("swiperight",function(){
	  calcRotation(90);
	});
	
	$("#cube").on("swipeleft",function(){
	  calcRotation(-90);
	});
	
	function calcRotation(rot){
		   rotation = rotation + rot;
           $("#cube").css("transform", "rotateY(" + rotation + "deg)");
    }
	
 });
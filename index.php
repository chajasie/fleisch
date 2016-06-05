<?php
	//Session Starten
	session_start();
	
	include("db.php");
	include("verwaltung.php");
	include("init.php");
	include("functions.php");
	include("postcheck.php");

?>
<!DOCTYPE html>
<html lang="de">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>Fleisch Verwaltung</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="../MDB/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="../MDB/css/mdb.min.css" rel="stylesheet">

    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
	<div class="container">
    <!-- Start your project here-->
	<?php 
		if(isset($_SESSION['loggedin'])){
			/* Fleisch verwaltung */
			include("cube.php");
			//include("management.php");
		}else{
			/* Benutzer Schnell-Login */
			include("benutzer_schnell-login.php");
			
			/* Login Form */
			include("loginform.php");
		}
		
	?>
	</div>
	
    <!-- /Start your project here-->
    

    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="../MDB/js/jquery-2.2.3.min.js"></script>
	
	<!-- Jquery Mobile -->
	<script type="text/javascript" src="jquery_mobile/jquery.mobile.custom_swipe.min"></script>
	
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../MDB/js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../MDB/js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../MDB/js/mdb.min.js"></script>
	
	<!-- Customized JS -->
    <script type="text/javascript" src="js/customized.js"></script>


</body>

</html>
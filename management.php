<a href="/fleisch?logout=1">Logout</a>
<!-- LOGIN FORM -->
	<hgroup>
	  <h1>Fleisch Verwaltung</h1>
	  <h3>Eingabeformular</h3>
	</hgroup>
	<form action="index.php" method="POST">
	  <div class="group">
		<select class="mdb-select"> <!-- Muss noch verbesser werden -->
			<option value="" disabled selected>Fleisch oder Vegisache?</option>
			<option value="1">Fleisch/ Aufschnitt</option>
			<option value="2">Vegi</option>
		</select>
	  </div>
	  <div class="group">
		<input type="password"><span class="highlight"></span><span class="bar"></span>
		<label>Kosten</label>
	  </div>
	  <button type="submit" name="submit" class="button buttonBlue">Anmelden
		<div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
	  </button>
	</form>
	<footer><a href="http://www.polymer-project.org/" target="_blank"><img src="https://www.polymer-project.org/images/logos/p-logo.svg"></a>
	  <p>You Gotta Love <a href="http://www.polymer-project.org/" target="_blank">Google</a></p>
	</footer>
<!-- END LOGIN FORM -->

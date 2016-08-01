<!-- LOGIN FORM
	<hgroup>
	  <h1>Fleisch Verwaltung</h1>
	  <h3>Eingabeformular</h3>
	</hgroup> -->
	<form action="index.php" method="POST">
	  <div class="group">
		<select name="log_aktion" class="mdb-select"> <!-- Muss noch verbesser werden -->
			<option value="" disabled>Fleisch oder Vegisache?</option>
			<option value="1" selected>Fleisch/ Aufschnitt</option>
			<option value="2">Vegi</option>
		</select>
	  </div>
	  <div class="group">
		<input name="log_preis" type="tel" onkeypress='return event.charCode >= 46 && event.charCode <= 57'><span class="highlight"></span><span class="bar"></span>
		<label>Kosten in CHF</label>
	  </div>
	  <button type="submit" name="input_submit" class="button buttonBlue">Eingabe
		<div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
	  </button>
	</form>
<!-- END LOGIN FORM -->

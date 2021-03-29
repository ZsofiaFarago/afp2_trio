<?php
	// include_once PROTECTED_DIR.'subpages/estate_agency/core/MyController.php';
	// include_once PROTECTED_DIR.'subpages/estate_agency/controller/calculatorController.php';
	// $controller = new calculatorController();
?>

<div id="registration_page">
<?php
	include_once PROTECTED_DIR.'subpages/estate_agency/core/MyController.php';
	include_once PROTECTED_DIR.'subpages/estate_agency/controller/registrationController.php';
	$controller = new registrationController();
?>
	<div class="form" id="registrationForm">
		<h2>Regisztráció</h2>
		<?php
			$controller->registerNewClient();
		?>
		<form method="POST">
	    	<label for="lastName">Vezetéknév <em>&#x2a;</em></label>
			<input id="lastName" name="lastName" required="" type="text" />

			<label for="firstName">Keresztnév <em>&#x2a;</em></label>
			<input id="firstName" name="firstName" required="" type="text" />

			<label for="email">Email <em>&#x2a;</em></label>
			<input id="email" name="email" required="" type="text" />

			<label for="password">Jelszó <em>&#x2a;</em></label>
			<input id="password" name="password" required="" type="password" />

			<label for="passwordAgain">Ismételje meg a jelszót! <em>&#x2a;</em></label>
			<input id="passwordAgain" name="passwordAgain" required="" type="password" />

			<label for="phone">Telefonszám <em>&#x2a;</em></label>
			<input id="phone" name="phone" required="" type="text" />

			<label for="city">Város <em>&#x2a;</em></label>
			<input id="city" name="city" required="" type="text" />

			<label for="zipcode">Irányítószám <em>&#x2a;</em></label>
			<input id="zipcode" name="zipcode" required="" type="text" />

			<label for="streetName">Közterület neve <em>&#x2a;</em></label>
			<input id="streetName" name="streetName" required="" type="text" />

			<label for="streetNumber">Házszám <em>&#x2a;</em></label>
			<input id="streetNumber" name="streetNumber" required="" type="text" />

			<h3>A *-gal jelölt mezők kitöltése kötelező.</h3>
			<button name="save" type="submit">Mentés</button>
		</form>
	</div>	
</div>
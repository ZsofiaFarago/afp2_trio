<div id="login_page">
	<?php
		// include_once PROTECTED_DIR.'subpages/estate_agency/core/MyController.php';
		// include_once PROTECTED_DIR.'subpages/estate_agency/controller/registrationController.php';
		// $controller = new registrationController();
	?>
	<div class="form" id="loginForm">
		<h2>Bejelentkezés</h2>
		<form method="POST">
			<label for="email">Email <em>&#x2a;</em></label>
			<input id="email" name="email" required="" type="text"
				value="<?php echo (isset($_POST['email']))?$_POST['email']:'';?>"
			/>

			<label for="password">Jelszó <em>&#x2a;</em></label>
			<input id="password" name="password" required="" type="password"
				value="<?php echo (isset($_POST['password']))?$_POST['password']:'';?>"
			/>
			<h3>A *-gal jelölt mezők kitöltése kötelező.</h3>
			<button name="login" type="submit">Belépés</button>
		</form>
	</div>
</div>
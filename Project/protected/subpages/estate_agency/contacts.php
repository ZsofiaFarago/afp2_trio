<div id="contacts">
	<?php
		include_once PROTECTED_DIR.'subpages/estate_agency/core/MyController.php';
		include_once PROTECTED_DIR.'subpages/estate_agency/controller/contactController.php';
		$controller = new contactController();
	?>
	<div class="form" id="contacts-form">
		<h2>Lépjen kapcsolatba szakértőinkkel!</h2>
		<p>Ha Ön úgy érzi, segítségre, tanácsra, szakértői véleményre van szüksége, esetleg valamilyen észrevétele, véleméyne, meglátása van, kérjük ossza meg az Ön által választott, megfelelő szakterülethez tartozó ügynökünkkel!</p>
		<?php
			$controller->sendMessage();
		?>
		<form action="POST">
			<label for="name">Név<em>&#x2a;</em></label>
			<input id="name" name="name" required="" type="text" />

			<label for="email">Email<em>&#x2a;</em></label>
			<input id="email" name="email" required="" type="text" />

			<label for="addressed">Címzett<em>&#x2a;</em></label>
			<select id="addressed" name="addressed">
				<option value="opcio">Opció</option>
			</select>

			<label for="message">Üzenet<em>&#x2a;</em></label>
			<textarea id="message" name="customerNote" required=""></textarea>

			<h3>A *-gal jelölt mezők kitöltése kötelező.</h3>
			<button id="customerOrder" type="submit">Küldés</button>
		</form>
	</div>
</div>
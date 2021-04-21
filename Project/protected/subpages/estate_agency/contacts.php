<div id="contacts">
	<?php
		include_once PROTECTED_DIR.'subpages/estate_agency/core/MyController.php';
		include_once PROTECTED_DIR.'subpages/estate_agency/controller/contactController.php';
		$controller = new contactController();
		$agents = $controller->getAllAgents();
	?>
	<div class="form" id="contacts-form">
		<h2>Lépjen kapcsolatba szakértőinkkel!</h2>
		<p>Ha Ön úgy érzi, segítségre, tanácsra, szakértői véleményre van szüksége, esetleg valamilyen észrevétele, véleméyne, meglátása van, kérjük ossza meg az Ön által választott, megfelelő szakterülethez tartozó ügynökünkkel!</p>
		<?php
			$controller->sendMessage();
		?>
		<form method="POST">
			<label for="name">Név<em>&#x2a;</em></label>
			<input id="name" name="name" required="" type="text" />

			<label for="email">Email<em>&#x2a;</em></label>
			<input id="email" name="email" required="" type="text" />

			<label for="subject">Tárgy<em>&#x2a;</em></label>
			<select id="subject" name="subject">
				<option value="Kérdés, érdeklődés">Kérdés, érdeklődés</option>
				<option value="Panasz">Panasz</option>
				<option value="Megjegyzés, észrevétel">Megjegyzés, észrevétel</option>
				<option value="Munka, megbízás">Munka, megbízás</option>
			</select>

			<label for="addressed">Címzett<em>&#x2a;</em></label>
			<select id="addressed" name="addressed">
				<?php if(isset($agents)): ?>
					<?php foreach($agents as $agent): ?>
						<option <?='value="'.$agent['id'].'"'?>><?=$agent['first_name'].' '.$agent['last_name'].' - '.$agent['speciality']?></option>
					<?php endforeach; ?>
				<?php endif; ?>
			</select>

			<label for="message">Üzenet<em>&#x2a;</em></label>
			<textarea id="message" name="message" required="" cols="61" rows="5" style="display: block;"></textarea>

			<h3>A *-gal jelölt mezők kitöltése kötelező.</h3>
			<button id="send" name="send" type="submit">Küldés</button>
		</form>
	</div>
</div>
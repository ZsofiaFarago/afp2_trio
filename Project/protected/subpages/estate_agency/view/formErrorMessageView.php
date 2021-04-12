<?php if(isset($errorMessages)): ?>
	<div class = "formResult formErrorMessage">
		<ul>
			<?php foreach($errorMessages as $errorMessage): ?>
				<li><?=$errorMessage?></li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>
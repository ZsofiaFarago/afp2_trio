<?php if(!loggedIn()) : ?>
	<div class="login">
		<h1>Login</h1>
		<form method="post">
			<label for="Email">
				<i class="fas fa-user"></i>
			</label>
			<input type="text" name="email" placeholder="Email" id="email" required>
			<label for="password">
				<i class="fas fa-lock"></i>
			</label>
			<input type="password" name="password" placeholder="Password" id="password" required>
			<input type="submit" value="Login" name="submitlogin" id="submitlogin">
		</form>
	</div>
<?php endif; ?>
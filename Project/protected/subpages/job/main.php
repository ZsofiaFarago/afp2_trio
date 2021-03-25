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
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitlogin'])){
        $post_data = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
     
		$query = "SELECT id, email, password, permission FROM users WHERE email = :email AND password = :password";
		$params = [
            ':email' => $post_data['email'],
            ':password' => sha1($post_data['password'])
		];
		
		//include_once 'config/config.php';
        include_once 'database.php';
		$record = getRecord($query, $params);

		if(empty($record)){
			echo "Sikertelen bejelentkezés";
		}
		else{
			$_SESSION['permission'] = $record['permission'];
			echo "Permission: ".$_SESSION['permission'];
		}
		header('Location: index.php');
    }
?>
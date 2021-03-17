<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
	$postData = [
		'fname' => $_POST['first_name'],
		'lname' => $_POST['last_name'],
		'email' => $_POST['email'],
		'email1' => $_POST['email1'],
		'password' => $_POST['password'],
		'password1' => $_POST['password1']
	];

	function UserRegister($email, $password, $fname, $lname) {
		$query = "SELECT id FROM users email = :email";
		$params = [ ':email' => $email ];
	
		require_once DATABASE_CONTROLLER;
		$record = getRecord($query, $params);
		if(empty($record)) {
			$query = "INSERT INTO users (fname, lname, email, password) VALUES (:first_name, :last_name, :email, :password)";
			$params = [
				':first_name' => $fname,
				':last_name' => $lname,
				':email' => $email,
				':password' => sha1($password)
			];
	
			if(executeDML($query, $params)) 
				header('Location: index.php?P=login');
		} 
		return false;
	}

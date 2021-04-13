<?php
	session_start();
	include_once PROTECTED_DIR.'subpages/estate_agency/core/MyController.php';
	include_once PROTECTED_DIR.'subpages/estate_agency/controller/loginController.php';
	$controller = new loginController();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta content="charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Estate Agancy</title>
		<link rel="stylesheet" href="<?=PUBLIC_DIR.'css/estate_agency_style.css'?>">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;400&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet"> 
		<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

	</head>
	<body>
		<div id="header">
			<img id="logo" src="<?=PUBLIC_DIR.'/images/estate_agency/logo.png'?>" />
			<div id="nav">
				<a class="menu" id="home" href="index?S=estate_agency&A=home">Nyitóoldal</a>
				<br hidden />
				<a class="menu" id="services" href="index?S=estate_agency&A=services">Szolgáltatások</a>
				<br hidden />
				<a class="menu" id="agents" href="index?S=estate_agency&A=agents">Szakértőink</a>
				<br id="br2" hidden />
				<a class="menu" id="calculators" href="index?S=estate_agency&A=calculators">Kalkulátorok</a>
				<br hidden />
				<a class="menu" id="catalogue" href="index?S=estate_agency&A=catalogue">Katalógus</a>
				<br hidden />
				<a class="menu" id="contacts" href="index?S=estate_agency&A=contacts">Kapcsolatok</a>

				<?php if(!$controller->isUserLoggedIn()): ?>
					<br id="br1" hidden />
					<a class="menu" id="login" href="index?S=estate_agency&A=login">Bejelentkezés</a>
					<br hidden />
					<a class="menu" id="signup" href="index?S=estate_agency&A=registration">Regisztráció</a>
					<?php else: ?>
						<form method="POST">
							<input type="submit" value="Kijelentkezés" class="menu" id="logout" name="logout" />
						</form>
				<?php endif; ?>
				<?php
					$controller->logout();
				?>

			</div>
		</div>
		<div id="content">
			<?php require_once PROTECTED_DIR.'subpages/estate_agency/routing.php'; ?>
			<div id="footer_height"></div>
		</div>
		<footer id="footer">
			<div>
				<p>Copyright &copy; 2021 AFP2 Trio. All Rights Reserved</p>
				<div id="contact_icons">
					<a href="#"><i class="fab fa-facebook-f"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-linkedin"></i></a>
					<a href="#"><i class="fab fa-github"></i></a>
				</div>
			</div>
		</footer>
	</body>
</html>
<!DOCTYPE HTML>
<html>
	<head>
		<meta content="charset=UTF-8">
		<title>Estate Agency</title>
	</head>
	<body>
		<div id="header">
			<img id="logo" src="<?=PUBLIC_DIR.'/images/estate_agency/logo.png'?>" />
			<div id="nav">
				<a class="menu" id="home" href="index?S=estate_agency&A=home">Nyitóoldal</a>
				<br hidden />
				<a class="menu" id="services" href="index?S=estate_agency&A=services">Szolgáltatások</a>
				<br hidden />
				<a class="menu" id="agents" href="index?S=estate_agency&A=agents">Ügynökeink</a>
				<br id="br2" hidden />
				<a class="menu" id="calculators" href="index?S=estate_agency&A=calculators">Kalkulátorok</a>
				<br hidden />
				<a class="menu" id="catalogue" href="index?S=estate_agency&A=catalogue">Katalógus</a>
				<br hidden />
				<a class="menu" id="contacts" href="index?S=estate_agency&A=contacts">Kapcsolatok</a>
				<br id="br1" hidden />
				<a class="menu" id="login" href="">Bejelentkezés</a>
				<br hidden />
				<a class="menu" id="signup" href="">Regisztráció</a>
			</div>
		</div>
		<div>
			<?php require_once PROTECTED_DIR.'subpages/estate_agency/routing.php'; ?>
		</div>
		<footer>
			<hr />
			<p>Copyright &copy; 2020 AFP1 Trio. All Rights Reserved</p>
		</footer>
	</body>
</html>
<!DOCTYPE HTML>
<html>
	<head>
		<meta content="charset=UTF-8">
		<title>Álláskeresés</title>
	</head>
	<body>
		<header>
			<div>Fejléc</div>
			<hr />
			<nav>
				<a href="index?S=job&A=register.php">Regisztáció</a> | <a href="index?S=job&A=menu2">Menü 2</a> | stb.
				<hr />
			</nav>
		</header>
		<div>
			<?php require_once PROTECTED_DIR.'subpages/job/routing.php'; ?>
		</div>
		<footer>
			<hr />
			<p>Copyright &copy; 2020 AFP1 Trio. All Rights Reserved</p>
		</footer>
	</body>
</html>
<!DOCTYPE HTML>
<html>
	<head>
		<meta content="charset=UTF-8">
		<title>Példa oldal</title>
	</head>
	<body>
		<header>
			<div>Fejléc</div>
			<hr />
			<nav>
				<a href="index?S=pelda&A=menu1">Menü 1</a> | <a href="index?S=pelda&A=menu2">Menü 2</a> | stb.
				<hr />
			</nav>
		</header>
		<div>
			<?php require_once PROTECTED_DIR.'subpages/pelda/routing.php'; ?>
		</div>
		<footer>
			<hr />
			<p>Copyright &copy; 2020 AFP1 Trio. All Rights Reserved</p>
		</footer>
	</body>
</html>
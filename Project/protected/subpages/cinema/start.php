<!DOCTYPE HTML>
<html>
	<head>
		<meta content="charset=UTF-8">
		<title>AFP Mozi</title>
	</head>
	<body>
		<header>
			<div><p><h1><center>AFP MOZI</center></h1><h2><center>Mindig a legfrissebb filmek!</center></h2></p></div>
			<hr />
			<nav>
				<center><a href="index.php?S=cinema&A=films">Műsorlista</a> | <a href="index.php?S=cinema&A=information">Információk</a>
				<hr />
			</center>
		</nav>
		</header>
		<div>
			<?php require_once PROTECTED_DIR.'subpages/cinema/routing.php'; ?>
		</div>
		<footer>
			<hr />
			<p>Copyright &copy; 2020 AFP1 Trio. All Rights Reserved</p>
		</footer>
	</body>
</html>
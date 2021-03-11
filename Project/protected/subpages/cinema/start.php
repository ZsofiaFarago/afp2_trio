<!DOCTYPE HTML>

<?php session_start(); ?>
<?php require_once 'protected/config.php'; ?>
<?php require_once 'protected/subpages/cinema/db_config.php'; ?>
<?php require_once USER_MANAGER; ?>

<html>
	<head>
		<meta content="charset=UTF-8">
		<title>AFP Mozi</title>
		<link rel="stylesheet" type="text/css" href=" <?=PUBLIC_DIR.'/css/cinema_style.css'?> ">
	</head>
	<body>
		<header>
			<div><p><h1><center>AFP MOZI</center></h1><h2><center>Mindig a legfrissebb filmek!</center></h2></p></div>
			<nav style="padding: 8px">
				<center><a href="index.php?S=cinema&A=films">Műsorlista</a> | <a href="index.php?S=cinema&A=information">Információk</a> | <a href="index.php?S=cinema&A=register">Regisztráció</a> | <a href="index.php?S=cinema&A=login">Bejelentkezés</a>
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
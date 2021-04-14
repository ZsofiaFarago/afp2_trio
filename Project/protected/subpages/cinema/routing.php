<?php 
	if(!array_key_exists('A', $_GET) || empty($_GET['A']))
		$_GET['A'] = 'home';
	switch ($_GET['A']) {
		case 'home': require_once PROTECTED_DIR.'subpages/cinema/normal/main.php'; break;
		case 'films': require_once PROTECTED_DIR.'subpages/cinema/normal/films.php'; break;
		case 'information': require_once PROTECTED_DIR.'subpages/cinema/normal/information.php'; break;
		case 'register': require_once PROTECTED_DIR.'subpages/cinema/user/register.php'; break;
		case 'login': require_once PROTECTED_DIR.'subpages/cinema/user/login.php'; break;
		case 'logout': require_once PROTECTED_DIR.'subpages/cinema/user/logout.php'; break;

		default: require_once PROTECTED_DIR.'error/404.php'; break;
	}
?>
<?php 
	if(!array_key_exists('A', $_GET) || empty($_GET['A']))
		$_GET['A'] = 'home';
	switch ($_GET['A']) {
		case 'home': require_once PROTECTED_DIR.'subpages/pelda/main.php'; break;
		case 'menu1': require_once PROTECTED_DIR.'subpages/pelda/menu1.php'; break;
		case 'menu2': require_once PROTECTED_DIR.'subpages/pelda/menu2.php'; break;

		default: require_once PROTECTED_DIR.'error/404.php'; break;
	}
?>
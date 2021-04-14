<?php 
	if(!array_key_exists('P', $_GET) || empty($_GET['P'])){
		include_once 'main.php';
	}
		else {
	switch ($_GET['P']) {
		//case 'home': require_once PROTECTED_DIR.'subpages/job/main.php'; break;
		case 'logout' : session_unset(); session_destroy(); header ('Location subpages/job/index.php'); break;
		case 'register': require_once PROTECTED_DIR.'subpages/job/register.php'; break;
		case 'create': require_once PROTECTED_DIR.'subpages/job/create.php'; break;
		case 'find' : require_once PROTECTED_DIR.'subpages/job/find.php'; break;
		case 'job' : require_once PROTECTED_DIR.'subpages/job/job.php' break;
		default: include_once 'main.php'; break;
	}
}
?>
<?php 
	if(!array_key_exists('S', $_GET) || empty($_GET['S']))
		$_GET['S'] = 'home';
	switch ($_GET['S']) {
		case 'home': require_once PROTECTED_DIR.'start.php'; break;
		case 'services': require_once PROTECTED_DIR.'services.php'; break;
		case 'webshops': require_once PROTECTED_DIR.'webshops.php'; break;
		case 'marketing': require_once PROTECTED_DIR.'marketing.php'; break;

		case 'pelda': require_once PROTECTED_DIR.'subpages/pelda/start.php'; break;
		case 'training': require_once PROTECTED_DIR.'subpages/training/start.php'; break;
		case 'cinema': require_once PROTECTED_DIR.'subpages/cinema/start.php'; break;
		case 'estate_agency': require_once PROTECTED_DIR.'subpages/estate_agency/start.php'; break;

		default: require_once PROTECTED_DIR.'error/404.php'; break;
	}
?>
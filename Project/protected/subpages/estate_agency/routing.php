<?php 
	if(!array_key_exists('A', $_GET) || empty($_GET['A']))
		$_GET['A'] = 'home';
	switch ($_GET['A']) {
		case 'home': require_once PROTECTED_DIR.'subpages/estate_agency/main.php'; break;
		case 'services': require_once PROTECTED_DIR.'subpages/estate_agency/services.php'; break;
		case 'agents': require_once PROTECTED_DIR.'subpages/estate_agency/agents.php'; break;
		case 'calculators': require_once PROTECTED_DIR.'subpages/estate_agency/calculators.php'; break;
		case 'catalogue': require_once PROTECTED_DIR.'subpages/estate_agency/catalogue.php'; break;
		case 'contacts': require_once PROTECTED_DIR.'subpages/estate_agency/contacts.php'; break;

		default: require_once PROTECTED_DIR.'error/404.php'; break;
	}
?>
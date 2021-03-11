<?php 

define('BASE_DIR', './');
define('PUBLIC_DIR', BASE_DIR.'public/');
define('PROTECTED_DIR', PROTECTED_DIR.'protected/');
define('CN_PROTECTED_DIR', PROTECTED_DIR.'/subpages/cinema/');

define('DATABASE_CONTROLLER', CN_PROTECTED_DIR.'database.php');
define('USER_MANAGER', CN_PROTECTED_DIR.'userManager.php');

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'cinema');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');
?>
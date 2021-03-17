<?php
define("DB_TYPE", "mysql");
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "joblister");
define("DB_CHARSET", "utf8");

define("DATABASE_CONTROLLER",'./database.php');

define("SITE_TITLE", "JobLister");

function loggedIn(){
    return array_key_exists('permission', $_SESSION) && $_SESSION != null;
}

function admin(){
    return loggedIn() && $_SESSION['permission'] == 1;
}
?>
<?php
ob_start();
session_start();
set_time_limit(0);
error_reporting(1);
$dir = ($_SERVER['SERVER_NAME'] == 'localhost') ? '/omotto' : '/omottodev';
define("ROOT",$_SERVER['DOCUMENT_ROOT'] . $dir);
define("TEMPLATE",ROOT . "/templates");
define("INC",ROOT . "/include");
define("IMAGES",ROOT . "/images");
define("JS",ROOT . "/js");
define("CSS",ROOT . "/css");
define("TITLE", "Omotto Crm");
define("CONFIG",ROOT . '/config');
define("CLIENT-INC",ROOT . '/client-inc.php');
define("USERS", "USERS");
define("OUTLETS", "OUTLETS");
define("STANDS", "STANDS");
define("PRODUCTS", "PRODUCTS");
define("LEADS", "LEADS");
?>
    
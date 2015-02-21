<?php
$dir = ($_SERVER['SERVER_NAME'] == 'localhost') ? '/omotto' : '/omottodev';
include_once $_SERVER['DOCUMENT_ROOT'].$dir.'/config/config.php';
include_once CONFIG . '/db_config.php';
include_once INC . '/functions.php';
?>

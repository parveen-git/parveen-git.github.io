<?php
include_once 'client-inc.php';
($_REQUEST['id']) ? delete_user($_REQUEST['id']) : '';

?>
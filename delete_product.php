<?php
include_once 'client-inc.php';
($_REQUEST['id']) ? delete_product($_REQUEST['id']) : '';

?>
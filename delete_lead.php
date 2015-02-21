<?php
include_once 'client-inc.php';
($_REQUEST['id']) ? delete_lead($_REQUEST['id']) : '';

?>
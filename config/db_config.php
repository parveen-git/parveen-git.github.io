<?php
if($_SERVER['SERVER_NAME'] == 'localhost')
{
$li = mysql_connect('localhost','root','1234') or die(mysql_error() . "Connection to the db could not established");
mysql_select_db('omoto_crm',$li) or die(mysql_error() . "Database not found");
}else{
$li = mysql_connect('OMottoDBdev.db.11178633.hostedresource.com','OMottoDBdev','pr@v33nDev') or die(mysql_error() . "Connection to the db could not established");
mysql_select_db('OMottoDBdev',$li) or die(mysql_error() . "Database not found");
}
?>

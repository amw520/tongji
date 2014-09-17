<?php 
$conn=mysql_connect('localhost','root','');
if (!$conn) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
}
$sqlname="tongji";
mysql_select_db($sqlname, $conn);
mysql_query("SET NAMES 'utf8'");
mysql_set_charset('utf8', $conn)
?>
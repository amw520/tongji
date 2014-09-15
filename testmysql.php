<?php 
$db=mysql_connect('localhost','root','');
if (!$db) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
}
$sqlname="tongji";
$sql="select * from usr";
mysql_select_db($sqlname,$db);


$result=mysql_query($sql);


//
$lineid=1;
$query=mysql_query("select * from test_moonlitshiny where ID='$lineid'");
if($result==true)
{
while($myrow=mysql_fetch_array($result))
{
$helloworld=$myrow["name"];
$hello=$myrow["id"];
Echo $helloworld;
Echo $hello;
}
}

echo 'Connection OK!'; mysql_close($db); 

?> 

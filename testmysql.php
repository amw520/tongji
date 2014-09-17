<?php include 'includes/conn.php';?>
<?php 


$sql="select * from usr";
$result=mysql_query($sql);




if($result==true)
{
	while($myrow=mysql_fetch_array($result))
		{
		$helloworld=$myrow["name"];
		$hello=$myrow["id"];
		Echo 'name:'.$helloworld;
		echo '<br/>';
		Echo 'id:'.$hello;
		echo '<br/>';
		}
}
echo mysql_stat();
echo '<br/>';

echo 'Connection OK!'; mysql_close($conn);

?> 

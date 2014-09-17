<?php require('includes/conn.php');?>
<?php
/**************************************************************
 *
 * 返回查询结果
 * @param 
 * @return string  
 * @access public
 *
 *************************************************************/
  $curstername=$_GET["curstername"];
  $chargetype=$_GET["chargetype"];
  $orderusr=$_GET["orderusr"];
  $ordertime=$_GET["ordertime"];
  $orderdate=$_GET["orderdate"];
  $gamename=$_GET["gamename"];
  $act=$_GET["act"];
	$sql="INSERT INTO `rechargeinfo` (`id` ,`ipadcoed` ,`usrid` ,`gameid` ,`custername` ,`chargetime` ,`chargeday` ,`chargecontent`) VALUES (NULL , '01', ".$orderusr.", ".$gamename.", ".$curstername.",  '".$ordertime."', '".$orderdate."', ".$chargetype.")";
$sqlq="SELECT count(*),sum(chargecontent) FROM `rechargeinfo` WHERE 1";
if($act="query"){
	if($curstername!="undefined"){
	$sqlq=$sqlq." and custername=".$curstername;
	}
	if($chargetype!="undefined"){
	$sqlq=$sqlq." and chargecontent=".$chargetype;
	}
	if($orderusr!="undefined"){
	$sqlq=$sqlq." and usrid=".$orderusr;
	}

	if($gamename!="undefined"){
	$sqlq=$sqlq." and gameid=".$gamename;
	}
	$sql=$sqlq;
}
$result=mysql_query($sql);
$resstr=mysql_fetch_array($result);

echo json_encode($resstr);
/**************************************************************
 *
 * 添加充值项
 * @param 
 * @return string  
 * @access public
 *
 *************************************************************/
 function addChargeItem($orderusr,$gamename){
	$sql="INSERT INTO `rechargeinfo` (`id` ,`ipadcoed` ,`usrid` ,`gameid` ,`custername` ,`chargetime` ,`chargeday` ,`chargecontent`) VALUES (NULL , '01', ".$orderusr.", ".$gamename.", ".$curstername.",  '".$ordertime."', '".$orderdate."', ".$chargetype.")";
	$result=mysql_query($sql);
	echo $result;
 }
 
?>
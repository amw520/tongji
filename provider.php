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
	$sql="INSERT INTO 'rechargeinfo' ('id' ,'ipadcoed' ,'usrid' ,'gameid' ,'custername' ,'chargetime' ,'chargeday' ,'chargecontent') VALUES (NULL , '01', ".$orderusr.", ".$gamename.", ".$curstername.",  '".$ordertime."', '".$orderdate."', ".$chargetype.")";
$sqlq="SELECT count(*),sum(chargecontent) FROM 'rechargeinfo' WHERE 1";
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
 function addChargeItem($ipadcode,$orderusr,$gamename,$curstername,$ordertime,$orderdate,$chargetype){
	$sql="INSERT INTO 'rechargeinfo' ('id' ,'ipadcoed' ,'usrid' ,'gameid' ,'custername' ,'chargetime' ,'chargeday' ,'chargecontent') VALUES (NULL , ".$ipadcode", ".$orderusr.", ".$gamename.", ".$curstername.",  '".$ordertime."', '".$orderdate."', ".$chargetype.")";
	$result=mysql_query($sql);
	echo $result;
 }
 /**************************************************************
 *
 * 查询总额
 * @param 
 * @return string  
 * @access public
 *
 *************************************************************/
 function queryTotalMount($curstername,$chargetype,$orderusr,$gamename,$date0,$date1,$time0,$time1){
	$sqlq="SELECT COUNT(*),SUM(chargecontent),sum(nanfei) from rechargeinfo as a INNER JOIN chargeamount as b on a.chargecontent=b.'value' where 1";
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
	if($date0!="undefined"){
		if($date1!="undefined"){
			
		}else{
		$sqlq=$sqlq." and chargeday=".$date0;
		}
	}
	if($time0!="undefined"){
		if($time1!="undefined"){
			
		}else{
		$sqlq=$sqlq." and chargetime=".$time0;
		}
	}

	$result=mysql_query($sqlq);
	$resstr=mysql_fetch_array($result);
	echo json_encode($resstr);
 }
  /**************************************************************
 *
 * 添加用户
 * @param 
 * @return string  
 * @access public
 *
 *************************************************************/
  function addUsr($usrname){
	$sql="INSERT INTO usr(name) VALUES('".$usrname."')";
	$result=mysql_query($sql);
	
	echo json_encode($result);
 }
   /**************************************************************
 *
 * 添加面值
 * @param 
 * @return string  
 * @access public
 *
 *************************************************************/
  function addFaceValue($typename,$value,$nanfei){
	$sql="INSERT INTO chargeamount(typename,value,nanfei) VALUES('".$typename."',".$value.",".$nanfei.")";
	$result=mysql_query($sql);
	
	echo json_encode($result);
 }
    /**************************************************************
 *
 * 添加新游戏
 * @param 
 * @return string  
 * @access public
 *
 *************************************************************/
  function addGame($gamename){
	$sql="INSERT INTO gamename(gamename) VALUES('".$gamename."')";
	$result=mysql_query($sql);
	
	echo json_encode($result);
 }
?>

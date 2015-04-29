<?php 
require('includes/conn.php');
require('includes/session.php');
?>
<?php
deliverASK();
  /**************************************************************
 *
 * 请求分发
 * @param string $get 请求类型
 * @return string  
 * @access public
 *
 *************************************************************/
 function deliverASK(){
	// $curstername=$_POST["curstername"];
	// $chargetype=$_POST["chargetype"];
	// $orderusr=$_POST["orderusr"];
	// $ordertime=$_POST["ordertime"];
	// $orderdate=$_POST["orderdate"];
	// $gamename=$_POST["gamename"];
	// $ipadcode=$_POST["ipadcode"];
		$action=$_GET["action"];
  
	switch ($action)	{
		case 'querytotal':
		  //echo queryTotalMount($curstername,$chargetype,$orderusr,$gamename,$date0,$date1,$time0,$time1);
		  echo queryTotalMount($_POST["curstername"],$_POST["chargetype"],$_POST["orderusr"],$_POST["gamename"],$date0,$date1,$time0,$time1);
		  break;  
		case 'addrec':
		  echo addChargeItem($_POST["ipadcode"],$_POST["orderusr"],$_POST["gamename"],$_POST["curstername"],$_POST["ordertime"],$_POST["orderdate"],$_POST["chargetype"]);
		  break;
		 case 'addusr':
			echo addUsr($_POST["usr"]);
			break;
		 case 'addfacevalue':
			echo addFaceValue($_POST["typename"],$_POST["value"],$_POST["nanfei"]);
			break;
		 case 'addgame':
			echo addGame($_POST["gamename"]);
			break;
		 case 'login':
			echo login();
			break;
		 case 'logout':
			echo logout();
			break;
		default:
			echo "action para required";
		}
 }

/**************************************************************
 *
 * 添加充值项
 * @param 
 * @return string  
 * @access public
 *
 *************************************************************/
 function addChargeItem($ipadcode,$orderusr,$gamename,$curstername,$ordertime,$orderdate,$chargetype){
	$sql="INSERT INTO rechargeinfo VALUES (NULL , ".$ipadcode.", ".$orderusr.", ".$gamename.", '".$curstername."',  '".$ordertime."', '".$orderdate."', ".$chargetype.")";
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
			$sqlq=$sqlq." and chargeday BETWEEN".$date0." and ".$date1;
		}else{
		$sqlq=$sqlq." and chargeday=".$date0;
		}
	}
	if($time0!="undefined"){
		if($time1!="undefined"){
			$sqlq=$sqlq." and chargetime BETWEEN".$time0." and ".$time1;
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
/**************************************************************
 *
 * 删除游戏
 * @param 
 * @return string  
 * @access public
 *
 *************************************************************/
  function delGame($gamename){
	$sql="INSERT INTO gamename(gamename) VALUES('".$gamename."')";
	$result=mysql_query($sql);
	
	echo json_encode($result);
 }
/**************************************************************
 *
 * 登录
 * @param 
 * @return string  
 * @access public
 *
 *************************************************************/
  function login(){
	$sql="select * from usr where uid='".$_POST['usr']."'";
	$result=mysql_query($sql);
	$arr = mysql_fetch_array($result);
	//echo json_encode(mysql_fetch_array($result));
	//print_r($arr["pwd"]);
	$usr=array();
	if($arr["pwd"]==$_POST['pwd']) {
		$usr['login']=1;
		//$usr['name']=mb_convert_encoding($arr["name"], "utf-8", "auto");
		$usr['name']=$arr["name"];
		usrLogin($arr["name"]);
	} else {
		$usr['login']=0;
		$usr['name']='';
	}
	echo json_encode($usr);
	//echo $arr["name"];
 }
 /**************************************************************
 *
 * 注销
 * @param 
 * @return string  
 * @access public
 *
 *************************************************************/
 function logout(){
	usrLogout();
	$msg="注销成功";
	return $msg;
 }
?>

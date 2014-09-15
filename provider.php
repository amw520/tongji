<?php include 'conn.php';?>
<?php
 
function arrayrecursive(&$array, $function, $apply_to_keys_also = false)
{
    static $recursive_counter = 0;
    if (++$recursive_counter > 1000) {
        die('possible deep recursion attack');
    }
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            arrayrecursive($array[$key], $function, $apply_to_keys_also);
        } else {
            $array[$key] = $function($value);
        }

        if ($apply_to_keys_also && is_string($key)) {
            $new_key = $function($key);
            if ($new_key != $key) {
                $array[$new_key] = $array[$key];
                unset($array[$key]);
            }
        }
    }
    $recursive_counter--;
}

/**************************************************************
 *
 * 将数组转换为json字符串（兼容中文）
 * @param array $array  要转换的数组
 * @return string  转换得到的json字符串
 * @access public
 *
 *************************************************************/
 
 function json($array) {
 arrayrecursive($array, 'urlencode', true);
 $json = json_encode($array);
 return urldecode($json);
}


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
 

echo $result;
/**************************************************************
 *
 * 返回查询结果,
 * @param 
 * @return string  
 * @access public
 *
 *************************************************************/
 
?>
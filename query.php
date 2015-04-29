<?php require('includes/conn.php');?>
<?php require('includes/smarty.php');?>
<?php
/**************************************************************
 *
 * 根据表名获取记录
 * @param string $tablename  数据库表名
 * @return array  返回的记录组成的数组
 * @access public
 *
 *************************************************************/
 function getSqlRest($tablename){
	$sql="select * from ".$tablename;
	$result=mysql_query($sql);
	$arr_sqlrest=array();
	if($result==true){
		while($usr=mysql_fetch_array($result)){
			$arr_sqlrest[]=$usr;
		}
	}
	return $arr_sqlrest;
 }
$smarty->assign("usr",getSqlRest('usr'));
$smarty->assign("game",getSqlRest('gamename'));
$smarty->assign("facevalue",getSqlRest('chargeamount'));
$smarty->display('query.tpl');
?>

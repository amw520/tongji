<?php include 'conn.php';?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>订单统计研究院 </title>

		<link href="default/common.css" rel="stylesheet" type="text/css"/> 
		<link href="default/style.css" rel="stylesheet" type="text/css"/>
		
	</head>

	<body>

		<div id="wrapper">
			<div class="hd">
				<div class="top-nav">

				</div>

				<div class="logo">
					<div class="logo-tip">
						<span class="separator">|</span>

						<span>流量研究院</span>

					</div>

					<ul class="nav-tabs">
						<li class="nav-tab-item pc-tab nav-tab-cur">
							<a href="http://tongji.baidu.com/data/browser">PC平台</a>
						</li>

						<li class="nav-tab-item app-tab">
							<a href="http://tongji.baidu.com/data/mobile/brand">移动平台</a>
						</li>

					</ul>


				</div>

			</div>


			<div id="bd" class="clearfix">
				<div id="nav" class="" style="position: static; top: 0px; left: 203px;">
					<ul>
						<li class="browser">
							<a class="active" href="#">订单录入</a>
						</li>

						<li class="os">
							<a class="" href="#">订单查询</a>
						</li>

						<li class="resolution">
							<a  href="./index_files/index.htm">订单管理</a>
						</li>


						<li class="about-data">
							<a class="" href="">
								<span>关于数据</span>
							</a>
						</li>

					</ul>

				</div>

				<div id="content" style="margin-left: 0px;">
					<div class="report-title">
						<span>分辨率使用情况</span>


						<div class="part-box clearfix">
								<div class="search">
									<span class="search-type">
									<span class="" data-value="course" >订单日期</span>
									
									</span>
									<div class="part-txt" style="display: block;">
										<input type="text" id="orderdate" class="txt-curstername" value="2014-09-02"/>
									 </div>
								</div>
								<div class="search">
									<span class="search-type">
									<span class="" data-value="course" >订单时间</span>
									
									</span>
									<div class="part-txt" style="display: block;">
										<input type="text" id="ordertime" class="txt-curstername" value="9:00:20"/>
									 </div>
								</div>
								<div class="search" >
									<span class="search-type" style="width: 150px;">
										<span class="title" data-value="" id="orderusr">经手客服</span>
										<i class="more"></i>
									</span>
									<div class="sitem" style="display: none;">
										<?php
										$sqlusrname="select * from usr";


										$result=mysql_query($sqlusrname);
										if($result==true)
											{
											while($myrow=mysql_fetch_array($result))
												{
													$gamename=$myrow["name"];
													$gameid=$myrow["id"];
												Echo "<p><a href='javascript:void(0);' data-value=".$gameid.">".$gamename."</a></p>";
												}
										}?>	
	
										</div>
								</div>
								<div class="search">
									<span class="search-type">
									<span class="title" data-value="" id="gamename">游戏名</span>
									<i class="more"></i>
									</span>
									<div class="sitem" style="display: none;">
										<?php
										$sqlgamename="select * from gamename";


										$result=mysql_query($sqlgamename);
										if($result==true)
											{
											while($myrow=mysql_fetch_array($result))
												{
													$gamename=$myrow["gamename"];
													$gameid=$myrow["id"];
												Echo "<p><a href='javascript:void(0);' data-value=".$gameid.">".$gamename."</a></p>";
												}
										}?>

										
									  </div>
								</div>
								<div class="search">
									<span class="search-type">
									<span class="title" data-value="" id="chargetype">充值项</span>
									<i class="more"></i>
									</span>
									<div class="sitem" style="display: none;">
										<?php
										$sqlamount="select * from chargeamount";


										$result=mysql_query($sqlamount);
										if($result==true)
											{
											while($myrow=mysql_fetch_array($result))
												{
													$gamename=$myrow["typename"];
													$gameid=$myrow["value"];
												Echo "<p><a href='javascript:void(0);' data-value=".$gameid.">".$gamename."</a></p>";
												}
										}?>											
									  </div>
								</div>
								<div class="search">
									<span class="search-type">
									<span class="" data-value="course">客户名</span>
									
									</span>
									<div class="part-txt" style="display: block;">
										<input type="text" id="curstername" class="txt-curstername"/>
									 </div>
								</div>
						</div>

					</div>
					
					

				
				<div class="mod-btn">
					<span onclick="addData()" class="btn-add">添加</span>
				</div>

				</div>
				
			</div>


		</div>

		<div id="ft-wrapper">
			<div id="ft">
				<div class="corp">
					<span >订单统计研究院</span>
					<span class="cp">©2014 </span>

				</div>

			</div>

		</div>
		
		<script src="js/jquery-1.8.3.js"></script>
		<script src="js/init.js"></script>
	</body>
</html>

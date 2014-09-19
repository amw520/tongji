
{include file="header.tpl"}
<div id="bd" class="clearfix">
	{include file="sidenav.tpl"}

	<div id="content" style="margin-left: 0px;">
		<div class="report-title">
			<h2 class="part-maintt">订单</h2>


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
								{foreach  item=contact from=$usr}
									<p><a href='javascript:void(0);' data-value="{$contact.id}">{$contact.name}</a></p>
								{/foreach}
							</div>
					</div>
					<div class="search">
						<span class="search-type">
						<span class="title" data-value="" id="gamename">游戏名</span>
						<i class="more"></i>
						</span>
						<div class="sitem" style="display: none;">
								{foreach  item=contact from=$game}
									<p><a href='javascript:void(0);' data-value="{$contact.id}">{$contact.gamename}</a></p>
								{/foreach}

						  </div>
					</div>
					<div class="search">
						<span class="search-type">
						<span class="title" data-value="" id="chargetype">充值项</span>
						<i class="more"></i>
						</span>
						<div class="sitem" style="display: none;">
								{foreach  item=contact from=$facevalue}
									<p><a href='javascript:void(0);' data-value="{$contact.value}">{$contact.typename}</a></p>
								{/foreach}

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
		<span onclick="queryData()" class="btn-add">查询</span>
	</div>
	<div class="mod-result dn">
		<span>订单条数汇总 <i id="count"></i></span>
		<span>金融汇总 <i id="money"></i></span>
	</div>
	</div>
	
</div>

{include file="footer.tpl"}
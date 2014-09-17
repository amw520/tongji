
/*图片加载错误时使用默认图片*/
$(function() {
    //loadImgError();
});



/*页面滚动*/
(function setFixWinPos(){
    var o = $('.fixwin');
    var sTop = $(window).scrollTop();
    var sLeft = $(window).scrollLeft();
    var wHeight = $(window).height();
    var wWidth = $(window).width();
    var oHeight = o.height();
    var oWidth = o.width();
    o.css('top', parseInt( wHeight / 2 - oHeight / 2) + 'px');
    o.css('left', parseInt(sLeft + wWidth / 2 - oWidth / 2) + 'px');
})();

/*下拉框*/
function JSSelect(select, hsdiv, slist, otext, value, backgroundColor, selectChangeCallback) {
    var i = 0;
    var oSelect = $(select);
	var objWrap=oSelect.parent();
    var oText = objWrap.find(otext);
    //var oSub = $(hsdiv);
	var oSub=objWrap.find(hsdiv);
    var sList = objWrap.find(slist);
    value = value || "";
    var defaultColor = true;
    backgroundColor = (backgroundColor == undefined ? "#D9D9D9" : backgroundColor);
    //下拉框点击
    oSelect.click(function(event) {
        var display = oSub.css("display");
        display != "block" ? oSub.css("display", "block") : oSub.css("display", "none");
    });
    $(document).on("click", function(e) {
        if ($(e.target).closest(slist).size() === 0 && $(e.target).closest(select).size() === 0) {
            oSub.css("display", "none");
        }
    });

    for (i = 0; i < sList.length; i++) {
        //鼠标划过
        $(sList[i]).mouseover(function() {
            $(this).addClass("on");
            if (defaultColor) {
                $(this).css("backgroundColor", backgroundColor);
            }
        });
        //鼠标离开
        $(sList[i]).mouseout(function() {
            $(this).removeClass("on");
            if (defaultColor) {
                $(this).css("backgroundColor", "transparent");
            }

        });
        //鼠标点击
        $(sList[i]).click(function() {
            oText.html($(this).html());
            oText.attr(value, $(this).attr(value));
            oSub.css("display", "none");
            if (selectChangeCallback) {
                selectChangeCallback($(this).attr(value),$(this));
            }
        });
    }
};
/*搜索下拉框初始化*/
$(document).ready( function(){
	$(".search-type").each(function(){
		new JSSelect($(this), ".sitem", "a", ".title", "data-value");
		});
});
/*检索*/
$(function() {
    function search() {
        var searchType = $(".title").attr("data-value");
        var keyword = $.trim($("#search-text").val());

        if (keyword === "") {
            alert("检索词不能为空。");
            return;
        }
        var url = orgUrl + "search_" + searchType + "?q=" + encodeURIComponent(keyword);
        switch (searchType) {
            case "res":
                url = orgUrl + "search_res?searchType=xuezhires&db=0&fact=1&q=" + encodeURIComponent(keyword);
                break;
            case "user":
                url = orgUrl + "search_user?searchType=user&db=user&ff=type userrolecode&fv=user/=/teacher&q=" + encodeURIComponent(keyword);
                break;
            case "course":
                url = orgUrl + "search_course?searchType=course&db=course&ff=type&fv=course&q=" + encodeURIComponent(keyword);
                break;
        default:
        }
        
        location.href = url;
    }
    $("#search-text").keydown(function(e) {
        if(e.keyCode==13) {
            search();   
        }
    });
    $("#search-btn").click(function() {
        search();
    });
});


$(".smore").toggle(function () {
    $(this).prev().css("height", (($(this).prev().children("p").eq(0).height()) * ($(this).prev().children("p").length)));
    $(this).text("收缩");
}, function () {
    $(this).prev().css("height", "210px");
    $(this).text("更多...");
});

/*拖动窗口*/
var moveDiv = function(fdiv, title) {
    var posX;
    var posY;
    fdiv = $(fdiv).get(0);

    $(title).each(function(index, fmov) {
        fmov.onmousedown = function(e) {
            if (!e) e = window.event; //IE
            posX = e.clientX - parseInt(fdiv.style.left);
            posY = e.clientY - parseInt(fdiv.style.top);
            document.onmousemove = mousemove;
        };
        document.onmouseup = function() {
            document.onmousemove = null;
        };
        function mousemove(ev) {
            if (ev == null) ev = window.event; //IE
            var newPosX=ev.clientX - posX;
            var newPosY = ev.clientY - posY;
            if (newPosY < 0) {
                newPosY = 0;
            }
            fdiv.style.left = newPosX + "px";
            fdiv.style.top = newPosY + "px";
        }
    });
};
//moveDiv(".fixwin", ".prop-move");
//添加充值记录
function addData(){
	var curstername,chargetype,gamename,orderusr,ordertime,orderdate,str;
	var url="provider.php";
	if($("#curstername").val()!=""){
		curstername=$("#curstername").val();
	}else{
		alert("客户名不能为空");
	}
	
	if($("#chargetype").attr("data-value")!=""){
		chargetype=$("#chargetype").attr("data-value");
	}else{
		alert("充值项不能为空");
	}
	
	if($("#gamename").attr("data-value")!=""){
		gamename=$("#gamename").attr("data-value");
	}else{
		alert("游戏名称不能为空");
	}
	if($("#orderusr").attr("data-value")!=""){
		orderusr=$("#orderusr").attr("data-value");
	}else{
		alert("经手客服不能为空");
	}
	if($("#ordertime").val()!=""){
		ordertime=$("#ordertime").val();
	}else{
		alert("订单时间不能为空");
	}
	if($("#orderdate").val()!=""){
		orderdate=$("#orderdate").val();
	}else{
		alert("订单日期不能为空");
	}
	
	str="curstername=".concat(curstername).concat("&chargetype=").concat(chargetype)
		.concat("&orderusr=").concat(orderusr).concat("&ordertime=").concat(ordertime)
		.concat("&orderdate=").concat(orderdate).concat("&gamename=").concat(gamename);
		url=url+"?action=addrec&"+str;
		$.get(url,function(data){
			alert(data);
		});
}
//查询总数
function queryData (){
		var curstername,chargetype,gamename,orderusr,ordertime,orderdate,str;
	var url="provider.php?action=querytotal&";
	if($("#curstername").val()!=""){
		curstername=$("#curstername").val();
	}else{
	}
	
	if($("#chargetype").attr("data-value")!=""){
		chargetype=$("#chargetype").attr("data-value");
	}else{
	}
	
	if($("#gamename").attr("data-value")!=""){
		gamename=$("#gamename").attr("data-value");
	}else{
	}
	if($("#orderusr").attr("data-value")!=""){
		orderusr=$("#orderusr").attr("data-value");
	}else{
	}
	if($("#ordertime").val()!=""){
		ordertime=$("#ordertime").val();
	}else{
	}
	if($("#orderdate").val()!=""){
		orderdate=$("#orderdate").val();
	}else{
	}
	
	str="curstername=".concat(curstername).concat("&chargetype=").concat(chargetype)
		.concat("&orderusr=").concat(orderusr).concat("&ordertime=").concat(ordertime)
		.concat("&orderdate=").concat(orderdate).concat("&gamename=").concat(gamename);
		url=url+str;
		$.get(url,function(data){
			alert(data);
		});

}
//添加新用户
function addUsr(){
	var url="provider.php?action=addusr&usr=";
	
	var usrname=$("#usr").val();
	url=url+encodeURI(usrname);
	$.get(url,function(data){
		alert(data);
	});
}
//添加充值游戏种类
function addGamename(){
	var url="tongji/provider.php?action=addgame&gamename=";
	
	var gamename=$("#gamename").val();
	url=url+encodeURI(gamename);
	$.get(url,function(data){
		alert(data);
	});
}
//添加币面值
function addFaceValue(){
	var url="provider.php?action=addfacevalue";
	
	var typename=$("#typename").val();
	var value=$("#value").val();
	var nanfei=$("#nanfei").val();
	url=url+"&typename="+encodeURI(typename)+"&value="+value+"&nanfei="+nanfei;
	$.get(url,function(data){
		alert(data);
	});
}
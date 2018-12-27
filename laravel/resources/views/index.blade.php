<link rel='stylesheet' href="/css/index.css" />
<!--   天气预报插件  !-->
<script>(function(T,h,i,n,k,P,a,g,e){g=function(){P=h.createElement(i);a=h.getElementsByTagName(i)[0];P.src=k;P.charset="utf-8";P.async=1;a.parentNode.insertBefore(P,a)};T["ThinkPageWeatherWidgetObject"]=n;T[n]||(T[n]=function(){(T[n].q=T[n].q||[]).push(arguments)});T[n].l=+new Date();if(T.attachEvent){T.attachEvent("onload",g)}else{T.addEventListener("load",g,false)}}(window,document,"script","tpwidget","//widget.seniverse.com/widget/chameleon.js"))</script>
<script>tpwidget("init", {
    "flavor": "bubble",
    "location": "WX4FBXXFKE4F",
    "geolocation": "enabled",
    "position": "top-right",
    "margin": "10px 10px",
    "language": "zh-chs",
    "unit": "c",
    "theme": "chameleon",
    "uid": "UF1DCA042C",
    "hash": "97cf9acd0210e4afdd77c560cfa03e6e"
});
tpwidget("show");</script>
@extends('app-index')
@section('index-content')
<div id="sidenav_bottomleft">
<a href="http://lol.qq.com" target="_blank"><div id="sidenav_bottomleft_div" style="margin-top: 0;height: 70px;line-height: 95px;background: url(img/sidenav_2.jpg) no-repeat;background-position: -210px 0px;">英雄联盟</div> </a>
<a href="https://www.h1z1.com/home"  target="_blank"><div id="sidenav_bottomleft_div" >H1Z1</div> </a>
<a href="http://xyq.163.com/"  target="_blank"><div id="sidenav_bottomleft_div" style="height:50px;">梦幻西游</div> </a>
<a href="http://dnf.qq.com"  target="_blank"><div id="sidenav_bottomleft_div" onClick="nav3_wechat()">地下城与勇士</div> </a>
<a href="http://www.baidu.com"  target="_blank"><div id="sidenav_bottomleft_div" >其他</div></a>
<a href=""  target="_blank"><div id="sidenav_bottomleft_div" style="height:48px;">相关论坛</div></a>
<a href="http://www.baidu.com"  target="_blank"><div id="sidenav_bottomleft_div" style="height: 72px;line-height:32px;
background: url(img/sidenav_2.jpg) no-repeat;background-position:-210px -1px;">更多详情<br/>请留意更新</div></a>
</div>
<!--
<div id="header_top" onmouseenter="header_top_over();">
<div class="header" style="position:fixed;" onmouseenter="header_top_over();">
<img src="img/header_0.png" style="float:left;width:200px;height:100%;background-size:100% 100%;"></img> 
<div style="margin:0 auto;width:1200px;height:100%;margin:0 auto;">
<table>
<tr>
    <td><a href=""><b>Header1</b></a></td>
    <td><a href=""><b>Header2</b></a></td>
    <td style="width:28%"><a style="font-size:25px" href=""><b>个人主页</b></a></td>
    <td><a href=""><b>Header3</b></a></td>
    <td><a href=""><b>Header4</b></a></td>
</tr>
</table>
</div>
</div>
</div>
-->
<!--
<div id="headernav" onmouseleave="headernav_leave();">
<div class="header">
<div style="float:left;width:200px;height:100%"></div>
<div style="margin:0 auto;width:1200px;height:100%;margin:0 auto;">
<table style="margin-top:20px">
<tr>
    <td><a href=""><b>主页</b></a></td>
    <td><a href=""><b>主页</b></a></td>
    <td style="width:28%"><a href=""><b>主页</b></a></td>
    <td><a href=""><b>主页</b></a></td>
    <td><a href=""><b>主页</b></a></td>
</tr>
<tr>
    <td><a href=""><b>主页</b></a></td>
    <td><a href=""><b>主页</b></a></td>
    <td style="width:28%"><a href=""><b>主页</b></a></td>
    <td><a href=""><b>主页</b></a></td>
    <td><a href=""><b>主页</b></a></td>
</tr>
<tr>
    <td><a href=""><b>主页</b></a></td>
    <td><a href=""><b>主页</b></a></td>
    <td style="width:28%"><a href=""><b>主页</b></a></td>
    <td><a href=""><b>主页</b></a></td>
    <td><a href=""><b>主页</b></a></td>
</tr>
</table></div>
</div>
</div>
-->
<div id="content"  name="remark"> 
<div id="main_1"> 
  <img src="img/headerimage.jpg" style="display:block;margin:0 auto;"/>
  <nav class="header-nav">
    <ul class="header-main-nav clearfix">
	  <li><a href="#" target="_blank">Game</a>
	    <ul class="header-sub-nav">
          <li><a href="http://lol.qq.com">英雄联盟</a></li>
          <li><a href="http://dnf.qq.com">地下城与勇士</a></li>
          <li><a href="http://xyq.163.com">梦幻西游</a></li>
        </ul>
	  </li>
	  <li><a href="#" target="_blank">Luacher</a>
	    <ul class="header-sub-nav">
          <li><a href="#">官网</a></li>
          <li><a href="#">sub_title2</a></li>
          <li><a href="#">sub_title3</a></li>
          <li><a href="#">sub_title4</a></li>
        </ul></li>
	  <li><a href="#" target="_blank">For Test</a>
	    <ul class="header-sub-nav">
          <li><a href="#">官网</a></li>
          <li><a href="#">sub_title4</a></li>
        </ul></li>
	  <li><a href="#" target="_blank">For Test</a>
	    <ul class="header-sub-nav">
          <li><a href="#">官网</a></li>
          <li><a href="#">sub_title4</a></li>
        </ul></li>
	  <li><a href="#" target="_blank">For Test</a>
	    <ul class="header-sub-nav">
          <li><a href="#">官网</a></li>
          <li><a href="#">sub_title2</a></li>
          <li><a href="#">sub_title4</a></li>
        </ul></li>
	</ul> 
  </nav>

@include("rightsidebar")
<div style="float:left;width:70%">
<div class="headarticle">
<div class="imgsubnav">
    <a href="http://lol.qq.com/web201310/info-heros.shtml" target="_blank"><img src="img/imgsubnavmain.jpg" /></a> 
    <table>
	<td><img src="img/TwistedFate.jpg" /></td>
	<td><img src="img/XinZhao.jpg" /></td>
	<td class="this"><img src="img/imgsubnavmain.jpg" /></td>
	<td><img src="img/Ezreal.jpg" /></td>
	<td><img src="img/Shyvana.jpg" /></td>
	</table>
</div>
<p>直到二十年前，符文之地才从战乱中解脱。这片大陆上的人民自远古以来就习惯结群而斗，用战争解决纷争。而不论何时，战争的工具始终都是魔法。</p><p>
军队用法术和符文武装自己，英雄们打造出大部分魔法物品率领部队彼此厮杀。召唤者，瓦罗兰大陆的实际领导者们，他们疯狂使用魔法能量攻击敌人的部队和支持者。他们拥有近乎无限的原始魔法力量使用，从未考虑过无止境的滥用魔法会给这片大陆的环境带来怎么样的灾难。</p><p>
然而近200年来无止境的魔法滥用让瓦罗兰的人民看到了符文之地的脆弱
现状。最后两次符文之战剧烈影响了瓦罗兰的地质环境，尽管人们试图聚集魔法能量来恢复这灾难性的后果，却毫无作用。剧烈的地震和恐怖的魔法风暴让整个瓦罗兰为之颤抖，对人们来说这份恐惧远超过战争的可怖。人们终于意识到世界已经承受不起符文之战的破坏。为了回应世界上不断恶化的政治和经济危机，瓦罗兰的大法师们——包括许多强大的召唤者——达成共识，所有的冲突必须以可控和系统化的方式来处理。</p><p>
他们成立了一个叫“英雄联盟”的组织，目的在于监督瓦罗兰的政治纷争得以有序处理。位于战争学院的英雄联盟获得了瓦罗兰政治实体们的陆续授权，这个组织将管理处置所有政治纷争带来的结果，英雄联盟决定所有主要的政治争论都必须通过特别设立在瓦罗兰各地的竞技场来处理。拥有不同政见的召唤者们各自召唤一个英雄，这些英雄们则带领没有心智意识的小兵进行战斗，这些小兵由初阶召唤者通过召唤节点制造。
</p>
</div>



<div class="sidebartool">
<div class="menu_left">
<ul><li><a href="/article">Aritcles</a></li><li><a href="/database">Mysql zzcdb</a></li><li>
<a href="">asw</a></li></ul><li><a href="/article/downloadlist">Download</a></li>
</div><!--
<div class="menu_right">
<ul>
<li><a onclick="alert('I don\'t think so')">something stay here will be better</a></li>
</ul>
</div>!-->
</div>
<div class="layui-tab">
  <ul class="layui-tab-title">
    <li class="layui-this">新浪新闻</li>
    <li>百度头条</li>
    <li>新浪NBA</li>
    <li>None</li>
    <li>None</li>
  </ul>
  <div class="layui-tab-content">
    <div class="layui-tab-item layui-show">@include("curlhtml.sina_news_top")</div>
    <div class="layui-tab-item">@include("curlhtml.baidu_hotlist_top")</div>
    <div class="layui-tab-item">@include("curlhtml.sina_news_nba_top")</div>
    <div class="layui-tab-item">@include("curlhtml.none_news_top")</div>
    <div class="layui-tab-item">@include("curlhtml.none_news_top")</div>
  </div>
</div> 
<!-- 
<div class="layui-tab clearboth" style="width:100%">
  <ul class="layui-tab-title">
    <li class="layui-this">新浪新闻</li>
    <li>百度头条</li>
    <li>新浪NBA</li>
    <li>None</li>
    <li>None</li>
  </ul>
  <div class="layui-tab-content">
    <div class="layui-tab-item layui-show">@include("curlhtml.sina_news_top")</div>
    <div class="layui-tab-item">@include("curlhtml.baidu_hotlist_top")</div>
    <div class="layui-tab-item">@include("curlhtml.sina_news_nba_top")</div>
    <div class="layui-tab-item">@include("curlhtml.none_news_top")</div>
    <div class="layui-tab-item">@include("curlhtml.none_news_top")</div>
  </div>
</div> 
 
<div class="mainconten_left">
	<div class="menu">
	
	</div>
	<div class="content">
		<ul class="news_menu">
			<li class="firstli">新浪新闻</li><li>百度头条</li><li>For Test</li> 
		</ul>
		<div style="display:block">
		</div>
		<div>
		</div>
		<div>
		</div>
	</div>
</div>



<div class="nav2main">
	<ul id="nav">
		<li>More</li> 
		<li>More</li> 
		<li>More</li>
		<li>More</li>
		<li>More</li>
		<li><a href="https://www.baidu.com" target="_blank ">更多</a></li> 
	</ul>
	
	<div></div>
	<div></div>
	<div></div>
	<div></div>
</div>

!-->
</div>
</div>
</div>
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/my.js"></script>
<script src="js/music.js"></script>
<script src="js/layui/layui.js" charset="utf-8"></script><script>
//注意：选项卡 依赖 element 模块，否则无法进行功能性操作
layui.use('element', function(){
  var element = layui.element;
  
});
</script>

@endsection



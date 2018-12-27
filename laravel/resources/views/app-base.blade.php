<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<title>Personal Page</title>
	<!--
	
	!-->
	<link rel='stylesheet' href="/css/app-base.css"/>
	<!--header用到的js!-->
<script src="{{ URL::asset('js/vendor/jquery-1.12.0.min.js') }}"></script>
<script src="{{ URL::asset('js/megamenu.js') }}"></script>
 <script type="text/javascript">
      $(function(){
          function footerPosition(){
              $("footer").removeClass("fixed-bottom");
              var contentHeight = document.body.scrollHeight,//网页正文全文高度
                  winHeight = window.innerHeight;//可视窗口高度，不包括浏览器顶部工具栏
              if(!(contentHeight > winHeight)){
                  //当网页正文高度小于可视窗口高度时，为footer添加类fixed-bottom
                  $("footer").addClass("fixed-bottom");
              } else {
                  $("footer").removeClass("fixed-bottom");
              }
          }
          footerPosition();
          $(window).resize(footerPosition);
      });
    </script>
</head>
<body>
@include('header')
<div style="padding-top:63px;">
@yield('base-content')
</div>
<div id="back-to-top"><div class="inner">回到顶部</div></div>
</body>
<footer>
  <div class="ft-info" id="bottom"><a href="http://www.baidu.com">A</a>
  |&nbsp;<a href="javascript:showmsg('NULL')">S</a>
  |&nbsp;<a href="javascript:showmsg('NULL')">W</a>
  </div>
  <p class="right-em">FOR PERSONAL</p>
  <p><span>3 0624700 3 0624770 5 34202 13942 43140624</span></p>
  <p id="copyright"><small>Copyright ©2017-2018 Until(www.zzcpersonal.top), All Rights Reserved</small></p>
</footer>
</html>
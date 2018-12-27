$(function () {
      //二级导航
      $(".header-main-nav>li").hover(function () {$(">ul", this).stop().fadeIn();}, function () {$(">ul", this).stop().fadeOut();});
	})
///------------------------------------------------------------

//-----------------当页面宽度变化  

window.onresize = websizechange;
window.onload= function(){
  websizechange();
  mymusicInit();
  var el=document.getElementsByClassName('imgsubnav');
  var td=el[0].children[1].children[0].children[0].children;
  var t2 = window.setInterval(imghsubnav_autochange,3500); 
  
}
function imghsubnav_autochange(){ 
  var el=document.getElementsByClassName('imgsubnav');
  var td=el[0].children[1].children[0].children[0].children;
  var len=td.length;
  if(td[len-1].className=="this")
  {
	  td[0].children[0].click();
  }else
  {
  for(var i=0;i<len;i++)
	  if(td[i].className=="this")
	  {
		  td[i+1].children[0].click();
		  break;
	  }
  }
  
}
function getScrollTop(){   
    var scrollTop=0;   
    if(document.documentElement&&document.documentElement.scrollTop){   
        scrollTop=document.documentElement.scrollTop;   
    }else if(document.body){   
        scrollTop=document.body.scrollTop;   
    }   
    return scrollTop;   
}   
document.onscroll = function(){  
    var margintop=getScrollTop(); 
	

} 
    function websizechange(){
	var margintop=document.body.clientHeight;
    margintop-=document.getElementById('sidenav_bottomleft').offsetHeight;
    document.getElementById('sidenav_bottomleft').style.marginTop =margintop+"px";
    }
//-----------------当页面宽度变化  

//-----------------弹出顶部导航栏
    function header_top_over(){
		document.getElementById("headernav").style.visibility = "visible";
    }
    function headernav_leave(){
        document.getElementById("headernav").style.visibility = "hidden";
    }
//-----------------图片导航栏imgsubnav
	$('.imgsubnav table td img').click(function (){
	var str=this.src;
	var  imgsubnavchild= this.parentNode.parentNode.parentNode.parentNode.parentNode;
	mainimg=imgsubnavchild.children[0].children[0];
	mainimg.src=this.src;
	
	imgsubnavchild.children[0].href="http://lol.qq.com/web201310/info-defail.shtml?id="
	+str.substring(str.lastIndexOf('/')+1,str.lastIndexOf('.'));
	
	var td=this.parentNode.parentNode.children;
	var len=td.length;
	for( var i = 0; i < len; i++){
		td[i].classList.remove("this");
	}
	this.parentNode.classList.add("this");
	});
//------------------主导航页图片

//------------------wechat二维码
   function nav3_wechat(){
       
   }
   

//----------mainconten_left->content->news_menu
$('.mainconten_left .content .news_menu li').click(function (){
	var li = this.parentNode.children;
	block = this.parentNode.parentNode.children;
	var choice=0;
	for( var i = 0, len = li.length; i < len; i++){
		var obj=li[i];
		if(obj==this){
			obj.style.borderTop="solid 6px #fa1";
			obj.style.borderRight="solid 2px #fa1";
			choice=i;
			block[i+1].style.display='block';
		}else{
			obj.style.borderTop="solid 6px #f7f7f7";
			obj.style.borderRight="solid 2px #f7f7f7";
			block[i+1].style.display='none';
		}
	}
	if(choice==0)li[choice].style.borderLeft="solid 2px #fa1";
	else {
		li[0].style.borderLeft="solid 2px #f7f7f7";
		li[choice-1].style.borderRight="solid 2px #fa1";
	}
	//.getElementsByTagName("div");
});
//----------新闻nav2main  title
$('.nav2main #nav li').click(function (){
	var li = this.parentNode.children;
	block = this.parentNode.parentNode.children;
	var choice=0;
	for( var i = 0, len = li.length; i < len; i++){
		var obj=li[i];
		if(obj==this){
			obj.style.color="#00aaff";
			obj.style.backgroundPosition="0px -32px";
			choice=i;
		}else{
			obj.style.color="#fff";
			obj.style.backgroundPosition="0px 3px";
		}
	}
	for(var i=1,len=block.length;i<len;i++){
		block[i].style.display='none';
	}
	block[choice+1].style.display='block';
	//.getElementsByTagName("div");
});

//----------rightsidebar
$('.top li').click(function (){
	var li = this.parentNode.children;
	var block = this.parentNode.parentNode.children;
	for( var i = 0, len = li.length; i < len; i++){
		var obj=li[i];
		if(obj==this){
			block[i+2].style.display='block';
			obj.children[0].classList.add("this");
			obj.style.color="#fff";
			if(obj.innerHTML!="音乐")audio_pause();
		}
		else{
			obj.children[0].classList.remove("this");
			obj.style.color="#000";
			block[i+2].style.display='none';
		}
	}
	
});

function showmsg(msg)
{
	alert(msg);
}

//--------------------------
























var CanvasXSize = document.getElementById('myCanvas').offsetWidth;
var CanvasYSize = document.getElementById('myCanvas').offsetHeight;
var img_left_out=new Image();
var img_left=new Image();
var img_right=new Image();
var img_right_out=new Image();
var img_middle = new Image();
var choice=0;
var img_total=3;
img_left.src=getimgsrc(-1);
img_middle.src = getimgsrc(0);
img_right.src=getimgsrc(1);
var img_middleW;//middle图像width
var img_middleH;//middle图像height
var img_middledx;//middle图像dx
var img_backW;//第二层图像width
var img_backH;//第二层图像height
var img_backdy; //第二层图像dy
var Interval1;
var clearX;//存放清空canvas的x坐标
var clearY;//存放清空canvas的y坐标
var speed = 5; //刷新速度，数值越小刷新越快
var middle_scale = 1;//图像缩放的倍数
var back_scale = 0.7;//图像缩放的倍数
var opacity=0.4;//第二层left图像上矩形区域的透明度
var x = 0;//第二层left图像左上角的x坐标
var xIncrement = 1;//第二层left图像左上角的x坐标的增加量
var display=false;
var ctx;
var audio = document.getElementById("audio1");
var jindutiao_judge=false;
var ctx2= document.getElementById('ltime_Canvas').getContext('2d');
var bofangtiaowidth=document.getElementById("ltime_Canvas").offsetWidth-30;

audio.onended = function(){
	pic_button_up(1);
};
function mymusicInit() {
	var div,backdivW,backdivH,backright_mL;
	img_middleW=200;
	img_middleH=200;
	img_middledx=0;
	img_backW=img_middleW*back_scale;
	img_backH=img_middleH*back_scale;
	img_backdy = 0;
	img_left_onload();
	img_right_onload();
	img_middle_onload();
	if(img_backW>img_middledx)
	{
		backdivW=img_middledx+'px';
		backright_mL=img_middledx+img_middleW+'px'
	}
	else{
		backdivW=img_backW+'px';
		backright_mL=CanvasXSize-img_backW+'px';
	}
	backdivH=img_backH+'px';
	div=document.getElementById('img_divleft');
	div.style.width=backdivW;
	div.style.height=backdivH;
	div.style.marginTop=img_backdy+'px';
	div=document.getElementById('img_divright');
	div.style.width=backdivW;
	div.style.height=backdivH;
	div.style.marginTop=img_backdy+'px';
	div.style.marginLeft=backright_mL;
	div=document.getElementById('img_divmiddle');
	div.style.width=img_middleW+'px';
	div.style.height=img_middleH+'px';
	div.style.marginTop=(CanvasYSize-img_middleH)/2+'px';
	div.style.marginLeft=img_middledx+'px';
	div=document.getElementById('pic_middle_play');
	div.style.marginTop=(CanvasYSize-div.offsetHeight)/2+'px';
	div.style.marginLeft=(CanvasXSize-div.offsetWidth)/2+'px';
	//audio初始化
	document.getElementById('audio1').src=setaudiosrc(choice);
	img_play_refresh();
	//audio界面进度条初始化
	ctx2.clearRect(0,0,bofangtiaowidth,80);
	ctx2.fillStyle = "rgba(255,221,170,1)";
	ctx2.fillRect(15,15,bofangtiaowidth,2);
	ctx2.fill();
	document.getElementById('musicmsg').innerHTML=getname(choice);
}
function img_left_onload(){
	var dx,dy;
	dx=0;
	dy=(CanvasYSize-img_backH)/2;
	img_backdy=dy;
    ctx = document.getElementById('myCanvas').getContext('2d');
	ctx.drawImage(img_left,dx,dy,img_backW,img_backH);
	ctx.fillStyle = "rgba(200,200,200,"+opacity+")";
	ctx.fillRect(dx,dy,img_backW,img_backH);
}
function img_right_onload(){
	dy=(CanvasYSize-img_backH)/2;
	dx=CanvasXSize-img_backW;
    ctx = document.getElementById('myCanvas').getContext('2d');
	ctx.drawImage(img_right,dx,dy,img_backW,img_backH);
	ctx.fillStyle = "rgba(200,200,200,"+opacity+")";
	ctx.fillRect(dx,dy,img_backW,img_backH);
}
function img_middle_onload(){
	clearX = CanvasXSize; //清空canvas的x坐标赋值为CanvasXSize
    clearY = CanvasYSize; //清空canvas的y坐标赋值为CanvasYSize
    img_middledx=(CanvasXSize-img_middleW)/2;
    ctx = document.getElementById('myCanvas').getContext('2d');
	ctx.drawImage(img_middle,img_middledx,(CanvasYSize-img_middleH)/2,img_middleW,img_middleH);
}
function pic_button_up(z){
	if(display)return;
	display=true;
	if(Interval1!=null)clearInterval(Interval1);
	x=0;
	img_left_out.src=getimgsrc(choice-2);
	img_left.src=getimgsrc(choice-1);
	img_middle.src=getimgsrc(choice);
	img_right.src=getimgsrc(choice+1);
	img_right_out.src=getimgsrc(choice+2);
	if(z==-1){
		Interval1=setInterval(draw_right, speed);
		choice--;
		if(choice<0)choice=img_total-1;
	}
	else if(z==1){
		Interval1=setInterval(draw_left, speed);
		choice++;
		if(choice>=img_total)choice=0;
	}
	document.getElementById('musicmsg').innerHTML=getname(choice);
	document.getElementById('audio1').src=setaudiosrc(choice);
	
	audio_play();
	img_play_refresh();
}
function draw_right() {
    //left->right
	var middledx,middledy,middleW,middleH,backdx,backdy;
	var backW,backH;
	var scale=x/(img_middledx);//变化倍率
	if(scale>1)scale=1;
	backW = img_middleW*(back_scale+(1-back_scale)*scale);//img_middleW*0.3 -> img_middleW 递增
	backH = img_middleH*(back_scale+(1-back_scale)*scale);//img_middleH*0.3 -> img_middleH 递增
	backdx=(img_middledx)*scale;//0->img_middledx 递增
	backdy=img_backdy-(img_backdy-(CanvasYSize-img_middleH)/2)*scale;//img_backdy->(CanvasYSize-img_middleH)/2 递减
	
	middleW = img_middleW*(back_scale+(1-back_scale)*(1-scale));//img_middleW -> img_middleW*0.3 递减
	middleH = img_middleH*(back_scale+(1-back_scale)*(1-scale));//img_middleH -> img_middleH*0.3 递减
	
	middledx=img_middledx+(CanvasXSize-img_backW-img_middledx)*scale;
	middledy=(CanvasYSize-img_middleH)/2+(img_backdy-(CanvasYSize-img_middleH)/2)*scale;
	
	ctx.clearRect(0,0,CanvasXSize,CanvasYSize);
	//右端
	ctx.drawImage(img_right,CanvasXSize-img_backW,img_backdy,img_backW,img_backH);
	ctx.fillStyle = "rgba(200,200,200,"+opacity+")";
	ctx.fillRect(CanvasXSize-img_backW,img_backdy,img_backW,img_backH);
	//中间->右端
	ctx.drawImage(img_middle,middledx,middledy,middleW,middleH);
	ctx.fillStyle = "rgba(200,200,200,"+(opacity*scale).valueOf()+")";
	ctx.fillRect(middledx,middledy,middleW,middleH);
	//最左端
	ctx.drawImage(img_left_out,0,img_backdy,img_backW,img_backH); //drawImage
	ctx.fillStyle = "rgba(200,200,200,"+opacity+")";
	ctx.fillRect(0,img_backdy,img_backW,img_backH);
	//左端->中间
	ctx.drawImage(img_left,backdx,backdy,backW,backH);
	ctx.fillStyle = "rgba(200,200,200,"+(opacity*(1-scale)).valueOf()+")";
	ctx.fillRect(backdx,backdy,backW,backH);
	//draw image
    //amount to move
	if(scale==1){
	clearInterval(Interval1);
	display=false;
	x=1;}
	x += xIncrement;
}
function draw_left() {
    //right->left
	var middledx,middledy,middleW,middleH,backdx,backdy;
	var backW,backH;
	var scale=x/(img_middledx);//变化倍率
	if(scale>1)scale=1;
	ctx.clearRect(0,0,CanvasXSize,CanvasYSize);
	backW = img_middleW*(back_scale+(1-back_scale)*scale);//img_middleW*0.3 -> img_middleW 递增
	backH = img_middleH*(back_scale+(1-back_scale)*scale);//img_middleH*0.3 -> img_middleH 递增
	//递减
	backdx=img_middledx+(CanvasXSize-img_backW-img_middledx)*(1-scale);
	//img_backdy->(CanvasYSize-img_middleH)/2 递减
	backdy=img_backdy-(img_backdy-(CanvasYSize-img_middleH)/2)*scale;
	
	middleW = img_middleW*(back_scale+(1-back_scale)*(1-scale));//img_middleW -> img_middleW*0.3 递减
	middleH = img_middleH*(back_scale+(1-back_scale)*(1-scale));//img_middleH -> img_middleH*0.3 递减
	
	//左移 dx递减至0
	middledx=img_middledx*(1-scale);
	middledy=(CanvasYSize-img_middleH)/2+(img_backdy-(CanvasYSize-img_middleH)/2)*scale;
	
	//最右端,dx=CanvasXSize-img_backW
	ctx.drawImage(img_right_out,CanvasXSize-img_backW,img_backdy,img_backW,img_backH);
	ctx.fillStyle = "rgba(200,200,200,"+opacity+")";
	ctx.fillRect(CanvasXSize-img_backW,img_backdy,img_backW,img_backH);
	//左端,dx=0
	ctx.drawImage(img_left,0,img_backdy,img_backW,img_backH); //drawImage
	ctx.fillStyle = "rgba(200,200,200,"+opacity+")";
	ctx.fillRect(0,img_backdy,img_backW,img_backH);
	//中间->左端
	ctx.drawImage(img_middle,middledx,middledy,middleW,middleH);
	ctx.fillStyle = "rgba(200,200,200,"+(opacity*scale).valueOf()+")";
	ctx.fillRect(middledx,middledy,middleW,middleH);
	//右端->中间
	ctx.drawImage(img_right,backdx,backdy,backW,backH);
	ctx.fillStyle = "rgba(200,200,200,"+(opacity*(1-scale)).valueOf()+")";
	ctx.fillRect(backdx,backdy,backW,backH);
	//draw image
    //amount to move
	x += xIncrement;
	if(scale==1){
	clearInterval(Interval1);
	display=false;
	x=0;}
}
function getimgsrc(choice){
	var name,imgtype;
	imgtype='jpg';
	if(choice>=img_total)choice-=img_total;
	else if(choice<0)choice+=img_total;
	name=getname(choice);
	return 'img/'+name+'.'+imgtype;
}
function setaudiosrc(choice){
	var name,musictype;
	musictype='mp3';
	if(choice>=img_total)choice-=img_total;
	else if(choice<0)choice+=img_total;
	name=getname(choice);
	return 'music/'+name+'.'+musictype;
}
function getname(choice){
	switch(choice){
		case(0):return 'something just like this';
		case(1):return 'The Next Episode';
		case(2):return 'whxznjgn';
	}
}
function pic_middle_enter(){
var play=document.getElementById('pic_middle_play');
play.style.opacity=1;
}
function pic_middle_leave(){
	var play=document.getElementById('pic_middle_play');
	play.style.opacity=0;
}
function img_play_refresh(){ 
 if(audio!==null){
  if(audio.paused){
	document.getElementById('pic_middle_play').src="img/play.png";
  }else{
	document.getElementById('pic_middle_play').src="img/pause.png";
  }
 }
}
function audio_play(){
 if(audio!==null){
  if(audio.paused){
	document.getElementById('pic_middle_play').src="img/pause.png";
	document.getElementById('musicmsg').style.color='#3cb371';
    audio.play();
  }else{
	document.getElementById('musicmsg').style.color='#FFD3AA';
	document.getElementById('pic_middle_play').src="img/play.png";
    audio.pause();
  }
 }
} 
function audio_pause(){
	document.getElementById('musicmsg').style.color='#FFD3AA';
	document.getElementById('pic_middle_play').src="img/play.png";
    audio.pause();
}


function musicmsgclick(){
	audio_play();
}
function getOffsetLeft(obj){
    var t = obj.offsetLeft;
    var parent = obj.offsetParent;
    while(parent != null){
        t += parent.offsetLeft;
        parent = parent.offsetParent;
    }
    return t;
}
function setjindutiao(){
	var mousex=event.clientX-15;
	var timevalue;
	var realLeft = getOffsetLeft(document.getElementById('ltime_Canvas'));
	var width=bofangtiaowidth;
	if(mousex>realLeft+width)timevalue=audio.duration;
	else
	timevalue=(mousex-realLeft)/width*audio.duration;
	audio.currentTime=timevalue;
}
function setjindutiao_mousemove(){
	if(jindutiao_judge)setjindutiao();
}
function setjindutiao_movestart(){
audio.play();
audio_play();
jindutiao_judge=true;
}
function setjindutiao_moveover(){
audio_play();
jindutiao_judge=false;
}
audio.ontimeupdate=function showtime() {
	var width=audio.currentTime/audio.duration*(bofangtiaowidth);
	var d1=new Date(audio.duration*1000);
	var d2=new Date(audio.currentTime*1000);
	document.getElementById('musicplaytime').innerHTML=d2.getMinutes()+":"+d2.getSeconds()+
	" / "+d1.getMinutes()+":"+d1.getSeconds();
	ctx2.clearRect(0,0,bofangtiaowidth+30,80);
	ctx2.fillStyle = "rgba(255,221,170,1)";
	ctx2.fillRect(15,15,bofangtiaowidth,2);
	ctx2.fill();  
	var grd = ctx.createRadialGradient(width+15, 15, 5, width+15, 15, 15);
	grd.addColorStop(0.1,'#3cb371');
	grd.addColorStop(0.9,'#fff');
	ctx2.fillStyle = grd;
	ctx2.fillRect(width,0,30,30);
	ctx2.fill(); 
	ctx2.fillStyle = "rgba(60,179,113,1)";
	ctx2.fillRect(15,15,width,2);
	ctx2.fill();  	
}
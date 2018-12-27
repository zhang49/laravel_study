<div class="rsidebar">
    <div class="top">
	<div class="test">
	</div>
        <ul>
            <li>音乐<div class="fa this"></div></li><li>联盟资讯<div class="fa"></div></li><li>
			百万勇士<div class="fa"></div></li><li>QAQ<div class="fa"></div></li>
        </ul>
		<div class="top_content" style="display:block;">
			<audio id="audio1">
			<source type="audio/mpeg">
			</audio>
			<div style="margin:0 auto;width:280;height:90%;background:#fff;">
			<div id="img_divleft" onmouseup="pic_button_up(-1);" style="opacity:0;position:absolute;float:left;">
			</div>
			<img src='imag/play.png' id="pic_middle_play" width="40" height="40" style="opacity:0;position:absolute;" />
			<div id="img_divmiddle" onmouseup="audio_play();" onmouseenter="pic_middle_enter();" onmouseleave="pic_middle_leave();" style="opacity:0;position:absolute;">
			</div>
			<div id="img_divright" onmouseup="pic_button_up(1);" style="opacity:0;position:absolute;">
			</div>

			<canvas id="myCanvas" width="280" height="230" style="float:left">
				您的浏览器不支持 HTML5 canvas 标签。</canvas>
			<div style="text-align:center">
			</div>
			<div style="width:280px;height:200px;">
			</div>

			<p id="musicmsg" onclick="musicmsgclick();" style="display:inline-block;text-align:center;color:#FFD3AA;font-size:16px;width:100%;height:25px;margin:0 auto;background:#fff;">
			</p>
			<div id="musicplaytime" style="display:block;text-align:right;color:#000;font-size:14px;width:150px;height:15px;background:#fff;float:right;margin-right:5px;">
			</div>
			<div id="ltime" onclick="setjindutiao();" onmousedown="setjindutiao_movestart();" onmouseup="setjindutiao_moveover();"
			onmousemove="setjindutiao_mousemove();" style="background:#fff;width:90%;float:left;">
			<canvas id="ltime_Canvas" width="280" height="28" style="margin-left:0px;">
				您的浏览器不支持 HTML5 canvas 标签。</canvas>
			</div>
			</div>
		</div>
		<div class="top_content">
			@include("curlhtml.duowan_lol_news_top")
		</div>
		<div class="top_content">
			@include("curlhtml.dnf_activitys")
		</div>
		<div class="top_content">
		
		</div>
	</div>
	 <div class="middle">
		@include("curlhtml.duowan_lol_vedio_top")
	 </div>
	
</div>
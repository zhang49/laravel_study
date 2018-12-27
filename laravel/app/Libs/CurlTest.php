<?php  
namespace App\Libs;

class CurlTest{
	/*
	*U 逆转了量词的"贪婪"模式。 使量词默认为非贪婪的，通过量词后紧跟? 的方式可以使其成为贪婪的。
	*这和 perl 是不兼容的。 它同样可以使用 模式内修饰符设置 (?U)进行设置， 或者在量词后以问号标记其非贪婪(比如.*?)。
	*
	*/
	//新浪新闻top
	function getsina_news_top(){
		$content=$this->curlstart("https://news.sina.com.cn/");
		$content=preg_replace("/list-a news_top/","subtitle",$content);
		$pattern = "/<ul class=\"list_14_noBg\" id=\"blk_gnxw_011\"(.*?)<\/ul>/s";
		preg_match_all($pattern,$content,$matches);
		$matches=$matches[0][0];
		$matches=preg_replace("/<ul class=\"list_14_noBg\" id=\"blk_gnxw_011\" data-client=\"p_china\" data-sudaclick=\"news_gn_1\">/",
		"",$matches);
		$matches=preg_replace("/<\/ul>/","",$matches);
		$matches=preg_replace("/<li class=\"dot topli14\">/","<li>",$matches);
		$matches=preg_replace("/<li/","<li class=\"fa\"",$matches);
		$content=$matches;
		$pattern = "/<li class=\"fa\"(.*?)<\/li>/s";
		preg_match_all($pattern,$content,$matches);
		$matches=$matches[0];
		$len=count($matches);
		if($len>12){
			for($i=12;$i<$len;$i++)unset($matches[$i]);
		}
		$matches[0]="<ul class=\"subtitle\">".$matches[0];
		return $matches;
	}
	//新浪NBAtop
	function getsina_news_nba_top(){
		$content=$this->curlstart("http://sports.sina.com.cn/nba/");
		//$content=preg_replace("/list-a news_top/","subtitle",$content);
		$pattern = "/<ul class=\"list\">(.*?)<\/ul>/s";
		preg_match_all($pattern,$content,$matches);
		$matches=$matches[0][1];
		$matches=preg_replace("/<ul class=\"list\">/","",$matches);
		$matches=preg_replace("/<li class=\"item\">/","",$matches);
		$matches=preg_replace("/<\/li\">/","",$matches);
		$matches=preg_replace("/<h3 class=\"title\">/","<li class=\"fa\">",$matches);
		$matches=preg_replace("/<\/h3/","</li",$matches);
		$matches=preg_replace("/<p/","<li class=\"fa\"",$matches);
		$matches=preg_replace("/<\/p/","</li",$matches);
		$content=$matches;
		$pattern = "/<li class=\"fa\"(.*?)<\/li>/s";
		preg_match_all($pattern,$content,$matches);
		$matches=$matches[0];
		$len=count($matches);
		if($len>12){
			for($i=12;$i<$len;$i++)unset($matches[$i]);
		}else
		{
			array_push($matches,"<li class=\"fa\"><a hreaf=\"http://sports.sina.com.cn/nba/\">more</a></li>");
		}
		$matches[0]="<ul class=\"subtitle\">".$matches[0];
		return $matches;
	}
	//百度新闻top
	function getbaidu_hotlist_top(){
		$content=$this->curlstart("http://top.baidu.com/buzz?b=1&fr=topindex");
		$pattern = "/<a class=\"list-title\"(.*)<\/a>/m";
		preg_match_all($pattern,$content,$matches);//匹配<a>
		$matches=$matches[0];
		$len=count($matches);
		if($len>12){
			for($i=12;$i<$len;$i++)unset($matches[$i]);
		}
		$matches[0]="<ul class=\"subtitle\">".$matches[0];
		$matches=preg_replace("/ class=\"list-title\"/","",$matches);
		$matches=preg_replace("/<a/","<li class=\"fa\"><a",$matches);
		$matches=preg_replace("/<\/a>/","</a></li>",$matches);
		return $matches;
	}
	//LOL多玩资讯top
	function getduowan_lol_news_top(){
		$content=$this->curlstart("http://lol.duowan.com/tag/307577396279.html");
		$pattern = "/<div class=\"mod-tab-content\">(.+?)<\/div>/s";
		preg_match_all($pattern,$content,$matches);
		$matches=$matches[0][0];
		$matches=preg_replace("/<div class=\"mod-tab-content\">/","",$matches);
		$matches=preg_replace("/<i /","<b ",$matches);
		$matches=preg_replace("/<\/i>/","</b>",$matches);
		$matches=preg_replace("/<\/div>/","",$matches);
		$matches=preg_replace("/<li>/","<li class=\"normal\">",$matches);
		return $matches;
	}
	//LOL多玩周视频top
	function getduowan_lol_vedio_top(){
		$content=$this->curlstart("http://lol.duowan.com/tag/307577396279.html");
		//$content=preg_replace("/list-a news_top/","subtitle",$content);
		$pattern = "/<ul class=\"v-list\">(.*?)<\/ul>/s";
		preg_match_all($pattern,$content,$matches);
		$matches=$matches[0][1];
		$matches=preg_replace("/<span class=\"v-list__play\">/","<span class=\"fa v-list__play\">",$matches);
		$matches=preg_replace("/<span class=\"v-list__author\">/","<span class=\"fa v-list__author\">",$matches);
		$matches=preg_replace("/<a href/","<a target=\"_blank\" href",$matches);
		return $matches;
	}
	//DNF帮帮活动
	function get_dnf_activitys(){
		$content=$this->curlstart("http://bang.qq.com/actcenter/index/dnf");
		//$content=preg_replace("/list-a news_top/","subtitle",$content);
		$pattern = "/<div class=\"s-item-cont(.*?)<\/div>/s";
		preg_match_all($pattern,$content,$matches);
		$matches=$matches[0];
		$matches=preg_replace("/<div class=\"s-item-tags clearfix\">/","",$matches);
		$matches=preg_replace("/<\/div>/","",$matches);
		$matches=preg_replace("/<div class=\"s-item-cont\">/","",$matches);
		$matches=preg_replace("/<h2 class=\"s-item-tit\">/","<li>",$matches);
		$matches=preg_replace("/<\/h2>/","</li>",$matches);
		$matches[0]="<ul class=\"m-list\">".$matches[0];
		return $matches;
	}
	function curlstart($url){
		$ch = curl_init();  
		$timeout = 10; // set to zero for no timeout  
		curl_setopt ($ch, CURLOPT_URL,$url);  
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);   
		curl_setopt ($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36');  
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);  
		return curl_exec($ch);
	}
}
?>


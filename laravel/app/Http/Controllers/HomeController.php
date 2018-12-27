<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\TrafficToolFactory;
use App\Libs\CurlTest;

class HomeController extends Controller
{
	function index(){
		$this->getcurlhtml("baidu_hotlist_top");
		$this->getcurlhtml("sina_news_top");
		$this->getcurlhtml("sina_news_nba_top");
		$this->getcurlhtml("duowan_lol_news_top");
		$this->getcurlhtml("duowan_lol_vedio_top");
		$this->getcurlhtml("dnf_activitys");
		return view('index');//->with('matches',$matches);
	}
	/*
	*更新refreshdatatime，判断是否抓取
	*/
	function getcurlhtml($name){
		$viewname=$name.".blade.php";
		$path=str_replace("public","resources",$_SERVER['DOCUMENT_ROOT'])."/views/curlhtml/";
		/*
		*若viewname不在refreshdatatime.txt中，则添加
		*若viewname最新一次的刷新时间超出指定时间则抓取网页
		*/
		$file=fopen($path."refreshdatatime.txt","r+") or die("open error");
		$len=0;
		$viewtimeontxtseek=NULL;
		$txtcontent="";
		while(!feof($file)){
			$line=fgets($file);
			if(strstr($line,$viewname)){
				$viewtimeontxtseek=substr($line,strlen($viewname));
				$txtcontent.=$viewname." ".time()."\r\n";
				continue;
			}
			$txtcontent.=$line;
			if($viewtimeontxtseek!=0)$len=strlen($line);
		}
		fclose($file);
		//viewtimeontxtseek!=NULL 即更新refreshdatatime中有viewname
		if($viewtimeontxtseek!=NULL){
			$last=getdate(intval($viewtimeontxtseek));
			$now=getdate();
			/*yday该年中的第N天，天数不同时重新抓取网页*/
			if($last['yday']!=$now['yday']
			//|| (intval($last['minutes'])<=intval($now['minutes'])+1)
			//|| intval($last['hours'])<intval($now['hours'])
			){
				//viewname最新一次的刷新时间超出指定时间
				//更新refreshdatatime.txt
				$this->curlwritetoviews($name);
				$file=fopen($path."refreshdatatime.txt","w") or die("open error");
				fwrite($file,$txtcontent);
				fclose($file);
			}
		}else{
			//viewname不在txt中
			//添加到refreshdatatime.txt
			$this->curlwritetoviews($name);
			$file=fopen($path."refreshdatatime.txt","a") or die("open error");
			fwrite($file,"\r\n".$viewname." ".time());
			fclose($file);
		}
	}
	/*
	*抓取网页,写入视图文件
	*/
	function curlwritetoviews($name){
		$viewname=$name.".blade.php";
		$path=str_replace("public","resources",$_SERVER['DOCUMENT_ROOT'])."/views/curlhtml/";
		$ct=new CurlTest();
		switch($name){
			case "sina_news_top":
				$matches=$ct->getsina_news_top();/*新浪news_top*/
				break;
			case "sina_news_nba_top":
				$matches=$ct->getsina_news_nba_top();
				break;
			case "baidu_hotlist_top":
				$matches=$ct->getbaidu_hotlist_top();/*百度hotlist*/
				break;
			case "duowan_lol_news_top":
				$matches=$ct->getduowan_lol_news_top();/*多玩LOL新闻top*/
				break;
			case "duowan_lol_vedio_top":
				$matches=$ct->getduowan_lol_vedio_top();/*多玩LOL视频top*/
				break;
			case "dnf_activitys":
				$matches=$ct->get_dnf_activitys();/*帮帮DNF活动*/
				break;
		}
		/*
		*字符编码转为UTF-8，写入txt文件
		*/
		$file=fopen($path.$viewname,"w+") or die("open error");
		if(!empty($matches)){
			if(is_array($matches))$charencode=$matches[0];//一维数组,取其中的字符串
			else $charencode=$matches;//非数组,直接赋值字符串
			
			$encode=mb_detect_encoding($charencode,array("ASCII","UTF-8","GB2312","GBK","BIG5"));
			if ($encode !="UTF-8"){
				if(is_array($matches))foreach($matches as $m)fwrite($file,iconv($encode,"UTF-8",$m));
				else fwrite($file,iconv($encode,"UTF-8",$matches));
			}
			else{
				if(is_array($matches)){
					foreach($matches as $m)fwrite($file,$m);
				}
				else 
				{
					fwrite($file,$matches);
				}
			}
		}
		fclose($file);
	}
}
  /*public function index(){
		$tra=new Traveller('Train');
		$TrafficTool=$tra->getTrafficTool();
    	echo 'getTrafficTool:'.$TrafficTool;
		//return 'type '.$traffictype;
    }*/
/*
class Traveller
{
	public $traffocTool;
	public function __construct($traffocTool){
		$factory=new TrafficToolFactory();
		$this->traffocTool=$factory->createTrafficTool($traffocTool);
		
	}
	public function getTrafficTool(){
		return $this->traffocTool->go();
	}
}*/

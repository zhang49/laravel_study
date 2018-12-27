<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\TrafficToolFactory;
use App\Libs\CurlTest;

class HomeController extends Controller
{
	function index(){
		$name="baidu_hotlist";
		$this->getcurlhtml($name);
		$this->getcurlhtml("sina_news_top");
		return view('index');//->with('matches',$matches);
	}
	function getcurlhtml($name){
		$viewname=$name.".blade.php";
		$path=str_replace("public","resources",$_SERVER['DOCUMENT_ROOT'])."/views/curlhtml/";
		/*
		若viewname不在txt中，则添加
		若viewname最新一次的刷新时间超出指定时间则抓取网页
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
		if($viewtimeontxtseek!=NULL){
			$last=getdate(intval($viewtimeontxtseek));
			$now=getdate();
			if($last['yday']!=$now['yday'] 
			//|| (intval($last['minutes'])<=intval($now['minutes'])+1)
			//|| intval($last['hours'])<intval($now['hours'])
			){
				//viewname最新一次的刷新时间超出指定时间
				//抓取网页,写入viewname
				$this->curlwritetoviews($name);
				//更新refreshdatatime.txt
				$file=fopen($path."refreshdatatime.txt","w") or die("open error");
				fwrite($file,$txtcontent);
				fclose($file);
			}
		}else{
			//viewname不在txt中
			//抓取网页,写入viewname
			$this->curlwritetoviews($name);
			//添加到refreshdatatime.txt
			$file=fopen($path."refreshdatatime.txt","a") or die("open error");
			fwrite($file,"\r\n".$viewname." ".time());
			fclose($file);
		}
	}
	/*
	抓取网页,写入viewname
	*/
	function curlwritetoviews($name){
		$viewname=$name.".blade.php";
		$path=str_replace("public","resources",$_SERVER['DOCUMENT_ROOT'])."/views/curlhtml/";
		$ct=new CurlTest();
				$matches=$ct->getsina_news_top();
		switch($name){
			case "sina_news_top":
				$matches=$ct->getsina_news_top();
				break;
			case "baidu_hotlist":
				$matches=$ct->getbaidu_hotlist();
				break;
		}
		$file=fopen($path.$viewname,"w+") or die("open error");
		if(is_array($matches)){
			$encode=mb_detect_encoding($matches[0],array("ASCII","UTF-8","GB2312","GBK","BIG5"));
		if ($encode !="UTF-8"){
			foreach($matches as $m)fwrite($file,iconv("GBK","UTF-8",$m));
		}
		else
			foreach($matches as $m)fwrite($file,$m);
			fclose($file);
		}
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

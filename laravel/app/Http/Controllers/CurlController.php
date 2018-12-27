<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs;

class CurlController extends Controller
{
	function show(){
		$ct=new Libs\CurlTest();
		$matches=$ct->getsina_news_top();
		return view('curltest')->with('matches',$matches);
	}
}

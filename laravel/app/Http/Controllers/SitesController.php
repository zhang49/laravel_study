<?php
namespace App\Http\Controllers;
class SitesController{
	public function contact(){
		$people=['zzc','xxc','yjh','ly'];
		return view('sites.contact',compact('people'));
	}
	public function index(){
		$articles = array('id' =>'1' , 'title'=>'aaaaa');

		return view('articles.index',compact('articles'));
	}
}

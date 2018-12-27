<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class ArticlesController extends Controller
{
    //
    public function index(){
    	$articles = DB::table('Article')->get();
    	return view('articles.index')->with('articles',$articles);
    }
	public function showdownloadlist(){
	$downloadlist = DB::table('downloadurl')->get();
	return view('articles.downloadlist')->with('downloadlist',$downloadlist);
	}
    public function showarticle($id){
    	$article=DB::table('Article')->where('id', $id)->first();
    	return view('articles.show')->with('article',$article);
    }
    public function modify($id){
    	$article=DB::table('Article')->where('id', $id)->first();
    	return view('articles.modify')->with('article',$article);
    }
    public function remove($id){
		echo "<h1>".$id."ss<h1>";
    	DB::table('Article')->where('id', '=', $id)->delete();
		return redirect("/article");
    }
    public function store(){
    	$input=Request::all();
        DB::table('Article')->insert(['title'=>$input['title'],'content'=>$input['content'],
	'intro'=>$input['intro']]);
		//$upload_dir="uploadfiles";
		//$upload_file=iconv('utf-8','big5',$upload_dir);
		//if(move_uploaded_file($input["myfile"]["tmp_name"],$upload_file)){
		///	echo "<strong>文件上传成功</strong>";
		//	echo "文件名：".$input["myfile"]["name"]."<br>";
		//}
		//else
		//{
		//	echo "<strong>文件上传失败</strong>";
	//		echo "<a href='javascript:history.back()'></a>";
		//}
		return redirect("/article");
    }
	public function upload(){
		return view("upload");
	}
}

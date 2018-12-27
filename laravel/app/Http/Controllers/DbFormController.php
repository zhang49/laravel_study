<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DbFormController extends Controller{
	
	function show(){
		$data = DB::select('SELECT * FROM Schedule');
		//$titles  = DB::table('Schedule')->pluck('Sid');
		return view('databaseform')->with('data',$data);
	}
}
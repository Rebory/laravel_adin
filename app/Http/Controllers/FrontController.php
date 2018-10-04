<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class FrontController extends Controller
{
     public function displaydata(){
    	$posts = DB::table('posts')->orderby('id','ASC')->get();
        return view('index')->with([

        	                            'posts' => $posts,





        	                            

        	                            ]);
     }


}

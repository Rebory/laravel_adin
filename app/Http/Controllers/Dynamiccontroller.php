<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Validator;
use DB;
use App\Dynamic;
//use App\User;

class Dynamiccontroller extends Controller
{
    
    public function createabout(){
                            // $dynamics = Dynamic::orderby('id','DESC')->first();
    	                     $dynamics = DB::table('dynamics')->orderby('id','ASC')->get();
                             return view('dynamics.about')->with(['dynamics' => $dynamics]);
                            }



    public function createcontact(){
                            // $dynamics = Dynamic::orderby('id','DESC')->first();
    	                     $dynamics = DB::table('dynamics')->orderby('id','ASC')->get();
                             return view('dynamics.contact')->with(['dynamics' => $dynamics]);
                            }


     
     public function createheaderfooter(){
                            // $dynamics = Dynamic::orderby('id','DESC')->first();
    	                     $dynamics = DB::table('dynamics')->orderby('id','ASC')->get();
                             return view('dynamics.headerfooter')->with(['dynamics' => $dynamics]);
                            }



    public function aboutusupt(Request $request){

$aboutus = $request->input('aboutus');
if (Dynamic::where('adminkey', '=', Auth::user()->id)->count() > 0){
Dynamic::where(['adminkey' => Auth::user()->id])->update(['aboutus'=>$aboutus]);
return back()->with('flash_message_success','Update Successfully!');
}}




 public function contactusupt(Request $request){

$contactus = $request->input('contactus');
if (Dynamic::where('adminkey', '=', Auth::user()->id)->count() > 0){
Dynamic::where(['adminkey' => Auth::user()->id])->update(['contactus'=>$contactus]);
return back()->with('flash_message_success','Update Successfully!');
}}



 public function headerfooterupt(Request $request){

$header = $request->input('header');
$footer = $request->input('footer');
if (Dynamic::where('adminkey', '=', Auth::user()->id)->count() > 0){
Dynamic::where(['adminkey' => Auth::user()->id])->update(['header'=>$header, 'footer'=>$footer]);
return back()->with('flash_message_success','Update Successfully!');
}}


}

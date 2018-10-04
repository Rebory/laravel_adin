<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Logo;
use Illuminate\Support\Facades\Hash;
use DB;
class LogoController extends Controller
{

public function test(){
//$latestway = User::orderby('id','DESC')->get();
 //$data = DB::table('users')->where('admin','=','1')->orderby('id','DESC')->get();
 //$allusers = DB::table('users')->orderby('id','ASC')->get();
$latestway = DB::table('users')->orderby('id','ASC')->get();

return view('index')->with([
  //'data'=>$data,
  //'allusers'=>$allusers,
  'latestway'=> $latestway,
  'result' => $result
]);
}



  public function displaylogo(){
    $logos = Logo::orderby('id','DESC')->get();

  //$logos = DB::table('logos')->where('adminkey','=','1')->orderby('id','DESC')->fetch();
    return view('admin.logo')->with(['logos' => $logos ]);
}

public function logo()
    { 
      return view('admin.logo');
    }

    public function updatelogo(Request $request)
    {    

            request()->validate([
            'image' => 'required|image|max:2048',
            'size'  => 'required'
            ]);

            if( $request->hasFile('image') ) {
            $file = $request->file('image');

            $fileName = date('YmdHis',time()).'.'.$file->getClientOriginalExtension();
            $destinationPath = 'images/logo'; 
            $path = 'images/logo/'.$fileName;  
            $file = $file->move($destinationPath, $fileName); 
            }

            $size = $request->input('size');
            if (Logo::where('adminkey', '=', Auth::user()->id)->count() > 0) {
                  Logo::where(['adminkey' => Auth::user()->id])->update(['image'=>$path,'size'=>$size]);
                  return back()->with('flash_message_success','Logo Updated Successfully!');
              }
              else{
              $logos  = Logo::create(['image' =>$path,'size'=>$size,'adminkey' =>Auth::user()->id]);
              $logos->save();
              return back()->with('flash_message_success',' Logo Insert Successfully!');

              }

            

           
    }
}



            

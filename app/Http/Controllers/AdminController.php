<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use DB;

class AdminController extends Controller
{

// public function test(){

// // $users = User::all();
// // return view('index', compact('users'));

// $url = "https://newsapi.org/v2/top-headlines?sources=cnn&apiKey=9e687cf4374d4e889f89cc7575b72397";
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url); 
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// $response = curl_exec($ch);
// curl_close($ch);
// $result = json_decode($response);

// $latestway = User::orderby('id','DESC')->get();

// $data = DB::table('users')->where('admin','=','1')->orderby('id','DESC')->get();
// $allusers = DB::table('users')->orderby('id','ASC')->get();

// return view('index')->with([
// 	'data'=>$data,
// 	'allusers'=>$allusers,
// 	'latestway'=> $latestway,
// 	'result' => $result
// ]);
// }

// public function test(){

// 	        return view('index');
//                          }


public function login(Request $request)
{

if($request->isMethod('post')){
$data = $request->input();
if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'admin' => '1'])) {
/*Session::put('adminSession',$data['email']);*/
return redirect('/admin/dashboard');
}
else{
return redirect('/admin')->with('flash_message_error','Invalid Username or Password');
}}
return view('admin.admin_login');
}



public function dashboard(){

// if(Session::has('adminSession')){
//         //Perform all dashboard tasks
//     }else{

//         return redirect('/admin')->with('flash_message_error','Please login to access');
//     }
return view('admin.dashboard');
}
public function settings(){
return view('admin.settings');
}


public function chkPassword(Request $request){
$data = $request->all();
$current_password = $data['current_pwd'];
$check_password = User::where(['admin'=>'1'])->first();
if(Hash::check($current_password,$check_password->password)){
echo "true"; die;
}else {
echo "false"; die;
}}


public function updatePassword(Request $request){
request()->validate([
'current_pwd' => 'required',
'new_pwd' => 'required|string|min:6|max:20'
]);

if($request->isMethod('post')){
$data = $request->all();
$check_password = User::where(['email' => Auth::user()->email,'admin'=>'1'])->first();
$current_password = $data['current_pwd'];
$npass = $data['current_pwd'];

if(Hash::check($current_password,$check_password->password)){
$password = bcrypt($data['new_pwd']);
User::where(['id' => Auth::user()->id,'email' => Auth::user()->email,'admin'=>'1'])->update(['password'=>$password]);
return redirect('/admin/settings')->with('flash_message_success','Password updated Successfully!');
}

else {
return redirect('/admin/settings')->with('flash_message_error','Incorrect Current Password!');
}}}



public function updatedp(Request $request)
{    

request()->validate([
'profile_photo' => 'required|image|max:2048'
]);

if( $request->hasFile('profile_photo') ) {
$file = $request->file('profile_photo');
$fileName = rand(11111, 99999) .'.'.$file->getClientOriginalExtension();
$destinationPath = 'images/backend_img/admin'; //upload folder
$path = 'images/backend_img/admin/'.$fileName;  //use for save full path in database
$file = $file->move($destinationPath, $fileName); // Move the file to the upload Folder
}

if (User::where('id', '=', Auth::user()->id)->count() > 0) 
{
User::where(['id' => Auth::user()->id])->update(['upic'=>$path]);
return back()->with('flash_message_success','DP Updated Successfully!');
}}



public function adminprofile(Request $request){
request()->validate([
'name' => 'required|max:255',
'address' => 'required|min:6|max:255'
]);

//$username = $request->input('username');
$data = $request->all();
$name = $data['name'];
$address = $data['address'];

if (User::where('id', '=', Auth::user()->id)->count() > 0){
User::where(['id' => Auth::user()->id,'admin'=>1])->update([
'name'=>$name,
'address'=>$address   ]);
return back()->with('flash_message_success','Updated Successfully!');
}}


public function username(Request $request){

request()->validate(['username' => 'required|string|min:6|max:20|unique:users']);
$username = $request->input('username');
if (User::where('id', '=', Auth::user()->id)->count() > 0){
User::where(['id' => Auth::user()->id,'admin'=>1])->update(['username'=>$username]);
return back()->with('flash_message_success','Username Update Successfully!');
}}



public function email(Request $request){
request()->validate(['email' => 'required|email|unique:users']);
$email = $request->input('email');
if (User::where('id', '=', Auth::user()->id)->count() > 0){
User::where(['id' => Auth::user()->id,'admin'=>1])->update(['email'=>$email]);
return back()->with('flash_message_success','Email-Id Update Successfully!');
}}



public function mobile(Request $request){
request()->validate(['mobile' => 'required|unique:users|min:10|numeric']);
$mobile = $request->input('mobile');
if (User::where('id', '=', Auth::user()->id)->count() > 0){
User::where(['id' => Auth::user()->id,'admin'=>1])->update(['mobile'=>$mobile]);
return back()->with('flash_message_success','Mobile Number Update Successfully!');
}}



public function logout(){
Session::flush();
return redirect('/admin');
//return redirect('/admin')->with('flash_message_success','Logged out Successfully'); 
}

// public function displayProfile()
// {
//     $users = User::all();
//     return view('admin.settings', compact('users'));
// }

}
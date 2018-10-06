<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;
use Validator;
use DB;
use App\Slider;
class SliderController extends Controller
{


    public function index(){
                             $sliders = Slider::orderby('id','DESC')->get();
                             return view('sliders.index')->with(['sliders' => $sliders]);
                           }


public function edit(Slider $slider)
{
return view('sliders.edit')->with(['slider' => $slider]);
}


public function create()
      {
    	return view('sliders.create');
       }




public function store(Request $request){  

request()->validate([
	'banner' => 'required|image|max:2048'
]);

if( $request->hasFile('banner') ) {
$file = $request->file('banner');
$fileName = rand(11111, 99999) .'.'.$file->getClientOriginalExtension();
$destinationPath = 'images/slider'; //upload folder
$path = 'images/slider/'.$fileName;  //use for save full path in database
$file = $file->move($destinationPath, $fileName); // Move the file to the upload Folder
}



 $sliders = Slider::create([   

                         'banner'        =>  $path,
                         'txt1'          =>  $request->txt1,
                         'txt2'          =>  $request->txt2,
                         'txt3'          =>  $request->txt3,
                         'txt4'          =>  $request->txt4,
                         'txt5'          =>  $request->txt5
                         
                                                                    ]);

return redirect()->route('sliders.index')->with('flash_message_success','Save Successfully!');


}


public function update(Request $request, Slider $slider)
{
request()->validate([
     'banner' => 'image|max:2048'
]);

if( $request->hasFile('banner') ) {
$file = $request->file('banner');
$fileName = rand(11111, 99999) .'.'.$file->getClientOriginalExtension();
$destinationPath = 'images/slider'; //upload folder
$path = 'images/slider/'.$fileName;  //use for save full path in database
$file = $file->move($destinationPath, $fileName); // Move the file to the upload Folder
}
else
{
$path = $request->input('oldphotourl');
}


$slider->banner         = $path;
$slider->txt1           = $request->txt1;
$slider->txt2           = $request->txt2;
$slider->txt3           = $request->txt3;
$slider->txt4           = $request->txt4;
$slider->txt5           = $request->txt5;
$slider->save();

return redirect()->route('sliders.index')->with('flash_message_success','Update Successfully!');
}


public function destroy(Slider $slider)
{

//$slider->delete();
    $path = $slider->banner;
 if(file_exists($path)){
        @unlink($path);
    }
    $slider->delete();
return redirect()->route('sliders.index')->with('flash_message_success','Delete Successfully!');
}




}

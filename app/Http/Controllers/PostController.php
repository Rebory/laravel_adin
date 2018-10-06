<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\Hash;
use DB;


class PostController extends Controller
{


// public function index()
// {
// $posts = Post::orderby('id','DESC')->get();
// return view('posts.index')->with(['posts' => $posts]);
// }

public function index(){
     $posts = Post::latest()->paginate(5);
        return view('posts.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
}


public function edit(Post $post)
{
$categories = Category::orderby('id','ASC')->get();
return view('posts.edit')->with(['categories' => $categories,'post' => $post]);
}


public function create(){

$posts = Post::orderby('id','DESC')->get();
$categories = Category::orderby('id','ASC')->get();
return view('posts.create')->with(['categories' => $categories]);
}



//  public function slugifyUrl($str, $delimiter = '-')
// {

// $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
// return $slug;
// return $this->sendRequest($uri);

// } 

public function store(Request $request){  

request()->validate([
	'title' => 'required|unique:posts',
	'description' => 'required',
	'image' => 'image|max:2048',
	'category' => 'required',
	'publish' => 'required'

]);

if( $request->hasFile('image') ) {
$file = $request->file('image');
$fileName = rand(11111, 99999) .'.'.$file->getClientOriginalExtension();
$destinationPath = 'images/posts'; //upload folder
$path = 'images/posts/'.$fileName;  //use for save full path in database
$file = $file->move($destinationPath, $fileName); // Move the file to the upload Folder
}

else
{
$path = 'images/posts/'.'noimage.png';
}



$str = strtolower($request->title);
$slug = preg_replace('/\s+/', '-', $str);


$adminkey  = Auth::user()->id;
$author  = Auth::user()->name;

 $posts = Post::create([   
 	                     'title'            =>  $request->title,
                         'slug'              =>  $slug,
                         'description'       =>  $request->description,
                         'image'             =>  $path,
                         'category'          =>  $request->category,
                         'publish'           =>  $request->publish,
                         'adminkey'          =>  $adminkey,
                         'author'            =>  $author
                    ]);

            return redirect()->route('posts.index')->with('flash_message_success','Post Successfully!');


}


public function update(Request $request, Post $post)
{
request()->validate([
     'title' => 'required',
     'description' => 'required',
     'image' => 'image|max:2048',
     'category' => 'required'

]);

if( $request->hasFile('image') ) {
$file = $request->file('image');
$fileName = rand(11111, 99999) .'.'.$file->getClientOriginalExtension();
$destinationPath = 'images/posts'; //upload folder
$path = 'images/posts/'.$fileName;  //use for save full path in database
$file = $file->move($destinationPath, $fileName); // Move the file to the upload Folder
}
else
{
$path = $request->input('oldphotourl');
}

//$title = $request->input('title');
//$slug = str_slug($title);

$post->title         = $request->title;
//$post->slug          = $slug;
$post->description   = $request->description;
$post->image         = $path;
$post->category      = $request->category;
$post->publish       = $request->publish;
$post->save();

return redirect()->route('posts.index')->with('flash_message_success','Update Successfully!');
}


public function destroy(Post $post)
{

//$post->delete();
    $path = $post->image;
 if(file_exists($path)){
        @unlink($path);
    }
    $post->delete();

return redirect()->route('posts.index')->with('flash_message_success','Delete Successfully!');
}



}

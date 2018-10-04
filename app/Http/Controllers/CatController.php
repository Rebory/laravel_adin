<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Validator;
use DB;
use App\Category;




class CatController extends Controller
{



 public function index()
    {
        $categories = Category::orderby('id','DESC')->get();
return view('categories.index')->with(['categories'=>$categories]);
            
    }


  public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }


      public function create()
      {
    	return view('categories.create');
       }




    public function store(Request $request){       
      request()->validate(['catname' => 'required|unique:categories']);
      Category::create($request->all());
       return redirect()->route('categories.index')->with('flash_message_success','Add Successfully!'
     );
        }


     

     public function update(Request $request, Category $category)
    {
         request()->validate(['catname' => 'required|unique:categories']);
        $category->catname = $request->catname;
        $category->save();
         //Category::update($request->all());
        return redirect()->route('categories.index')->with('flash_message_success','Update Successfully!');
    }


 public function destroy(Category $category)
    {

    $category->delete();
    //Category::delete();
      return redirect()->route('categories.index')->with('flash_message_success','Delete Successfully!');
    }



}

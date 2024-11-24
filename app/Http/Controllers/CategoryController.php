<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function list()
    {
        // $allCategory=Category::all();
        $allCategory=Category:: with ('parent')->paginate(10);
        $parents=Category::with ('child')->where('parent_id',null)->get();
        return view('backend.category-list', compact('allCategory','parents'));
    }
    public function form()
    {
      $allCategory=Category::all();
      return view('backend.category-form',compact('allCategory'));
    }
    public function store(Request $request)
    {
        //dd($request->all());
        //return redirect()->back();
        $validation=Validator::make($request->all(),[
            'cat_name'=>'required',
            'cat_description'=>'required',
           

        ]);
        if($validation->fails())
        {
            notify()->error($validation->getMessageBag());
            return redirect()->back();
        }
        // $fileName=null;
        // if($request->hasFile('cat_image'))
        // {
        //     $file=$request->file('cat_image');
        //     $fileName=date('Ymdhis'). '.'.$file->getClientOriginalExtension();
        //     $file->storeAs('/uploads',$fileName);
        // }
        // dd($request->all());
        category::create([
          
        'name'=>$request->cat_name,
        'parent_id'=>$request->parent_id,
        'description'=>$request->cat_description,
        // 'image'=>$fileName
        
            
        ]);
        return redirect()->route('category.list');
    }

    
}

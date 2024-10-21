<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class CategoryController extends Controller
{
    public function list()
    {
        // $allCategory=Category::all();
        $allCategory=Category::paginate(5);
        $allCategory=Category::with('parent')->paginate(20);
        return view('backend.category-list', compact('allCategory'));
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
       try{
        category::create([
        'name'=>$request->cat_name,
        'parent_id'=>$request->parent_name,
        'slug'=>str()->slug($request->cat_name),
        'description'=>$request->cat_description
        // 'image'=>$fileName

            
        ]);
        return redirect()->route('category.list');

    } catch(Throwable $e)
    {

        notify()->error($e->getMessage());
    }

}
  public function delete($id)
  {

     try{
        $allCategory=Category::find($id);
        $allCategory->delete();

        notify()->success('Category deleted.');
        return redirect()->back();
     }catch (Throwable $ex)
     {
        notify()->error('Category has product.');
        return redirect()->back();
     }
  }
}

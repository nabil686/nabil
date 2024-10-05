<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function list()
    {
        $allProduct=Product:: with('category')-> paginate(3);
        return view('backend.product-list', compact('allProduct'));
    }
    public function form()
    {
        // return view('backend.product-form');
        $allCategory=Category::all();
        return view('backend.product-form',compact('allCategory') );
    }
    public function store(Request $request)
    {
       //dd($request->all());
       $validation=Validator::make($request->all(),[
        'product_name'=>'required',
        'category_id'=>'required',
        'product_price'=>'required|numeric|min:10',
        'product_image'=>'required|file|max:1024'
       ]);
       if($validation->fails())
       {
         notify()->error($validation->getMessageBag());
         return redirect()->back();
       }
       $fileName=null;
       if($request->hasFile('product_image'))
       {
         $file=$request->file('product_image');
         $fileName=date('Ymdhis'). '.' .$file->getClientOriginalExtension();
         $file->storeAs('/uploads',$fileName);
       }
       Product::create([
         'name'=>$request->product_name,
         'category_id'=>$request->category_id,
         'price'=>$request->product_price,
         'image'=>$fileName

       ]);
       return redirect()->route('product.list');

    }
  
    public function delete($id)
    {
      //dd($id);
      $product=Product::find($id); //data anlam
      $product->delete(); //delete korlam
      notify()->success('Product Deleted successfully.');
      return redirect()->back();
    }
    public function viewProduct($id)
    {
      $product=Product::find($id);
      return view('backend.page.product-view',compact('product'));
    }
    public function edit($id)
    {
      $product=Product::find($id);
      $allCategory=Category::all();
      return view ('backend.page.product-edit', compact('allCategory','product'));
    }
    public function update(Request $request,$id)
    {
      $product=Product::find($id);
      $product->update([
        'name'=>$request->product_name,
        'price'=>$request->product_price,


      ]);
      notify()->success('Product updated sucessfully.');
      return redirect()->route('product.list');
    }
    
}

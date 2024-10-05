<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class allProductController extends Controller
{
    public function statelessProduct()
    {
        $product=Product::all();
        return response()->json($product);
        return $this->responseSuccess($product ,'All Products.');
    }

    public function restfullProduct(Request $request)
    {

        
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
              return $this->responseFailed($validation->getMessageBag());
            }
            
            $fileName=null;
            if($request->hasFile('product_image'))
            {
              $file=$request->file('product_image');
              $fileName=date('Ymdhis'). '.' .$file->getClientOriginalExtension();
              $file->storeAs('/uploads',$fileName);
            }

            $product=Product::create([
              'name'=>$request->product_name,
              'category_id'=>$request->category_id,
              'price'=>$request->product_price,
              'image'=>$fileName
     
            ]);
            return $this->responseSuccess($product,'Product Created successfully.');
     
         }
    }
    public function updateProduct(Request $request,$id)
    {
        //dd($request->all());
        $product=Product::find($id);
        $product->update([
          'name'=>$request->product_name,
          'price'=>$request->product_price,
  
        ]);

       return $this->responseSuccess($product,'Product Updated successfully.');
     

    }

    public function deleteProduct($id)
    {
      //dd($id);
      $product=Product::find($id); //data anlam
      $product->delete(); //delete korlam
    
    return $this->responseSuccess($product,'Product Deleted successfully.');

    }
}

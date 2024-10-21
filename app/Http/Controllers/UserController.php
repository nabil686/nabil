<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        $allUser=User:: with('role')-> paginate(5);
        return view('backend.user-list', compact('allUser'));
    }
    public function form()
    {
        // return view('backend.product-form');
        $allRole=Role::all();
        return view('backend.user-form',compact('allRole') );
    }
    public function store(Request $request)
    {
       //dd($request->all());
       $validation=Validator::make($request->all(),[
        'user_name'=>'required',
        'role_id'=>'required',
        'email'=>'required',
        'password'=>'required',
        // 'image'=>'required|file|max:1024'
       ]);
       if($validation->fails())
       {
         notify()->error($validation->getMessageBag());
         return redirect()->back();
       }
       $fileName=null;
       if($request->hasFile('image'))
       {
         $file=$request->file('image');
         $fileName=date('Ymdhis'). '.' .$file->getClientOriginalExtension();
         $file->storeAs('/uploads',$fileName);
       }
       user::create([
         'name'=>$request->user_name,
         'role_id'=>$request->role_id,
         'email'=>$request->email,
         'password'=>$request->password,
         'image'=>$fileName

       ]);
       return redirect()->route('user.list');

    }
  
    public function delete($id)
    {
      //dd($id);
      $allUser=User::find($id); //data anlam
      $allUser->delete(); //delete korlam
      notify()->success('User Deleted successfully.');
      return redirect()->back();
    }
    public function viewUser($id)
    {
      $user=User::find($id);
      return view('backend.page.user-view',compact('user'));
    }
    public function edit($id)
    {
      $user=User::find($id);
      $role=Role::all();
      return view ('backend.page.user-edit', compact('role','user'));
    }
    public function update(Request $request,$id)
    {
      $user=User::find($id);
      $user->update([

        'name'=>$request->user_name,
        'role_id'=>$request->role_id,
        'email'=>$request->email,
        'password'=>$request->password,
        
      ]);
      notify()->success('User updated sucessfully.');
      return redirect()->route('user.list');
    }
    
}

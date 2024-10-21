<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class RoleController extends Controller
{
    public function list()
    {
        // $allCategory=Category::all();
        $allRole = Role::paginate(5);
        return view('backend.role-list', compact('allRole'));
    }
    public function form()
    {
        return view('backend.role-form');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        //return redirect()->back();
        $validation = Validator::make($request->all(), [
            'role_name' => 'required',

        ]);
        if ($validation->fails()) {
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
        try {
            role::create([
                'name' => $request->role_name,
                // 'status'=>$request->role_status,
                // 'image'=>$fileName


            ]);
            return redirect()->route('role.list');
        } catch (Throwable $e) {

            notify()->error($e->getMessage());
        }
    }

    //Delete
    public function delete($id)
    {

        try {
            $allRole = Role::find($id);
            $allRole->delete();

            notify()->success('Role deleted.');
            return redirect()->back();
        } catch (Throwable $ex) {
            notify()->error('Role has User.');
            return redirect()->back();
        }
    }

    //assign permission
    public function assignPermission($id)
    {
        $rolePermission=RolePermission::where('role_id',$id)->get()->pluck('permission_id')->toArray();

        $permissions = Permission::all();
        $roles = Role::find($id);
        return view('backend.assignPermission', compact('roles','permissions', 'rolePermission'));
    }


    //Store Role permission
    public function storeAssignPermission(Request $request)
    {

        // dd($request->all());

        $validation = Validator::make($request->all(), [
            'role_id' => 'required',
             //'permission_id' => 'required|array',
            'permission.*' => 'required',

        ]);
        if ($validation->fails()) {
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


        try {


            RolePermission::where('role_id',$request->role_id)->delete();
            foreach ($request->permission_id as $permissionId)
                RolePermission::create([
                    'role_id' => $request->role_id,
                    'permission_id' => $permissionId,
                ]);
                notify()->success("Permissions Granted");
                return redirect()->back();

        } catch (Throwable $e) {

            notify()->error($e->getMessage());
            return redirect()->back();
        }
    }
}

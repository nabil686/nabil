<?php

use App\Models\Permission;
use App\Models\RolePermission;

function checkPermission($routeName){


   // dd(auth()->user()->role->name);

    if(auth()->user()->role->name =="Super Admin")
    {
        return true;
    }

$thisUserRole=auth()->user()->role_id;
//dd($thisUserRole);

$getPermission=Permission::where('slug',$routeName)->first();

//dd($getPermission);
$checkHasPermission=RolePermission::where('role_id',$thisUserRole)
                    ->where('permission_id',$getPermission->id)->first();


if($checkHasPermission)
{
    return true;
}

return false;



}
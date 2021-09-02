<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Role;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class RoleController extends Controller
{
   public function index()
   {
    $data['role'] = Role::all();
    return view('backend.role.role-view')->with($data);
}

public function addRole()
{
   return view('backend.role.role-add');
}

public function storeRole(Request $request)
{
  $request->validate([
    'name' => 'required',
]);
  $data = $request->all();
  $data['role_slug'] = str::random(6);
  Role::create($data);
  return redirect()->route('project-management.role.view');
}

public function editRole($id)
{
  
  // dd($slug);
  // $arr = [];
  // $arr1 = str_split($slug);
  // $count = count($arr1);
  // // dd($arr1);
  // foreach($arr1 as $key => $v)
  // {
  //   if($key <= $count-7)
  //   {
  //     $arr[$key] = $v;
  //   } 
  // }
  // $b = implode($arr);
  // $decrypted = Crypt::decryptString($b);
  // dd($decrypted);
  // $id = $decrypted;
    $data['editData'] = Role::find($id);
    return view('backend.role.role-add')->with($data);
}

public function updateRole(Request $request, $id)
{
   $request->validate([
    'name' => 'required',
]);
   $data = Role::find($id);
   $data->update($request->all());
   return redirect()->route('project-management.role.view');
}

public function deleteRole(Request $request)
{
    $data = Role::find($request->id);
    $data->delete();
    return redirect()->route('project-management.role.view');
}
}

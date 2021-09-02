<?php

namespace App\Http\Controllers\Backend\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
    	return view('backend.user.view-user-role')->with('roles', $roles);
    }

    public function storeRole(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);    
      
        $roleData = new Role;
        $roleData->name = $request->name;
        $roleData->description = $request->description;
        $roleData->save();
        $request->session()->flash('success','Role Name Save Successfully');
        return redirect()->back();
    }

    public function getRole(Request $request)
    {
        $roleId = $request->input('id');
        $roleData = Role::find($roleId);
        return response()->json($roleData);
    }

    public function updateRole(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $roleData = Role::find($id);
        $roleData->name =$request->name;
        $roleData->description = $request->description;
        $roleData->save();
        $request->session()->flash('success','Role Name Updated Successfully');
        return redirect()->back();
    }

    public function deleteRole(Request $request)
    {
        $id=$request->id;
        Role::find($id)->delete();
        $request->session()->flash('success','Role Name Updated Successfully');
        return redirect()->back();
    }
}

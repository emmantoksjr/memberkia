<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Permission;
use App\Permission_Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class RolesController extends Controller {

    function displayMessages($title, $message)
    {
        Session::flash($title,$message);
    }

    public function index()
    {
        $id = 1;
        $roles = \DB::table('roles')->where([
                    ["visibility", "=", 1]
                ])->get();
        return view('admin.role.index', compact('roles', 'id'));
    }

    public function create()
    {
        $permissions = Permission::all()->sortByDesc('date');
        return view('admin.role.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|Unique:roles',
            'description' => 'required|Unique:roles'
        ]);

        $role = new Role(array(
            'name' => $request->get('name'),
            'display_name' => $request->get('name'),
            'description' => $request->get('description'),
            'visibility' => 1
        ));

        if($role->save())
        {
            $role = Role::all()->last();
            $permissions = $request->get('permission');
            foreach ($permissions as $permission) {
                if ($permission != '') {
                    $role->savePermissions($request->get('permission'));
                } else {
                    $role->deletePermissions($request->get('permission'));
                }
            }
            $this->displayMessages('success','Role has been created!');
            return redirect('/admin/roles');
        }else{
            $this->displayMessages('error','Error Creating Role. Kindly try again!');
            return redirect('/admin/roles');
        }
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $selected = $role->perms()->get();
        $permissions = \DB::table('permissions')->get();
        return view('admin.role.edit',compact('role','permissions','selected'));
    }

    public function saveEdit($id, Request $request){
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->description = $request->description;
        if($role->update())
        {
            $permissions = $request->get('permission');
            foreach ($permissions as $permission) {
                if ($permission != '') {
                    $role->savePermissions($request->get('permission'));
                } else {
                    $role->deletePermissions($request->get('permission'));
                }
            }
            $this->displayMessages('success','Role has been edited successfully!');
            return redirect('/admin/users');
        }else{
            $this->displayMessages('error','Error Editing Role. Kindly try again!');
            return redirect('/admin/users');
        }
    }

}

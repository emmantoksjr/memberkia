<?php

namespace App\Http\Controllers\Admin;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class PermissionsController extends Controller
{

    function displayMessages($title, $message)
    {
        Session::flash($title,$message);
    }

     public function index() {
        $id = 1;
        $permissions = Permission::all();
        return view('admin.permission.index' , compact('permissions','id'));
    }

    public function create() {
        return view('admin.permission.create');
    }

    public function store(Request $request) {
        
        $permissions = new Permission(array(
            'name' => $request->get('name'),
            'display_name' => $request->get('name'),
            'description' => $request->get('description')
        ));

        $permissions->save();
        $this->displayMessages('success','Priviledges created successfully!');
        return redirect('/admin/priviledges');
    }
}

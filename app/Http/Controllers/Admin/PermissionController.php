<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(){

        $data['roles'] = Role::get();

        return view('admin.permissions',$data);
    }



    public function store(RoleRequest $request){

        try {
            $role = $this->process(new Role, $request);
            if ($role)
                return redirect()->route('admin.permission.index')->with(['toast_success' => 'Registed with success']);
            else
                return redirect()->route('admin.permission.index')->with(['toast_error' => 'There is a problem ']);
        }catch (Exception $ex) {

        return redirect()->route('admin.permission.index')->with(['toast_error' => 'There is a problem ']);
    }


    }



    public function delete($id){

        $investor = Role::find($id);
        //$participant = participant::find($id);

        if ( !$investor) {

            return redirect()->back()->with(['toast_error'=>'There is a problem']);
        }
        $investor->delete();
        return redirect()->back()->with(['toast_success'=>'Deleted with success']);



    }



    protected function process(Role $role, Request $r)
    {
        $role->name = $r->name;
        $role->permissions = json_encode($r->permissions);
        $role->save();
        return $role;
    }
}

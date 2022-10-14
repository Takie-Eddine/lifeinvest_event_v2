<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Employe;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $data['employes'] = Employe::all();
        $data['roles'] = Role::all();
        return view('admin.users',$data);

    }

    public function store(UserRequest $request){
        $user = new Employe();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);   // the best place on model
        $user->role_id = $request->role_id;

        if($user->save())
            return redirect()->route('admin.users.index')->with(['toast_success' => 'Registed with success  ']);
        else
            return redirect()->route('admin.users.index')->with(['toast_error' => 'There is a problem  ']);

    }


    public function delete($id){

        $investor = Employe::find($id);

        if ( !$investor) {

            return redirect()->back()->with(['toast_error'=>'There is a problem']);
        }
        $investor->delete();
        return redirect()->back()->with(['toast_success'=>'Deleted with success']);
    }
}

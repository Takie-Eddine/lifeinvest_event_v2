<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class NewlifeLeadController extends Controller
{
    public function index(){

        $leads = Lead::all();

        return view('admin.newlife',compact('leads'));
    }


}

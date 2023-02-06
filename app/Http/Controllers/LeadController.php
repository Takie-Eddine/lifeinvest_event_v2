<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LeadController extends Controller
{
    public function index(){

        return view('lead.lead');
    }




    public function create(Request $request){

        $request->validate([
            'first_name' => ['required','string'],
            'last_name' => ['required','string'],
            'phone' => ['required',Rule::unique('leads','phone'),'regex:/^([0-9\s\-\+\(\)]*)$/','min:4'],
            'email' => ['required',Rule::unique('leads','email')],
            'note' => ['nullable','string'],
        ]);

        Lead::create([
            'first_name' =>  $request-> first_name ,
            'last_name' => $request->last_name ,
            'phone' => $request->phone ,
            'email' => $request->email ,
            'note' => $request->note ,
        ]);

        $msg =__('investor.success');
            $erroMsg =__('investor.error');


            return redirect()->route('lead.index')->with(['toast_success'=>$msg]);

    }
}

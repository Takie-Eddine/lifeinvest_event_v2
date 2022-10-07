<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partic;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ParticExport;

class EventBookController extends Controller
{
    public function index(){
        $data['partics'] = Partic::all();


        return view('admin.winners',$data);
    }

    public function delete($id){
        $investor = Partic::find($id);

        if ( !$investor) {

            return redirect()->back()->with(['toast_error'=>'There is a problem']);
        }
        $investor->delete();
        return redirect()->back()->with(['toast_success'=>'Deleted with success']);

    }
    
    public function exportods(){


        return Excel::download(new ParticExport,'winner.ods');
    }

    public function exportxls(){


        return Excel::download(new ParticExport,'winner.xls');
    }

    public function exportcls(){


        return Excel::download(new ParticExport,'winner.csv');
    }
    
    
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Persone;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PersoneExport;

class LeadController extends Controller
{
    public function index(){
        $data['persones'] = Persone::all();


        return view('admin.lead',$data);

    }



    public function delete($id){
        $investor = Persone::find($id);
        //$participant = participant::find($id);

        if ( !$investor) {

            return redirect()->back()->with(['toast_error'=>'There is a problem']);
        }
        $investor->delete();
        return redirect()->back()->with(['toast_success'=>'Deleted with success']);

    }
    public function exportods(){


        return Excel::download(new PersoneExport,'leads.ods');
    }

    public function exportxls(){


        return Excel::download(new PersoneExport,'leads.xls');
    }

    public function exportcls(){


        return Excel::download(new PersoneExport,'leads.csv');
    }
}
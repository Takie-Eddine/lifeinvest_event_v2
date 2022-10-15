<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Persone;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PersoneExport;
use Carbon\Carbon;

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
    public function exportods(Request $request){


        $from =  Carbon::parse($request->started)->toDateTimeString();
        $to = Carbon::parse( $request->endded)->toDateTimeString();




        return Excel::download(new PersoneExport(Carbon::parse($request->started)->toDateTimeString(),Carbon::parse( $request->endded)->toDateTimeString()),'leads.ods');
    }

    public function exportxls(Request $request){


        $from =  Carbon::parse($request->started)->toDateTimeString();
        $to = Carbon::parse( $request->endded)->toDateTimeString();


        return Excel::download(new PersoneExport( $from, $to),'leads.xls');
    }

    public function exportcls(Request $request){


        return Excel::download(new PersoneExport($request->started,$request->ended),'leads.csv');
    }
}

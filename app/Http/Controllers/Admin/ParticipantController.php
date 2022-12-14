<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\participant;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ParticipantExport;
use Carbon\Carbon;

class ParticipantController extends Controller
{
    public function index(){
        $data['participants'] = participant::all();
        return view('admin.participant',$data);
    }


    public function delete($id){
        $participant = participant::find($id);


        if ( !$participant) {

            return redirect()->back()->with(['toast_error'=>'There is a problem']);
        }
        $participant->delete();
        return redirect()->back()->with(['toast_success'=>'Deleted with success']);

    }

    public function exportods(Request $request){


        return Excel::download(new ParticipantExport(Carbon::parse($request->started)->toDateTimeString(),Carbon::parse( $request->endded)->toDateTimeString()),'participant.ods');
    }

    // public function exportxls(){


    //     return Excel::download(new ParticipantExport,'participant.xls');
    // }

    // public function exportcls(){


    //     return Excel::download(new ParticipantExport,'participant.csv');
    // }
}

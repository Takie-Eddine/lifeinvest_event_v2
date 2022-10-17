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
        return redirect()->back()->with(['toast_success'=>'Archived with success']);

    }
    public function exportods(Request $request){


        if ($request->started &&  $request->endded) {
            $from =  Carbon::parse($request->started)->toDateTimeString();
            $to = Carbon::parse( $request->endded)->toDateTimeString();
        }

        if ($request->started && !$request->endded) {
            $from =  Carbon::parse($request->started)->toDateTimeString();
            $to = $request->endded ;
        }


        if (!$request->started && $request->endded) {
            $from =  $request->started;
            $to = Carbon::parse($request->endded)->toDateTimeString() ;
        }

        if (!$request->started && !$request->endded) {
            $from =  $request->started;
            $to = $request->endded ;
        }


        //return 'From: '. $from  .'   '   . ' To:   ' .$to;



        return Excel::download(new PersoneExport($from,$to),'leads.ods');
    }

    public function exportxls(Request $request){


        $from =  Carbon::parse($request->started)->toDateTimeString();
        $to = Carbon::parse( $request->endded)->toDateTimeString();

        return $from . '' .$to;

        return Excel::download(new PersoneExport( $from, $to),'leads.xls');
    }

    public function exportcls(Request $request){


        return Excel::download(new PersoneExport($request->started,$request->ended),'leads.csv');
    }



    public function trash(){

        $persones = Persone::onlyTrashed()->paginate(2);

        return view('admin.trash',compact('persones'));

    }


    public function restore(Request $request ,$id){

        $category = Persone::onlyTrashed()->find($id);

        if (!$category) {
            return redirect()->route('admin.leads.trash')->with(['toast_error' => 'Not found']);
        }
        $category->restore();

        return redirect()->route('admin.leads.trash')->with(['toast_success' => ' restored!']);
    }


    public function forceDelete($id){
        $category = Persone::onlyTrashed()->find($id);

        if (!$category) {
            return redirect()->route('admin.leads.trash')->with(['toast_error' => 'Not found']);
        }
        $category->forceDelete();

        return redirect()->route('admin.leads.trash')->with(['toast_success' => ' deleted forever!']);
    }
}

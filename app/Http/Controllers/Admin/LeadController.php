<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Persone;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PersoneExport;
use App\Exports\TrashExport;
use App\Models\Employe;
use Carbon\Carbon;

class LeadController extends Controller
{
    public function index(){

        $request = request();

        $data['employes'] = Employe::all();
        $data['persones'] = Persone::filter($request->query())->get();


        switch($request->input('action')){

            case 'filter';
                $data['persones'] = Persone::filter($request->query())->get();
            break;

            case 'export';
            $data['persones'] = Persone::filter($request->query())->get();

            if ($request->date_started &&  $request->date_endded ) {
                $from =  Carbon::parse($request->date_started)->toDateTimeString();
                $to = Carbon::parse( $request->date_endded)->toDateTimeString();


            }

            if ($request->date_started && !$request->date_endded) {
                $from =  Carbon::parse($request->date_started)->toDateTimeString();
                $to = $request->date_endded ;

            }


            if (!$request->date_started && $request->date_endded) {
                $from =  $request->date_started;
                $to = Carbon::parse($request->date_endded)->toDateTimeString() ;

            }

            if (!$request->date_started && !$request->date_endded) {
                $from =  $request->date_started;
                $to = $request->date_endded ;

            }

            if (!$request->employe) {
                $request->employe = null ;
            }




            return Excel::download(new PersoneExport($from,$to, $request->employe ),'leads.ods');
            break;

            case 'archive';
                $data['persones'] = Persone::filter($request->query())->get();

                if ($data['persones']->count()==0) {
                    return redirect()->back()->with(['toast_error' => ' Not Found!']);
                }

                foreach ( $data['persones'] as $persone) {

                    $persone->delete($persone->id);
                }

                return redirect()->back()->with(['toast_success' => ' Archived with success!']);
            break;
        };

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
    // public function exportods(Request $request){


    //     if ($request->started &&  $request->endded) {
    //         $from =  Carbon::parse($request->started)->toDateTimeString();
    //         $to = Carbon::parse( $request->endded)->toDateTimeString();
    //     }

    //     if ($request->started && !$request->endded) {
    //         $from =  Carbon::parse($request->started)->toDateTimeString();
    //         $to = $request->endded ;
    //     }


    //     if (!$request->started && $request->endded) {
    //         $from =  $request->started;
    //         $to = Carbon::parse($request->endded)->toDateTimeString() ;
    //     }

    //     if (!$request->started && !$request->endded) {
    //         $from =  $request->started;
    //         $to = $request->endded ;
    //     }


    //     //return 'From: '. $from  .'   '   . ' To:   ' .$to;



    //     return Excel::download(new PersoneExport($from,$to),'leads.ods');
    // }

    // public function exportxls(Request $request){


    //     $from =  Carbon::parse($request->started)->toDateTimeString();
    //     $to = Carbon::parse( $request->endded)->toDateTimeString();

    //     return $from . '' .$to;

    //     return Excel::download(new PersoneExport( $from, $to),'leads.xls');
    // }

    // public function exportcls(Request $request){


    //     return Excel::download(new PersoneExport($request->started,$request->ended),'leads.csv');
    // }



    public function trash(){


        $request = request();
        $data['employes'] = Employe::all();
        $data['persones'] = Persone::onlyTrashed()->filter($request->query())->get();

        switch($request->input('action')){

            case 'filter';
                $data['persones'] = Persone::onlyTrashed()->filter($request->query())->get();
            break;

            case 'export';
            $data['persones'] = Persone::onlyTrashed()->filter($request->query())->get();

            if ($request->date_started &&  $request->date_endded ) {
                $from =  Carbon::parse($request->date_started)->toDateTimeString();
                $to = Carbon::parse( $request->date_endded)->toDateTimeString();


            }

            if ($request->date_started && !$request->date_endded) {
                $from =  Carbon::parse($request->date_started)->toDateTimeString();
                $to = $request->date_endded ;

            }


            if (!$request->date_started && $request->date_endded) {
                $from =  $request->date_started;
                $to = Carbon::parse($request->date_endded)->toDateTimeString() ;

            }

            if (!$request->date_started && !$request->date_endded) {
                $from =  $request->date_started;
                $to = $request->date_endded ;

            }

            //return $request ;
            return Excel::download(new TrashExport( $from, $to, $request->employe ),'leads.ods');
            break;

        };

        return view('admin.trash',$data);

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



    public function multipleDelete(Request $request){

        $request->validate([

            'date_started' => ['nullable' ,'date' , 'before:today'],
            'date_endded' => ['nullable' ,'date' , 'after_or_equal:date_started'],
        ]);


        $persones = Persone::whereBetween('created_at',[$request->date_started ,$request->date_endded])->get();

        //return $persones->first()->id;

        if ($persones->count()==0) {
            return redirect()->route('admin.leads.index')->with(['toast_error' => ' Not Found!']);
        }

        foreach ($persones as $persone) {

            $persone->delete($persone->id);
        }

        return redirect()->route('admin.leads.index')->with(['toast_success' => ' Archived with success!']);

    }
}

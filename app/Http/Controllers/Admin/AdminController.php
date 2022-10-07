<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DarRequest;
use App\Models\House;
use App\Models\Investor;
use App\Models\Option;
use App\Models\Partic;
use App\Models\participant;
use App\Models\Persone;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(){

        $data['options'] = Option::first();
        $data['participants'] = participant::all();
        $data['investors'] = Investor::all();
        $data['counter'] = Investor::sum('counter');
        $data['persones'] = Persone::all();
        $data['partics'] = Partic::all();
        $data['houses'] = House::all();


        return view('admin.dashboard' ,$data);

    }

    public function edit(Request $request ,$id){

        //return $request ;

        $option = Option::find($id);
        if (!$option) {
            return redirect()->back()->with(['error'=>'There is a problem']);
        }

        $option->update([
            'min_inv'=>$request->min_inv,
            'step'=>$request->step,
            'share_value'=>$request->share_value,
            'max_value'=>$request->max_value,
        ]);

        return redirect()->route('admin.index')->with((['success'=>'Updated with success']));
    }

    public function deleteparticipant($id){

        //$investor = Investor::find($id);
        $participant = participant::find($id);


        if ( !$participant) {

            return redirect()->back()->with(['error'=>'There is a problem']);
        }
        $participant->delete();
        return redirect()->back()->with(['success'=>'Deleted with success']);


    }

    public function deleteinvestor($id){

        $investor = Investor::find($id);
        //$participant = participant::find($id);

        if ( !$investor) {

            return redirect()->back()->with(['error'=>'There is a problem']);
        }
        $investor->delete();
        return redirect()->back()->with(['success'=>'Deleted with success']);


    }



    public function deletepersone($id){

        $investor = Persone::find($id);
        //$participant = participant::find($id);

        if ( !$investor) {

            return redirect()->back()->with(['error'=>'There is a problem']);
        }
        $investor->delete();
        return redirect()->back()->with(['success'=>'Deleted with success']);


    }


    public function deletepartic($id){

        $investor = Partic::find($id);
        //$participant = participant::find($id);

        if ( !$investor) {

            return redirect()->back()->with(['error'=>'There is a problem']);
        }
        $investor->delete();
        return redirect()->back()->with(['success'=>'Deleted with success']);

    }





    public function store (DarRequest $request){

        try{
            DB::beginTransaction();
                $fileName= '';
                    if ($request->has('logo')) {
                        $file = $request->logo;
                        $fileName = $file->getClientOriginalName();
                        $file-> move(public_path('assets/Image'), $fileName);
                    }

                    $Dar = House::create([
                        'name'=> $request->name,
                        'logo' => $fileName,
                        'wing' =>$request->wing,
                       'first_periode' =>$request->first_periode,
                        'last_periode' =>$request->last_periode,
                        'first_hour' => Carbon::createFromFormat('H:i:s',$request->first_hour)->format('H:i:s') ,
                        'last_hour' => Carbon::createFromFormat('H:i:s',$request->last_hour)->format('H:i:s'),
                    ]);

            DB::commit();
                return redirect()->back()->with(['toast_success'=>'ok']);

            }catch(Exception $ex){

                DB::rollback();
                return redirect()->back()->with(['error' => 'not ok']);
            }




    }

    public function deletedar($id){

        $investor = House::find($id);
        //$participant = participant::find($id);

        if ( !$investor) {

            return redirect()->back()->with(['error'=>'There is a problem']);
        }
        $investor->delete();
        return redirect()->back()->with(['success'=>'Deleted with success']);
    }


}

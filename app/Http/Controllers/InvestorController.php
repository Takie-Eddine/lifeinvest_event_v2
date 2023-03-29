<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestorRequest;
use App\Models\Admin;
use App\Models\City;
use App\Models\Country;
use App\Models\Investor;
use App\Models\Option;
use App\Models\Share;
use App\Notifications\InvestorNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class InvestorController extends Controller
{
    public function index(){

        $data['countries'] = Country::all();
        //$data['shares'] = Share::all();
        $data['options'] = Option::first();

        //$data['counter_rekmaz'] = Investor::where('doshtu','==',0)->sum('counter');

        $data['total'] = (Investor::where('doshtu','!=',0)->sum('counter')) +93;

        $data['rest'] = ($data['options']->doshtu_max - $data['total'] );

        return view('investor.index',$data);

    }



    public function create(InvestorRequest $request){

        try{

            DB::beginTransaction();

        // if (!$request->has('project')){
        //         return redirect()->route('investor.index')->with(['toast_error' => 'There is problem']);
        //     }

            // $rekmaz = 0 ;
            // $doshtu = 1;
            // if ($request->project == 'rekmaz') {

            //     $rekmaz = 1;
            //     $doshtu = 0;
            // }

            $counter = ($request->share_number)/Option::first()->step;

            $investor = Investor::create([
                'first_name'=> $request->first_name,
                'last_name' =>$request->last_name,
                'phone' =>$request->phone,
                'country_id' =>$request->country,
                'email' =>$request->email,
                'counter' =>$counter,
                'doshtu' => 1,
                'rekmaz' => 0,
            ]);


            $msg =__('investor.success');
            $erroMsg =__('investor.error');

            $total = (($request->share_value) * ($request->share_number));

            $share = Share::create([
                'investor_id' =>$investor->id,
                'investment_value' => $total,
                'share_value' =>$request->share_value,
                'share_number' =>$request->share_number,
            ]);



            $admin = Admin::get();

            Notification::send($admin,new InvestorNotification($investor));
            //$admin->notify(new InvestorNotification($investor));


            DB::commit();
            return redirect()->route('investor.index')->with(['toast_success'=>$msg]);
        }catch(Exception $ex){

            DB::rollback();
            return redirect()->route('investor.index')->with(['error' => $ex]);
        }

    }



    public function getCity(Request $request)
    {
        $data['cities'] = City::where("country_id",$request->country_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }


public function policies(){

        return view('investor.policies');
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipantRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\participant;
use Exception;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{
    public function index(){

        $data['countries'] = Country::all();
        $data['participants'] = participant::all()->count();
        return view('participant.index',$data);

    }


    public function create(ParticipantRequest $request){

        try{
                 DB::beginTransaction();

        // $city = City::updateOrCreate([
        //     'name' => $request->city,
        //     'country_id' => $request->country,
        // ]);
        
        $msg =__('participant.success');
        $erroMsg =__('investor.error');


        $participant = participant::create([
            'first_name'=> $request->first_name,
            'last_name' =>$request->last_name,
            'phone' =>$request->phone,
            'company_name' =>$request->company_name,
            'country_id' =>$request->country,
            // 'city_id' => $city->id,
            'email' =>$request->email,
            'participation' =>$request->participation,
        ]);

          DB::commit();
            return redirect()->route('participant.index')->with(['toast_success'=>'ok']);

        }catch(Exception $ex){

            DB::rollback();
            return redirect()->route('participant.index')->with(['error' => 'not ok']);
        }

        return redirect()->route('participant.index')->with(['toast_success'=>$msg]);

    }
    
    public function policies(){

        return view('investor.policies');
    }
}

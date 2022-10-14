<?php
namespace App\Http\Controllers;

use App\Http\Requests\PersonetRequest;
use App\Models\Admin;
use App\Models\Employe;
use App\Models\Persone;
use App\Notifications\LeadNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class EventController extends Controller
{
    //


    public function index(){

        $employes = Employe::all();
        return view('event.index',compact('employes'));

    }


    public function create(PersonetRequest $request){



        try{
            DB::beginTransaction();

            if (!$request->has('doshtu')){
                $request->request->add(['doshtu' => 0]);
            }else{
                $request->request->add(['doshtu' => 1]);
            }

            if (!$request->has('rekmaz')){
                $request->request->add(['rekmaz' => 0]);
            }else{
                $request->request->add(['rekmaz' => 1]);
            }

            if (!$request->has('undefined')){
                $request->request->add(['undefined' => 0]);
            }else{
                $request->request->add(['undefined' => 1]);
            }

            $fileName= '';
            if ($request->has('photo')) {
                $file = $request->photo;
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('assets/Image'), $fileName);
            }

        $persone = Persone::create([
            'first_name'=> $request->first_name,
            'last_name' =>$request->last_name,
            'phone' =>$request->phone,
            'ofice_phone' => $request->ofice_phone,
            'email' =>$request->email,
            'photo' =>$fileName,
            'doshtu' =>$request->doshtu,
            'rekmaz' =>$request->rekmaz,
            'undefined' =>$request->undefined,
            'note' => $request->note,
            'employe'=>$request->employe,
        ]);


        $admin = Admin::get();

        Notification::send($admin,new LeadNotification($persone));

        $msg =__('investor.success');
            $erroMsg =__('investor.error');

        DB::commit();
            return redirect()->route('event.index')->with(['toast_success'=>$msg]);

        }catch(Exception $ex){

            DB::rollback();
            return redirect()->route('event.index')->with(['toast_error' => $erroMsg]);
        }



    }

}

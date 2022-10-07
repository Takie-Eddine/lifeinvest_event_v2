<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DarRequest;
use App\Models\House;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HouseExport;

class DarAlNashrController extends Controller
{
    public function index(){
        $data['houses'] = House::all();

        return view('admin.daralnashr',$data);
    }


    public function store(DarRequest $request){
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

    public function delete($id){
        $investor = House::find($id);
        //$participant = participant::find($id);

        if ( !$investor) {

            return redirect()->back()->with(['toast_error'=>'There is a problem']);
        }
        $investor->delete();
        return redirect()->back()->with(['toast_success'=>'Deleted with success']);

    }
    
   public function exportods(){


        return Excel::download(new HouseExport,'Douralnashr.ods');
    }

    public function exportxls(){


        return Excel::download(new HouseExport,'Douralnashr.xls');
    }

    public function exportcls(){


        return Excel::download(new HouseExport,'Douralnashr.csv');
    }
}
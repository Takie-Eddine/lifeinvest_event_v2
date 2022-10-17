<?php

namespace App\Exports;

use App\Models\Investor;
use App\Models\Share;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InvestorExport implements FromQuery, WithHeadings ,WithMapping
{

    private $started ;
    private $endded ;

    public function __construct($started , $endded)
    {
        $this -> started= $started;
        $this -> endded= $endded;
    }



    public function query(){
        return Investor::query()->with('shares');
    }

    public function headings(): array
    {
        return [
            '#',
            'first_name',
            'last_name',
            'phone_number',
            'email',
            'doshtu',
            'rekmaz',
            'investment_value'
        ];
    }
    public function map($investor):array{
        return[

            $investor->id,
            $investor->first_name,
            $investor->last_name,
            $investor->phone,
            $investor->email,
            $investor->getDoshtu(),
            $investor->getRekmaz(),
            $investor->shares->pluck('investment_value')->implode(',')
        ];

    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Investor::select('id','first_name','last_name','phone','doshtu','rekmaz')->where('created_at','>=', $this->started)->where('created_at' , '<=' ,$this->endded)->get();
    }
}

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
        return Investor::select('id','first_name','last_name','phone','doshtu','rekmaz')->whereDate('created_at', '=', Carbon::today()->toDateString())->get();
    }
}

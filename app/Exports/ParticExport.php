<?php

namespace App\Exports;

use App\Models\Partic;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ParticExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            '#',
            'full_name',
            'phone_number',
            // 'number',
            // 'time',
            // 'delted_at',
            // 'created_at',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Partic::select('id','full_name','phone_number')->whereDate('created_at', '=', Carbon::today()->toDateString())->get();
    }
}

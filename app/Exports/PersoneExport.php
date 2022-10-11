<?php

namespace App\Exports;

use App\Models\Persone;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PersoneExport implements FromCollection, WithHeadings , WithMapping
{




    public function headings(): array
    {
        return [
            '#',
            'first_name',
            'last_name',
            'phone',
            'office_phone',
            'email',
            'note',
            'rekmaz',
            'doshtu',
            'undefined',

        ];
    }

    public function map($lead):array{
        return[

            $lead->id,
            $lead->first_name,
            $lead->last_name,
            $lead->phone,
            $lead->ofice_phone,
            $lead->email,
            $lead->note,
            $lead->getDoshtu(),
            $lead->getRekmaz(),
            $lead->getUndefined(),
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Persone::select('id','first_name','last_name','phone','ofice_phone','email','note','rekmaz','doshtu','undefined')->get();
    }
}

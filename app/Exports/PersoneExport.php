<?php

namespace App\Exports;

use App\Models\Persone;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class PersoneExport implements FromCollection, WithHeadings
{




    public function headings(): array
    {
        return [
            '#',
            'first_name',
            'last_name',
            'phone',
            'email',
            'note',
            'photo',
            'rekmaz',
            'doshtu',
            'undefined',

        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Persone::select('id','first_name','last_name','phone','email','note','rekmaz','doshtu','undefined')->get();
    }
}
<?php

namespace App\Exports;

use App\Models\House;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HouseExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            '#',
            'name',
            'logo',
            'wings',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return House::select('id','name','wing')->get();
    }
}
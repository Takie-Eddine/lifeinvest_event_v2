<?php

namespace App\Exports;

use App\Models\participant;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ParticipantExport implements  WithHeadings ,FromQuery , WithMapping
{
    private $started;
    private $endded;

    public function __construct( $started , $endded)
    {
        $this->started = $started;
        $this->endded = $endded;
    }



    public function query()
    {
        return participant::query()->with('country');
    }
    public function headings(): array
    {
        return [
            '#',
            'first_name',
            'last_name',
            'phone',
            'email',
            'participation',
            'country',

        ];
    }

    public function map($country):array{
        return[

            $country->id,
            $country->first_name,
            $country->last_name,
            $country->phone,
            $country->email,
            $country->participation,
            $country->country->name
        ];

    }



    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return participant::select('id','first_name','last_name','phone','email','participation','country')->where('created_at','>=', $this->started)->where('created_at' , '<=' ,$this->endded)->get();
    }
}

<?php

namespace App\Exports;

use App\Models\Persone;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PersoneExport implements FromCollection, WithHeadings , WithMapping
{

    public $started;
    public $endded;
    public $employe;

    public function __construct( $started , $endded , $employe)
    {
        $this->started = $started;
        $this->endded = $endded;
        $this->employe = $employe;
    }


    public function headings(): array
    {
        return [
            '#',
            'first_name',
            'last_name',
            'phone',
            'office_phone',
            'email',
            'added_by',
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
            $lead->employe,
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
        if ($this->started === $this->endded && !$this->employe) {
            return Persone::select('id','first_name','last_name','phone','ofice_phone','email','employe','note','rekmaz','doshtu','undefined')->whereDate('created_at', '=' , $this->started)->get();
        }
        if (!$this->started && !$this->employe) {
            return Persone::select('id','first_name','last_name','phone','ofice_phone','email','employe','note','rekmaz','doshtu','undefined')->where('created_at', '<=' , $this->endded)->get();
        }
        if (!$this->endded && !$this->employe) {
            return Persone::select('id','first_name','last_name','phone','ofice_phone','email','employe','note','rekmaz','doshtu','undefined')->where('created_at', '>=' , $this->started)->get();
        }
        if (!($this->started) && !($this->endded) && !($this->employe)) {
            Persone::select('id','first_name','last_name','phone','ofice_phone','email','employe','note','rekmaz','doshtu','undefined')->get();
        }
        if ($this->started && $this->endded && $this->employe) {
            return Persone::select('id','first_name','last_name','phone','ofice_phone','email','employe','note','rekmaz','doshtu','undefined')->whereBetween('created_at',[ $this->started , $this->endded])->where('employe' , '=' ,$this->employe)->get();
        }

        if (!$this->started && !$this->endded && $this->employe) {
            return Persone::select('id','first_name','last_name','phone','ofice_phone','email','employe','note','rekmaz','doshtu','undefined')->where('employe' , '=' ,$this->employe)->get();
        }

        if (!$this->employe) {
            return Persone::select('id','first_name','last_name','phone','ofice_phone','email','employe','note','rekmaz','doshtu','undefined')->whereBetween('created_at',[ $this->started , $this->endded])->get();
        }

    }
}

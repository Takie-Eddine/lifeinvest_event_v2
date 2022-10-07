<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partic extends Model
{
    use HasFactory;

    use SoftDeletes;


    protected $fillable = [
        'full_name' , 'phone_number' ,
    ];

    public $timestamps = true;


    protected static function booted(){
        static::creating(function(Partic $number){
            $number->number = Partic::getNextOrderNumber();
        });
    }



    public static function getNextOrderNumber(){
        $year = Carbon::now()->year ;
        $number =  Partic::whereYear('created_at',$year)->max('number');

        if ($number) {
            return $number +1;
        }
        return $year . '0001';
    }
}

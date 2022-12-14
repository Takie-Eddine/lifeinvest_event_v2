<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class participant extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $guarded=[];

    public $timestamps = true;


    public function country(){
        return $this->belongsTo(Country::class);
    }


    // public function city(){
    //     return $this->belongsTo(City::class);
    // }


}

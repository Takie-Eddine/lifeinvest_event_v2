<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];

    public $timestamps = true;




    public function getDoshtu(){
        return  $this -> doshtu  == 0 ?  '  '   : 'yes' ;
    }
    public function getRekmaz(){
        return  $this -> rekmaz  == 0 ?  '  '   : 'yes' ;
    }


    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }


    public function shares(){
        return $this->hasMany(Share::class);
    }
}

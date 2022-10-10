<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persone extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];

    public $timestamps = true;




    public function getActive(){
        return  $this -> doshtu  == 0 ?  'not interested '   : 'interested' ;
    }

    public function getActive1(){
        return  $this -> rekmaz  == 0 ?  'not interested '   : 'interested' ;
    }

    public function getDoshtu(){
        return  $this -> doshtu  == 0 ?  '  '   : 'yes' ;
    }
    public function getRekmaz(){
        return  $this -> rekmaz  == 0 ?  '  '   : 'yes' ;
    }
    public function getUndefined(){
        return  $this -> undefined  == 0 ?  '  '   : 'yes' ;
    }


}

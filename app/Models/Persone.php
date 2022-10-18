<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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



    public function employes(){

        return $this->hasOne(Employe::class);
    }



    public function scopeFilter(Builder $builder,$filters){


        // $builder->when($filters['project'] == 'doshtu' ?? false,function ($builder,$value){
        //     $builder->where('persones.doshtu','=', $value);
        // });
        // $builder->when($filters['project'] == 'rekmaz' ?? false,function ($builder,$value){
        //     $builder->where('persones.rekmaz','=', $value);
        // });
        // $builder->when($filters['project'] == 'undefined' ?? false,function ($builder,$value){
        //     $builder->where('persones.undefined','=', $value);
        // });
        $builder->when($filters['employe'] ?? false,function ($builder,$value){
            $builder->where('persones.employe','=', $value);
        });
        $builder->when($filters['date_started'] ?? false,function ($builder,$value){
            $builder->whereDate('persones.created_at','>=', $value);
        });
        $builder->when($filters['date_endded'] ?? false,function ($builder,$value){
            $builder->whereDate('persones.created_at','<=', $value);
        });


        // if ($filters['name'] ?? false) {
        //     $builder->where('name','LIKE', "%{$filters['name']}%");
        // }
        // if ($filters['status'] ?? false) {
        //     $builder->where('status','=', $filters['status']);
        // }
    }

}

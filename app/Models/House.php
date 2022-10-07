<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class House extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'name' , 'logo' , 'wing' , 'first_hour' , 'last_hour' ,'first_periode','last_periode'
    ];


}
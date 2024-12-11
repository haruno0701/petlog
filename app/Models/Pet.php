<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(
 
        'name' => 'required',
        'gender' => 'required',
        'breed'=> 'required',
        'birthday'=> 'required',
    );

    
}

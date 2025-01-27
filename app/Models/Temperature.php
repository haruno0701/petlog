<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Temperature extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(

        'temperature' => 'required',
    );

    
}

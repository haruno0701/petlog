<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stroll extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(

        'stroll' => 'required',
    );
}

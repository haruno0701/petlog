<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(
 
        'kinds' => 'required',
        'name' => 'required',
        
    );

    public function pets()
    {
        return $this->hasMany('App\Models\Pet');
    }

}

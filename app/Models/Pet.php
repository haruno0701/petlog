<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pet extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(
 
        'name' => 'required',
        'gender' => 'required',
        'birthday'=> 'required',
        
    );

    public function getCarbonBirthday()
    {
        return Carbon::createFromFormat('Y/m/d', $this->birthday);
    }

    public function getAgeAttribute()
    {
        $now = Carbon::now();
        $year = Carbon::parse($this->birthday)->diffInYears($now);
        return $year;
    }

    public function getMonthAttribute()
    {
        $now = Carbon::now();
        $month = Carbon::parse($this->birthday)->diffInMonths($now) - 12 * $this->getAgeAttribute();
        return $month;
    }

    public function animal()
    {
        return $this->belongsTo('App\Models\Animal');
    }

}


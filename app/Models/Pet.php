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

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($article) {
            $article->details()->delete();
        });
    }

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

    public function weights()
    {
        return $this->hasMany('App\Models\Weight');
    }

    public function temperatures()
    {
        return $this->hasMany('App\Models\Temperature');
    }
    public function strolls()
    {
        return $this->hasMany('App\Models\Stroll');
    }
    public function urines()
    {
        return $this->hasMany('App\Models\Urine');
    }
    public function flights()
    {
        return $this->hasMany('App\Models\Flight');
    }
    
    public function details()
    {
        return $this->hasMany('App\Models\Detail');
    }

}


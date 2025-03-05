<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(

        'pet_id' => 'required',
        'category_id' => 'required',
        'category_value' => 'required',


    );

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

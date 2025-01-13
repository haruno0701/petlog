<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Weight extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(

        'weight' => 'required',
    );

    public function history()
    {
        $now = Carbon::now()->isoFormat('YYYY/MM/DD(ddd) HH:mm:ss');
        return $now;
    }
}

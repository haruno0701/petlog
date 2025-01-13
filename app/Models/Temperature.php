<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Temperature extends Model
{
    use HasFactory;
    public static $rules = array(

        'temperature' => 'required',
    );

    public function history()
    {
        $now = Carbon::now()->isoFormat('YYYY/MM/DD(ddd) HH:mm:ss');
        return $now;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    public function classe(){
    	return $this->belongsToOne('App\Class','course_id');
    }
    public function attendance()
    {
        return $this->hasOne('App\Attendance','token_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function token(){
    	return $this->belongsToOne('App\Token','token_id');
    }
    public function student(){
    	return $this->belongsToOne('App\Token','student_id');
    }
}

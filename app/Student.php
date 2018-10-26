<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function attendance(){
        return $this->hasMany('App\Attendance','student_id');
    }
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}

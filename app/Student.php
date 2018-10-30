<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	public function user(){
        return $this->belongsTo('App\User','user_id');
    }
	public function courses(){
        return $this->belongsToMany('App\Course','course_student','student_id','course_id');
    }
    public function attendances(){
        return $this->hasMany('App\Attendance','student_id');
    }
   

}

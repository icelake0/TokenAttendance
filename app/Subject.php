<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function teachers(){
    	return $this->belongsToMany('App\User','teacher_subject','subject_id','teacher_id');
    }
    public function teacher_requests()
    {
        return $this->hasMany('App\TeacherRequest','subject_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    public function teacher_requests(){
        return $this->belongsToMany('App\TeacherRequest','teacher_request_children','child_id','teacher_request_id');
    }
    
}

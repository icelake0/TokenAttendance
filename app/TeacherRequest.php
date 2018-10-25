<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherRequest extends Model
{
    public function children(){
        return $this->belongsToMany('App\Child','teacher_request_children','teacher_request_id','child_id');
    }
    public function subject()
    {
        return $this->belongsTo('App\Subject','subject_id');
    }
    public function teacher()
    {
        return $this->belongsTo('App\User','teacher_id');
    }
     public function requester()
    {
        return $this->belongsTo('App\User','requester_id');
    }
}
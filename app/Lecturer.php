<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    public function courses(){
        return $this->belongsToMany('App\Course','course_lecturer','lecturer_id','course_id');
    }
}

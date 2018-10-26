<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function attendance()
    {
        return $this->hasMany('App\Attendance','student_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lecturer;

class Course extends Model
{
	public function courses(){
        return $this->belongsToMany('App\Lecturer','course_lecturer','course_id','lecturer_id');
    }
    private function course_lecturer(){
   		return Lecturer::where('id',this->created_by);
    }
    public function classes()
    {
        return $this->hasMany('App\Class','course_id');
    }
}

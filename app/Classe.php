<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    public function course(){
    	return $this->belongsTo('App\Course','course_id');
    }
    public function tokens()
    {
        return $this->hasMany('App\Token','class_id');
    }
}

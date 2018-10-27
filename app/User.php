<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable , EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','avatar', 'password', 'provider', 'provider_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function lecturer(){
        return $this->hasOne('App\Lecturer','user_id');
    }
    public function student(){
        return $this->hasOne('App\Student','user_id');
    }
    public function subjects(){
        return $this->belongsToMany('App\Subject','teacher_subject','teacher_id','subject_id');
    }
    public function teacher_teacher_requests()
    {
        return $this->hasMany('App\TeacherRequest','teacher_id');
    }
    public function requester_teacher_requests()
    {
        return $this->hasMany('App\TeacherRequest','requester_id');
    }
    public function documents()
    {
        return $this->hasMany('App\TeacherDocument','teacher_id');
    }
    public function children(){
        return $this->hasMany('App\Child','parent_id');
    }
}

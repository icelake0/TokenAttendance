<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Student;
use App\Lecturer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers_count=Lecturer::all()->count();
        $students_count=Student::all()->count();
        $courses_count=Course::all()->count();
        return view('home',[
            'lecturers_count'=>$lecturers_count,
            'students_count'=>$students_count,
            'courses_count'=>$courses_count
        ]);
    }
}
